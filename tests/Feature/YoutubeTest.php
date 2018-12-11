<?php

namespace Kolpikov\Youtube\Tests\Feature;

use Kolpikov\Youtube\Tests\TestCase;
use Kolpikov\Youtube\Youtube;

/**
 * Class YoutubeTest
 * @package Kolpikov\Youtube\Tests
 */
class YoutubeTest extends TestCase
{
    /**
     * @expectedException \Kolpikov\Youtube\Exceptions\YoutubeException
     */
    public function testConstructorFailsWithEmptyConfigValue()
    {
        new Youtube('');
    }
}
