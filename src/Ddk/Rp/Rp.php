<?php

namespace Pdd\Ddk\Rp;

use Pdd\BaseClient;
use SDK\Kernel\Exceptions\InvalidArgumentException;

/**
 * @property \Pdd\Ddk\Rp\Prom\Prom $prom
 */
class Rp extends BaseClient
{
    /**
     * @param $property
     *
     * @return mixed
     * @throws InvalidArgumentException
     */
    public function __get($property)
    {
        if (isset($this->app["ddk.rp.{$property}"])) {
            return $this->app["ddk.rp.{$property}"];
        }

        throw new InvalidArgumentException(sprintf('No Pdd.Ddk.Rp service named "%s".', $property));
    }
}