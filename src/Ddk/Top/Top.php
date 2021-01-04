<?php

namespace Pdd\Ddk\Top;

use Pdd\BaseClient;
use SDK\Kernel\Exceptions\InvalidArgumentException;

/**
 * @property \Pdd\Ddk\Top\Goods\Goods $goods
 */
class Top extends BaseClient
{
    /**
     * @param $property
     *
     * @return mixed
     * @throws InvalidArgumentException
     */
    public function __get($property)
    {
        if (isset($this->app["ddk.top.{$property}"])) {
            return $this->app["ddk.top.{$property}"];
        }

        throw new InvalidArgumentException(sprintf('No Pdd.Ddk.Top service named "%s".', $property));
    }
}