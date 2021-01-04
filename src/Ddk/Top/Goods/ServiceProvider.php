<?php

namespace Pdd\Ddk\Top\Goods;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ServiceProvider implements ServiceProviderInterface
{
    protected $providers = [
        ListClient\ServiceProvider::class,
    ];

    public function register(Container $app)
    {
        $app['ddk.top.goods'] = function ($app) {
            /** @var \Pdd\Application $app */
            $app->registerProviders($this->providers);

            return new Goods($app);
        };
    }
}