<?php


namespace App\Contracts\Repositories;


interface SettingRepositoryInterface
{
    public function getSettings($group, $keys);
}