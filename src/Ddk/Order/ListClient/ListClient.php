<?php

namespace Pdd\Ddk\Order\ListClient;

use Pdd\BaseClient;
use SDK\Kernel\Exceptions\InvalidArgumentException;

/**
 * @property \Pdd\Ddk\Order\ListCLient\Increment\Increment $increment
 * @property \Pdd\Ddk\Order\ListCLient\Range\Range $range
 * @property \Pdd\Ddk\Order\ListCLient\Detail\Detail $detail
 */
class ListClient extends BaseClient
{
    /**
     * @param $property
     *
     * @return mixed
     * @throws InvalidArgumentException
     */
    public function __get($property)
    {
        if (isset($this->app["ddk.order.list.{$property}"])) {
            return $this->app["ddk.order.list.{$property}"];
        }

        throw new InvalidArgumentException(sprintf('No Pdd.Ddk.Order.List service named "%s".', $property));
    }
}