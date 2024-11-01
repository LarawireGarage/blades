<?php

namespace LarawireGarage\Livepinestrap;

use Illuminate\Support\ServiceProvider;

class BladesServiceProvider extends ServiceProvider
{
    public function register()
    {

    }
    public function boot()
    {
        $this->registerConfigs()
            ->registerViews()
            ->registerComponents();

        if ($this->app->runningInConsole()) {
            $this->registerCommands()
                ->publishResources();
        }
    }

    public function registerConfigs()
    {
        $this->mergeConfigFrom(__DIR__ . '/../configs/blades.php', 'blades');
        return $this;
    }
    public function registerViews()
    {
        // $this->loadViewsFrom(__DIR__ . '/../resources/views/components', 'blades');
        return $this;
    }
    public function registerComponents()
    {
        return $this;
    }
    public function registerCommands()
    {
        return $this;
    }
    public function publishResources()
    {
        return $this;
    }
}