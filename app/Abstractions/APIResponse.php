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

        if (method_exists($data, 'total')) {
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
            'current_items_count' => $data->count(),
            'items_per_page' => $data->perPage(),
            'current_page_no' => $data->currentPage(),
            'has_more_pages' => $data->hasMorePages(),
        ];
    }

    /**
     * Generate errors response
     *
     * @param string|array $errors 'error message' | ['message one', 'message two']
     * @param $statusCode
     * @return JsonResponse
     */
    public function errors($errors, $statusCode)
    {
        $response = [
            'status' => [
                'message' => 'Something went wrong!',
                'code' => $statusCode,
            ],
            'errors' => ['exception' => is_array($errors) ? $errors : [$errors]],
        ];

        return new JsonResponse($response, $statusCode);
    }
}