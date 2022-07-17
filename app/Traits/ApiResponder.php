<?php

namespace App\Traits;

trait ApiResponder
{
    protected function successResponseWithMessageOnly($message, $code = 200)
    {
        return response()->json([
            'message' => $message,
            'success' => true,
        ], $code);
    }

    protected function successResponse($message = null, $data, $code = 200)
    {
        return response()->json([
            'message' => $message,
            'success' => true,
            'data' => $data,
        ], $code);
    }

}
