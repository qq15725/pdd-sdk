<?php

namespace Pdd\Ddk\Resource;

use Pdd\BaseClient;
use SDK\Kernel\Exceptions\InvalidArgumentException;

/**
 * @property \Pdd\Ddk\Resource\Url\Url $url
 */
class Resource extends BaseClient
{
    /**
     * @param $property
     *
     * @return mixed
     * @throws InvalidArgumentException
     */
    public function __get($property)
    {
        if (isset($this->app["ddk.resource.{$property}"])) {
            return $this->app["ddk.resource.{$property}"];
        }

        throw new InvalidArgumentException(sprintf('No Pdd.Ddk.Resource service named "%s".', $property));
    }
}