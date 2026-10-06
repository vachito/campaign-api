<?php

namespace App\Traits;
use Illuminate\Support\Facades\Log;

trait ApiResponseTrait
{
    protected function successResponse($data, string $message = 'Éxito', int $code = 200)
    {
        return response()->json([
            'status' => 'success',
            'message' => $message,
            'data' => $data,
        ], $code);
    }

    protected function errorResponse(string $message, int $code = 500, \Throwable $exception = null)
    {
        if ($exception) {
            Log::error($message . ' | Error técnico: ' . $exception->getMessage(), [
                'file' => $exception->getFile(),
                'line' => $exception->getLine(),
                'user_id' => auth()->id()
            ]);
        }

        return response()->json([
            'status' => 'error',
            'message' => $message,
        ], $code);
    }
}
