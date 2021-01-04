<?php

namespace Pdd\Ddk\Top;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ServiceProvider implements ServiceProviderInterface
{
    protected $providers = [
        Goods\ServiceProvider::class,
    ];

    public function register(Container $app)
    {
        $app['ddk.top'] = function ($app) {
            /** @var \Pdd\Application $app */
            $app->registerProviders($this->providers);

            return new Top($app);
        };
    }
}