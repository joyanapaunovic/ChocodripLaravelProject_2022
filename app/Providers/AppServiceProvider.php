<?php

namespace App\Providers;

use App\Models\Navigation;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $navigationModel = new Navigation();
        $menu = $navigationModel->fetchNavigationLinksFromDB();
        View::share('menu', $menu);
    }
}
