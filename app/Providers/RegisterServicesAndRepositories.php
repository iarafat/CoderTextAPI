<?php

namespace App\Providers;

use App\Contracts\Repositories\CategoryRepositoryInterface;
use App\Contracts\Repositories\SettingRepositoryInterface;
use App\Contracts\Services\CategoryServiceInterface;
use App\Contracts\Services\SettingServiceInterface;
use App\Repositories\CategoryRepository;
use App\Repositories\SettingRepository;
use App\Services\CategoryService;
use App\Services\SettingService;
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
        $this->app->bind(CategoryRepositoryInterface::class, CategoryRepository::class);
    }

    private function services()
    {
        $this->app->bind(SettingServiceInterface::class, SettingService::class);
        $this->app->bind(CategoryServiceInterface::class, CategoryService::class);
    }
}
