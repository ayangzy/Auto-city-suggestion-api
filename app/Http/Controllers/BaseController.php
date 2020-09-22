<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Response;

class BaseController extends Controller
{
    /**
     * a generic method for all success
     * messages
     * @param $data
     * @param string $message
     * @param int $statusCode
     * @return Application|ResponseFactory|Response|object
     */
    protected function successResponse( $message = null, $data = null, $statusCode = 200)
    {
        return response([
            'statusCode' => $statusCode,
            'status' => 'success',
            'message' => $message,
            'suggestions' => $data,
        ])->setStatusCode($statusCode);
    }

    /**
     * a generic method for all error
     * messages
     * @param $message
     * @param int $statusCode
     * @return Application|ResponseFactory|Response|object
     */
    protected function errorResponse($message =null, $data=null, $statusCode = 404)
    {
        return response([
            'statusCode' => $statusCode,
            'status' => 'error',
            'message' => $message,
            'suggestions' => $data,
        ])->setStatusCode($statusCode);
    }
}
