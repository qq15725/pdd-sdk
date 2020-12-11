<?php

namespace Pdd\Ddk\Goods\Zs;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ServiceProvider implements ServiceProviderInterface
{

    public function register(Container $app)
    {
        $app['ddk.goods.zs'] = function ($app) {
            return new Zs($app);
        };

        $app['ddk.goods.zs.unit'] = function ($app) {
            return new Unit\Unit($app);
        };

        $app['ddk.goods.zs.unit.url'] = function ($app) {
            return new Unit\UrlClient($app);
        };
    }
}