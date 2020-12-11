<?php

namespace Pdd\Ddk\Goods;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ServiceProvider implements ServiceProviderInterface
{
    protected $providers = [
        Zs\ServiceProvider::class,
    ];

    public function register(Container $app)
    {
        $app['ddk.goods'] = function ($app) {
            /** @var \Jd\Application $app */
            $app->registerProviders($this->providers);

            return new Goods($app);
        };
    }
}