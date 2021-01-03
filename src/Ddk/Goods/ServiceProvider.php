<?php

namespace Pdd\Ddk\Goods;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ServiceProvider implements ServiceProviderInterface
{
    protected $providers = [
        Zs\ServiceProvider::class,
        Promotion\ServiceProvider::class,
    ];

    public function register(Container $app)
    {
        $app['ddk.goods'] = function ($app) {
            /** @var \Pdd\Application $app */
            $app->registerProviders($this->providers);

            return new Goods($app);
        };
    }
}