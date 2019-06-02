<?php

namespace Kolpikov\Youtube\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * Class Youtube
 *
 * @method static array getPlaylists(string $channelID)
 * @method static array getPlaylistItems(string $playListID, array $part = [])
 * @method static array getContentDetails(string $id, array $part = [])
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
