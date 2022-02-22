<?php

namespace App\Traits;

trait Response
{
    /**
     * @param $data
     * @param string|null $message
     * @param int $code
     * @return \Illuminate\Http\JsonResponse
     */
    protected function success($data, string $message = null, int $code = 200): \Illuminate\Http\JsonResponse
    {
        return response()->json(
            [
            'data' => $data,
            'message' => $message,
             'code'=>$code
            ],
        );
    }

    /**
     * @param string $message
     * @param int $status
     * @param null $data
     * @return \Illuminate\Http\JsonResponse
     */
    protected function error(string $message, int $status = 422, $data = null): \Illuminate\Http\JsonResponse
    {
        return response()->json(array_filter([
            'message' => $message,
            'data' => $data
        ]), $status);
    }
}
