<?php

namespace Pdd\Ddk\Rp\Prom;

use Pdd\BaseClient;
use SDK\Kernel\Exceptions\InvalidArgumentException;

/**
 * @property \Pdd\Ddk\Rp\Prom\Url\Url $url
 */
class Prom extends BaseClient
{
    /**
     * @param $property
     *
     * @return mixed
     * @throws InvalidArgumentException
     */
    public function __get($property)
    {
        if (isset($this->app["ddk.rp.prom.{$property}"])) {
            return $this->app["ddk.rp.prom.{$property}"];
        }

        throw new InvalidArgumentException(sprintf('No Pdd.Ddk.Rp.Prom service named "%s".', $property));
    }
}