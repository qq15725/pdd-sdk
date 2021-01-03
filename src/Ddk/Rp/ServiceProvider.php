<?php

namespace Pdd\Ddk\Rp;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ServiceProvider implements ServiceProviderInterface
{
    protected $providers = [
        Prom\ServiceProvider::class,
    ];

    public function register(Container $app)
    {
        $app['ddk.rp'] = function ($app) {
            /** @var \Pdd\Application $app */
            $app->registerProviders($this->providers);

            return new Rp($app);
        };
    }
}