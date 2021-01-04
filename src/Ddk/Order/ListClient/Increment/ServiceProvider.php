<?php

namespace Pdd\Ddk\Order\ListClient\Increment;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ServiceProvider implements ServiceProviderInterface
{
    protected $providers = [];

    public function register(Container $app)
    {
        $app['ddk.order.list.increment'] = function ($app) {
            /** @var \Pdd\Application $app */
            $app->registerProviders($this->providers);

            return new Increment($app);
        };
    }
}