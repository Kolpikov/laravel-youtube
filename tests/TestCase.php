<?php

namespace Kolpikov\Youtube\Tests;

use Kolpikov\Youtube\YoutubeServiceProvider;

/**
 * Class TestCase
 * @package Kolpikov\Youtube\Tests
 */
class TestCase extends \Orchestra\Testbench\TestCase
{
    /**
     * Get package providers.
     *
     * @param  \Illuminate\Foundation\Application $app
     *
     * @return array
     */
    protected function getPackageProviders($app)
    {
        return [
            YoutubeServiceProvider::class,
        ];
    }
}
