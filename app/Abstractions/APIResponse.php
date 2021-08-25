<?php


namespace App\Abstractions;


use Illuminate\Http\JsonResponse;

class APIResponse
{
    /**
     * @param $data
     * @param $message
     * @param int $statusCode
     * @return JsonResponse
     */
    public function success($data, $message, $statusCode = 200)
    {
        $response = [
            'status' => [
                'message' => $message,
                'code' => $statusCode,
            ]
        ];

        if (!is_array($data) && method_exists($data, 'total')) {
            $response = array_merge(
                $response,
                [
                    'data' => $data->all(),
                    'pagination' => $this->pagination($data),
                ]);
        } else {
            $response = array_merge(
                $response,
                [
                    'data' => $data,
                ]);
        }

        return new JsonResponse($response, $statusCode);
    }

    private function pagination($data)
    {
        return [
            'total' => $data->total(),
            'per_page' => $data->perPage(),
            'current_page' => $data->currentPage(),
            'prev_page_url' => $data->previousPageUrl(),
            'next_page_url' => $data->nextPageUrl(),
        ];
    }

    /**
     * Generate errors response
     * @param $message
     * @param $statusCode
     * @param array $errors
     * @return JsonResponse
     */
    public function errors($message, $statusCode, $errors = [])
    {
        $response = [
            'status' => [
                'message' => $message,
                'code' => $statusCode,
            ],
            'errors' => $errors,
        ];

        return new JsonResponse($response, $statusCode);
    }
}