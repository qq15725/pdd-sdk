<?php

namespace Pdd\Ddk\Member;

use Pdd\BaseClient;
use SDK\Kernel\Exceptions\InvalidArgumentException;

/**
 * @property \Pdd\Ddk\Member\Authority\Authority $authority
 */
class Member extends BaseClient
{
    /**
     * @param $property
     *
     * @return mixed
     * @throws InvalidArgumentException
     */
    public function __get($property)
    {
        if (isset($this->app["ddk.member.{$property}"])) {
            return $this->app["ddk.member.{$property}"];
        }

        throw new InvalidArgumentException(sprintf('No Pdd.Ddk.Member service named "%s".', $property));
    }
}