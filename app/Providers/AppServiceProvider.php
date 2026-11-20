<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

use App\Models\Profile;
use App\Models\Servicios;
use App\Models\Contenidos;
use Illuminate\Support\Facades\View;

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
        Schema::defaultStringLength(191);

        // 🔥 Compartir el único registro de profiles con TODAS las vistas
        View::composer('*', function ($view) {
            $view->with('profile', Profile::first());
        });

        // 🔥 Compartir el menú de servicios con todas las vistas
        View::composer('*', function ($view) {
            $view->with(
                'servicios_menu',
                Servicios::where('status', 'publish')
                    ->where('destacado', 'si')
                    ->orderBy('orden', 'asc') // opcional
                    ->get()
            );
        });

        // 🔥 Compartir el menú de contenidos con todas las vistas
        View::composer('*', function ($view) {
            $view->with(
                'contenidos_menu',
                Contenidos::where('status', 'publish')
                    ->orderBy('orden', 'asc') // opcional
                    ->get()
            );
        });
    }
}
