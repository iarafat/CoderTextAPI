<?php

namespace App\Providers;

use App\Contracts\Repositories\SettingRepositoryInterface;
use App\Repositories\SettingRepository;
use Illuminate\Support\ServiceProvider;

class RegisterServicesAndRepositories extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        // Register Repositories
        $this->repositories();

        // Register Services
        $this->services();
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    private function repositories()
    {
        $this->app->bind(SettingRepositoryInterface::class, SettingRepository::class);
    }

    private function services()
    {
    }
}
