<?php

namespace Pdd\Ddk\Cms;

use Pdd\BaseClient;
use SDK\Kernel\Exceptions\InvalidArgumentException;

/**
 * @property \Pdd\Ddk\Cms\Prom\Prom $prom
 */
class Cms extends BaseClient
{
    /**
     * @param $property
     *
     * @return mixed
     * @throws InvalidArgumentException
     */
    public function __get($property)
    {
        if (isset($this->app["ddk.cms.{$property}"])) {
            return $this->app["ddk.cms.{$property}"];
        }

        throw new InvalidArgumentException(sprintf('No Pdd.Ddk.Cms service named "%s".', $property));
    }
}