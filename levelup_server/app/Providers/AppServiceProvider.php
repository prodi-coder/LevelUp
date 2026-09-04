<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\DayService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        try{
            app(DayService::class)->createMissingDays();
        } catch (\Throwable $e) {
            logger()->error('Day sync failed: '.$e->getMessage());
        }
    }
}
