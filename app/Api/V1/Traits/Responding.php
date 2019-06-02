<?php

namespace App\Api\V1\Traits;

use Illuminate\Http\JsonResponse;

trait Responding
{

    /**
     * Put together success response
     *
     * @param $result
     * @param  string  $message
     * @param  int  $code
     * @param  array  $headers
     * @return JsonResponse
     */
    public function sendResponse($result, string $message, int $code = 200, array $headers = []): JsonResponse
    {
        $response = [
            'success' => true,
            'data' => $result,
            'message' => $message,
        ];

        return response()->json($response, $code, $headers);
    }

    /**
     * Put together failed response with error messages if they exist
     *
     * @param  string  $error
     * @param  array  $errorMessages
     * @param  int  $code
     * @param  array  $headers
     * @return JsonResponse
     */
    public function sendError(string $error, array $errorMessages = [], int $code = 404, array $headers = []): JsonResponse
    {
        $response = [
            'success' => false,
            'message' => $error,
        ];

        if (!empty($errorMessages)) {
            $response['data'] = $errorMessages;
        }

        return response()->json($response, $code, $headers);
    }
}
