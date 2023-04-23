<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use App\View\Components\Alert;
//use App\View\Components\Inputs\Button;
// use App\View\Components\Form\Button as FormButton;


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
        Blade::component('package-alert', Alert::class);
        //Blade::component('button', Button::class);
       // Blade::component('forms-button', FormButton::class);
    }
}
