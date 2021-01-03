<?php

namespace Pdd\Ddk\Goods\Zs;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ServiceProvider implements ServiceProviderInterface
{
    protected $providers = [
        Unit\ServiceProvider::class,
    ];

    public function register(Container $app)
    {
        $app['ddk.goods.zs'] = function ($app) {
            /** @var \Pdd\Application $app */
            $app->registerProviders($this->providers);

            return new Zs($app);
        };
    }
}