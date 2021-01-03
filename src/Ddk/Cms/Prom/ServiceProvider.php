<?php

namespace Pdd\Ddk\Cms\Prom;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ServiceProvider implements ServiceProviderInterface
{
    protected $providers = [
        Url\ServiceProvider::class,
    ];

    public function register(Container $app)
    {
        $app['ddk.cms.prom'] = function ($app) {
            /** @var \Pdd\Application $app */
            $app->registerProviders($this->providers);

            return new Prom($app);
        };
    }
}