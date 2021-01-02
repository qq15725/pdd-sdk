<?php

namespace Pdd\Ddk\Resource\Url;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ServiceProvider implements ServiceProviderInterface
{
    protected $providers = [];

    public function register(Container $app)
    {
        $app['ddk.resource.url'] = function ($app) {
            /** @var \Jd\Application $app */
            $app->registerProviders($this->providers);

            return new Url($app);
        };
    }
}