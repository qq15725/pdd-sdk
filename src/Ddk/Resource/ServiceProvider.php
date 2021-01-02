<?php

namespace Pdd\Ddk\Resource;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ServiceProvider implements ServiceProviderInterface
{
    protected $providers = [
        Url\ServiceProvider::class,
    ];

    public function register(Container $app)
    {
        $app['ddk.resource'] = function ($app) {
            /** @var \Jd\Application $app */
            $app->registerProviders($this->providers);

            return new Resource($app);
        };
    }
}