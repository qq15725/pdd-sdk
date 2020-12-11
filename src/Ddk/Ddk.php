<?php

namespace Pdd\Ddk;

use Pdd\BaseClient;
use SDK\Kernel\Exceptions\InvalidArgumentException;

/**
 * @property \Pdd\Ddk\Goods\Goods $goods
 */
class Ddk extends BaseClient
{
    /**
     * @param $property
     *
     * @return mixed
     * @throws InvalidArgumentException
     */
    public function __get($property)
    {
        if (isset($this->app["ddk.{$property}"])) {
            return $this->app["ddk.{$property}"];
        }

        throw new InvalidArgumentException(sprintf('No Pdd.Ddk service named "%s".', $property));
    }
}