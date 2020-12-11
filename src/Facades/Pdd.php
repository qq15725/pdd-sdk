<?php

namespace Pdd\Facades;

use Illuminate\Support\Facades\Facade;
use Pdd\Application;

/**
 * @mixin Application
 */
class Pdd extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return Application::class;
    }

    /**
     * @return Application
     */
    public static function getFacadeRoot()
    {
        return parent::getFacadeRoot();
    }
}
