<?php

namespace Kolpikov\Youtube\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * Class Youtube
 * @package Kolpikov\Youtube\Facades
 */
class Youtube extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'Youtube';
    }
}
