<?php

namespace Kolpikov\Youtube;

use Illuminate\Support\ServiceProvider;

/**
 * Class YoutubeServiceProvider
 * @package Kolpikov\Youtube
 */
class YoutubeServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot(): void
    {
        $this->registerPublishes();
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/youtube.php', 'youtube');

        $this->app->singleton('Youtube', function () {
            return new Youtube(config('youtube.key'));
        });
    }


    /**
     * Setup the resource publishing groups for Youtube.
     *
     * @return void
     */
    protected function registerPublishes(): void
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/youtube.php' => config_path('youtube.php'),
            ], 'laravel-youtube-config');
        }
    }
}
