<?php

namespace Pdd;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;

class ServiceProvider extends BaseServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        // 发布配置
        $this->publishes([
            dirname(__DIR__) . '/config/pdd.php' => function_exists('config_path')
                ? config_path('pdd.php')
                : base_path('config/pdd.php')
        ], 'config');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if (method_exists($this->app, 'configure')) {
            $this->app->configure('pdd');
        }

        $this->mergeConfigFrom(dirname(__DIR__) . '/config/pdd.php', 'pdd');


        $this->app->singleton(Application::class, function ($app) {
            return new Application(
                null,
                null,
                $app->make('config')->get('pdd', [])
            );
        });
    }
}
