<?php

namespace Pdd\Ddk\Rp\Prom;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ServiceProvider implements ServiceProviderInterface
{
    protected $providers = [
        Url\ServiceProvider::class,
    ];

    public function register(Container $app)
    {
        $app['ddk.rp.prom'] = function ($app) {
            /** @var \Pdd\Application $app */
            $app->registerProviders($this->providers);

            return new Prom($app);
        };
    }
}