<?php

namespace App\Http\ApiResponse\Traits;

trait ApiResponse
{

    public function not_found($error_message = 'The page is not found')
    {
        return $this->return_json_response([
            'result' => [
                'success' => false,
                'data'    => null
            ],
            'error' => [
                'message'   => $error_message,
                'code'      => 404
            ]
        ], 404);
    }
    public function bad_request($error_message = 'Bad Request')
    {
        return $this->return_json_response([
            'result' => [
                'success' => false,
                'data'    => null
            ],
            'error' => [
                'message'   => $error_message,
                'code'      => 400
            ]
        ], 400);
    }
    public function success_user_login(string $token, $expire_date){
        return $this->return_json_response([
            [
                'result' => [
                    'success' => true,
                    'data'    => [
                        'token'  =>$token,
                        "token_type"    => "Sanctum",
                        'expires_at' => $expire_date
                    ]
                ]
            ]
        ], 201);
    }
    public function success_user_register(object $user)
    {
        return $this->return_json_response([
            [
                'result' => [
                    'success' => true,
                    'data'    => [
                        'user'=>$user
                    ]
                ]
            ]
        ], 201);
    }
    public function user_not_loged_in()
    {
        return $this->return_json_response([
            'result' => [
                'success' => false,
                'data'    => []
            ],
            'error' => [
                'message' => __('messages.unauthenticated'),
                'code'    => 401
            ]
        ], 401);
    }
    protected function return_json_response(array $array_data, int $status_code)
    {
        return response()->json($array_data, $status_code);
    }

    public function success_data(object $user, string $dataName)
    {
        return $this->return_json_response([
            [
                'result' => [
                    'success' => true,
                    'data'    => [
                        $dataName=>$user
                    ]
                ]
            ]
        ], 201);
    }
}
