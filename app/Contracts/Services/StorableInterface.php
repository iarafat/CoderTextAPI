<?php


namespace App\Contracts\Services;


use App\Abstractions\ServiceDTO;

interface StorableInterface
{
    public function store(array $data): ServiceDTO;
}