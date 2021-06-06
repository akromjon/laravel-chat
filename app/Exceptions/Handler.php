<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Illuminate\Auth\AuthenticationException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $exception) {
        });
    }
    public function render($request, Throwable $exception)
    {
        if ($exception instanceof AuthenticationException) {
            return response()->json([
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
        if($exception instanceof NotFoundHttpException)
        {
            return response()->json([
                'result' => [
                    'success' => false,
                    'data'    => []
                ],
                'error' => [
                    'message' => __('messages.route_not_found'),
                    'code'    => 404
                ]
            ], 404);
        }
        if($exception instanceof MethodNotAllowedHttpException)
        {
            return response()->json([
                'result' => [
                    'success' => false,
                    'data'    => []
                ],
                'error' => [
                    'message' => __('messages.method_not_allowed'),
                    'code'    => 405
                ]
            ], 405);
        }
        return parent::render($request, $exception);
    }

}
