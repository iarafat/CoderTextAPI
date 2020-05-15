<?php


namespace App\Abstractions;



use Illuminate\Database\Eloquent\Collection;

class ServiceDTO
{
    public $message, $statusCode, $data;

    /**
     * ServiceDTO constructor.
     * @param string $message
     * @param int $statusCode
     * @param array|Collection $data
     */
    public function __construct(string $message, int $statusCode, $data = [])
    {
        $this->message = $message;
        $this->statusCode = $statusCode;
        $this->data = $data;
    }
}