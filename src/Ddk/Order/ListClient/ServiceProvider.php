<?php

namespace Pdd\Ddk\Order\ListClient;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ServiceProvider implements ServiceProviderInterface
{
    protected $providers = [
        Increment\ServiceProvider::class,
        Range\ServiceProvider::class,
        Detail\ServiceProvider::class,
    ];

    public function register(Container $app)
    {
        $app['ddk.order.list'] = function ($app) {
            /** @var \Pdd\Application $app */
            $app->registerProviders($this->providers);

            return new ListClient($app);
        };
    }
}