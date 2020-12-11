<?php

namespace Pdd\Ddk;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

/**
 * Class ServiceProvider.
 */
class ServiceProvider implements ServiceProviderInterface
{
    protected $providers = [
        Goods\ServiceProvider::class,
    ];

    /**
     * {@inheritdoc}.
     */
    public function register(Container $app)
    {
        $app['ddk'] = function ($app) {
            /** @var \Jd\Application $app */
            $app->registerProviders($this->providers);

            return new Ddk($app);
        };
    }
}