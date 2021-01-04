<?php

namespace Pdd\Ddk\Top\Goods;

use Pdd\BaseClient;
use SDK\Kernel\Exceptions\InvalidArgumentException;

/**
 * @property \Pdd\Ddk\Top\Goods\ListClient\ListClient $list
 */
class Goods extends BaseClient
{
    /**
     * @param $property
     *
     * @return mixed
     * @throws InvalidArgumentException
     */
    public function __get($property)
    {
        if (isset($this->app["ddk.top.goods.{$property}"])) {
            return $this->app["ddk.top.goods.{$property}"];
        }

        throw new InvalidArgumentException(sprintf('No Pdd.Ddk.Top.Goods service named "%s".', $property));
    }
}