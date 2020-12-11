<?php

namespace Pdd\Ddk\Goods\Zs;

use Pdd\BaseClient;
use SDK\Kernel\Exceptions\InvalidArgumentException;

/**
 * @property \Pdd\Ddk\Goods\Zs\Unit\Unit $unit
 */
class Zs extends BaseClient
{
    /**
     * @param $property
     *
     * @return mixed
     * @throws InvalidArgumentException
     */
    public function __get($property)
    {
        if (isset($this->app["ddk.goods.zs.{$property}"])) {
            return $this->app["ddk.goods.zs.{$property}"];
        }

        throw new InvalidArgumentException(sprintf('No Pdd.Ddk.Goods.Zs service named "%s".', $property));
    }
}