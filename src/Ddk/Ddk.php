<?php

namespace Pdd\Ddk;

use Pdd\BaseClient;
use SDK\Kernel\Exceptions\InvalidArgumentException;

/**
 * @property \Pdd\Ddk\Goods\Goods $goods
 * @property \Pdd\Ddk\Resource\Resource $resource
 * @property \Pdd\Ddk\Cms\Cms $cms
 * @property \Pdd\Ddk\Member\Member $member
 * @property \Pdd\Ddk\Rp\Rp $rp
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