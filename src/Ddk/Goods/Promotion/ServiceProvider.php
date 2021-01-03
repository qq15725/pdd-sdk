<?php

namespace Pdd\Ddk\Goods\Promotion;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ServiceProvider implements ServiceProviderInterface
{
    protected $providers = [
        Url\ServiceProvider::class,
    ];

    public function register(Container $app)
    {
        $app['ddk.goods.promotion'] = function ($app) {
            /** @var \Pdd\Application $app */
            $app->registerProviders($this->providers);

            return new Promotion($app);
        };
    }
}