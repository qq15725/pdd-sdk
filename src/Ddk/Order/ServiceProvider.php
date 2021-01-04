<?php

namespace Pdd\Ddk\Order;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ServiceProvider implements ServiceProviderInterface
{
    protected $providers = [
        ListClient\ServiceProvider::class,
    ];

    public function register(Container $app)
    {
        $app['ddk.order'] = function ($app) {
            /** @var \Pdd\Application $app */
            $app->registerProviders($this->providers);

            return new Order($app);
        };
    }
}