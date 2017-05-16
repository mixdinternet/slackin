<?php

namespace Mixdinternet\Slackin\Providers;

use Illuminate\Support\ServiceProvider;

class SlackinServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->setRoutes();

        $this->loadViews();

        $this->loadTranslations();

        $this->publish();
    }

    public function register()
    {
        $this->loadConfigs();
    }

    protected function setRoutes()
    {
        if (!$this->app->routesAreCached()) {
            $this->app->router->group(['namespace' => 'Mixdinternet\Slackin\Http\Controllers'],
                function () {
                    require __DIR__ . '/../routes/web.php';
                });
        }
    }

    protected function loadViews()
    {
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'mixdinternet/slackin');
    }

    protected function loadTranslations()
    {
        $this->loadTranslationsFrom(__DIR__ . '/../resources/lang', 'slackin');
    }

    protected function loadConfigs()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/mslackin.php', 'services');
    }

    protected function publish()
    {
        $this->publishes([
            __DIR__ . '/../resources/views' => base_path('resources/views/vendor/mixdinternet/slackin'),
        ], 'views');

        $this->publishes([
            __DIR__ . '/../config' => base_path('config'),
        ], 'config');
    }
}
