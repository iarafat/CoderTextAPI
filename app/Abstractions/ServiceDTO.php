<?php


namespace App\Abstractions;


class ServiceDTO
{
    public $message, $statusCode, $data;

    /**
     * ServiceDTO constructor.
     * @param string $message
     * @param int $statusCode
     * @param array $data
     */
    public function __construct(string $message, int $statusCode, $data = [])
    {
        $this->message = $message;
        $this->statusCode = $statusCode;
        $this->data = $data;
    }
}