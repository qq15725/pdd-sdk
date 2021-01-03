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
        Resource\ServiceProvider::class,
        Cms\ServiceProvider::class,
        Member\ServiceProvider::class,
        Rp\ServiceProvider::class,
    ];

    /**
     * {@inheritdoc}.
     */
    public function register(Container $app)
    {
        $app['ddk'] = function ($app) {
            /** @var \Pdd\Application $app */
            $app->registerProviders($this->providers);

            return new Ddk($app);
        };
    }
}