<?php

namespace Pdd\Ddk\Cms\Prom;

use Pdd\BaseClient;
use SDK\Kernel\Exceptions\InvalidArgumentException;

/**
 * @property \Pdd\Ddk\Cms\Prom\Url\Url $url
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
        if (isset($this->app["ddk.cms.prom.{$property}"])) {
            return $this->app["ddk.cms.prom.{$property}"];
        }

        throw new InvalidArgumentException(sprintf('No Pdd.Ddk.Cms.Prom service named "%s".', $property));
    }
}