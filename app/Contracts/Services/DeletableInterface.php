<?php


namespace App\Contracts\Services;


use App\Abstractions\ServiceDTO;

interface DeletableInterface
{
    public function delete($id): ServiceDTO;
}