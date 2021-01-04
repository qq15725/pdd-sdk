<?php

namespace Pdd\Ddk\Pid;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ServiceProvider implements ServiceProviderInterface
{
    protected $providers = [
        Mediaid\ServiceProvider::class,
    ];

    public function register(Container $app)
    {
        $app['ddk.pid'] = function ($app) {
            /** @var \Pdd\Application $app */
            $app->registerProviders($this->providers);

            return new Pid($app);
        };
    }
}