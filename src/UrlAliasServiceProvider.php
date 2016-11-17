<?php

namespace Hobord\UrlAlias;

use Illuminate\Support\ServiceProvider;
use Hobord\UrlAlias\Http\Middleware\UrlAliasMiddleware;

class UrlAliasServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot(\Illuminate\Contracts\Http\Kernel $kernel)
    {
        $this->publishes([
            __DIR__.'/database/migrations' => database_path('migrations'),
        ], 'migrations');

        $kernel->prependMiddleware(UrlAliasMiddleware::class);

    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
