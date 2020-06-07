<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

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
        // Se a versão do MySQL for anterior a versão 5.7.7 ou MariaDB anterior à versão 10.2.2
        // (configure o comprimento da string manualmente)
        Schema::defaultStringLength(191);
    }
}
