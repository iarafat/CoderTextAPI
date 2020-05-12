<?php


namespace App\Contracts\Services;


use App\Abstractions\ServiceDTO;

interface UpdateableInterface
{
    public function update($id, array $data): ServiceDTO;
}