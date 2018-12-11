<?php

namespace Kolpikov\Youtube\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * Class Youtube
 *
 * @method static array getPlaylistItems(string $playListID)
 * @method static array getContentDetails(string $id)
 * @method static string getVideoLength(string $id)
 *
 * @see \Kolpikov\Youtube\Youtube
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
