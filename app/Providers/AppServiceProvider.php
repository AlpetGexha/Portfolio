<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Str;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();

        /**
         * Read time of the post 200word = 1min
         */
        Str::macro('readTime', function (...$text) {
            $totalWords = str_word_count(implode(" ", $text));
            $minutesToRead = round($totalWords / 200);

            return (int)max(1, $minutesToRead);
        });

        Str::macro('removehtml', function ($text) {
            return preg_replace('/(\n){1,}/m', '<br />', stripcslashes(strip_tags($text)));
        });

        Str::macro('realReadTime', function ($text) {
            return Str::readTime(Str::removehtml($text));
        });
    }
}
