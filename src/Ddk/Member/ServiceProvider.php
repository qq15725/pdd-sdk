<?php

namespace Pdd\Ddk\Member;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ServiceProvider implements ServiceProviderInterface
{
    protected $providers = [
        Authority\ServiceProvider::class,
    ];

    public function register(Container $app)
    {
        $app['ddk.member'] = function ($app) {
            /** @var \Pdd\Application $app */
            $app->registerProviders($this->providers);

            return new Member($app);
        };
    }
}