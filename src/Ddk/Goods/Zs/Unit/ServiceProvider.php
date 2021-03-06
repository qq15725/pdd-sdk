<?php

namespace Pdd\Ddk\Goods\Zs\Unit;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ServiceProvider implements ServiceProviderInterface
{
    protected $providers = [
        Url\ServiceProvider::class,
    ];

    public function register(Container $app)
    {
        $app['ddk.goods.zs.unit'] = function ($app) {
            /** @var \Pdd\Application $app */
            $app->registerProviders($this->providers);

            return new Unit($app);
        };
    }
}