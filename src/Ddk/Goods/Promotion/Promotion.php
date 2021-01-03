<?php

namespace Pdd\Ddk\Goods\Promotion;

use Pdd\BaseClient;
use SDK\Kernel\Exceptions\InvalidArgumentException;

/**
 * @property \Pdd\Ddk\Goods\Promotion\Url\Url $url
 */
class Promotion extends BaseClient
{
    /**
     * @param $property
     *
     * @return mixed
     * @throws InvalidArgumentException
     */
    public function __get($property)
    {
        if (isset($this->app["ddk.goods.promotion.{$property}"])) {
            return $this->app["ddk.goods.promotion.{$property}"];
        }

        throw new InvalidArgumentException(sprintf('No Pdd.Ddk.Goods.Promotion service named "%s".', $property));
    }
}