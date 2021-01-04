<?php

namespace Pdd\Ddk\Order;

use Pdd\BaseClient;
use SDK\Kernel\Exceptions\InvalidArgumentException;

/**
 * @property \Pdd\Ddk\Order\ListClient\ListClient $list
 */
class Order extends BaseClient
{
    /**
     * @param $property
     *
     * @return mixed
     * @throws InvalidArgumentException
     */
    public function __get($property)
    {
        if (isset($this->app["ddk.order.{$property}"])) {
            return $this->app["ddk.order.{$property}"];
        }

        throw new InvalidArgumentException(sprintf('No Pdd.Ddk.Order service named "%s".', $property));
    }
}