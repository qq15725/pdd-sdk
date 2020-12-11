<?php

namespace Pdd\Ddk\Goods\Zs\Unit;

use Pdd\BaseClient;
use SDK\Kernel\Exceptions\InvalidArgumentException;

/**
 * @property \Pdd\Ddk\Goods\Zs\Unit\UrlClient $url
 */
class Unit extends BaseClient
{
    /**
     * @param $property
     *
     * @return mixed
     * @throws InvalidArgumentException
     */
    public function __get($property)
    {
        if (isset($this->app["ddk.goods.zs.unit.{$property}"])) {
            return $this->app["ddk.goods.zs.unit.{$property}"];
        }

        throw new InvalidArgumentException(sprintf('No Pdd.Ddk.Goods.Zs.Unit service named "%s".', $property));
    }
}