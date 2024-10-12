<?php

namespace App\Providers;

use App\Models\Languages;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

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
      
     $languages = Languages::pluck('name');
     config(['localized-routes.supported_locales'=>$languages->toArray()]);
       View::share('languages', Languages::all()); 
    }
}
