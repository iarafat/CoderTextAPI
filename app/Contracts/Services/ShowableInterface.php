<?php


namespace App\Contracts\Services;


use App\Abstractions\ServiceDTO;

interface ShowableInterface
{
    public function show($id): ServiceDTO;
}