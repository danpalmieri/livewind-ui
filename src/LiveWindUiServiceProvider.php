<?php

namespace DanPalmieri\LiveWindUi;

use Illuminate\Support\ServiceProvider;

class LiveWindUiServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'lui');

        $this->publishes([
            __DIR__ . '/../resources/views' => resource_path('views/vendor/lui'),
        ]);
    }
}
