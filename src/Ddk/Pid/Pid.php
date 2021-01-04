<?php

namespace Pdd\Ddk\Pid;

use Pdd\BaseClient;
use SDK\Kernel\Exceptions\InvalidArgumentException;

/**
 * @property \Pdd\Ddk\Pid\Mediaid\Mediaid $mediaid
 */
class Pid extends BaseClient
{
    /**
     * @param $property
     *
     * @return mixed
     * @throws InvalidArgumentException
     */
    public function __get($property)
    {
        if (isset($this->app["ddk.pid.{$property}"])) {
            return $this->app["ddk.pid.{$property}"];
        }

        throw new InvalidArgumentException(sprintf('No Pdd.Ddk.Pid service named "%s".', $property));
    }
}