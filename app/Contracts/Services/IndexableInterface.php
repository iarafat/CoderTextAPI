<?php


namespace App\Contracts\Services;


use App\Abstractions\ServiceDTO;

interface IndexableInterface
{
    public function index(): ServiceDTO;
}