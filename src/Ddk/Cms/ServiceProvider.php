<?php

namespace Pdd\Ddk\Cms;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ServiceProvider implements ServiceProviderInterface
{
    protected $providers = [
        Prom\ServiceProvider::class,
    ];

    public function register(Container $app)
    {
        $app['ddk.cms'] = function ($app) {
            /** @var \Pdd\Application $app */
            $app->registerProviders($this->providers);

            return new Cms($app);
        };
    }
}