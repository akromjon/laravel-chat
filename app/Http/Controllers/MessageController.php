<?php

namespace App\Http\Controllers;

use App\Events\MessageEvent;
use App\Http\Requests\MessageRequest;
use App\Models\Message;


class MessageController extends Controller
{
    protected $message;
    public function __construct(Message $message)
    {
        $this->message = $message;
    }

    public function index()
    {
        $messages = $this->message::where('deleted_at',null)->get();
        return $this->success_data($messages, 'messages');
    }
    public function store(MessageRequest $request)
    {
        $message=$this->message::create([
            'user_id' => $request->user_id,
            'message' => $request->message
        ]);
        $start_message_event=new MessageEvent($message);
        event($start_message_event);
        return $this->success_data($message,'message');
    }
}
