<?php

namespace App\Traits;

trait ApiResponse
{
    /**
     * @param bool $status
     * @param int $responseCode
     * @param array $message
     * @param null $data
     * @return \Illuminate\Http\JsonResponse
     */
    public function responseJson(bool $status, int $statusCode, string $message, $data = null)
    {
        return response()->json([
            'status' => $status,
            'statusCode' => $statusCode,
            'message' => $message,
            'data' => $data,
        ], $statusCode);
    }
}
