<?php

namespace LarawireGarage\Blades;

use Illuminate\Support\Facades\Blade;
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
        $this->mergeConfigFrom(__DIR__ . '/../configs/blades.php', 'blades-configs');
        return $this;
    }
    public function registerViews()
    {
        // $this->loadViewsFrom(__DIR__ . '/../resources/views/components/bootstrap', 'bladex');
        Blade::anonymousComponentPath(__DIR__ . '/../resources/views/components/bootstrap', 'bs');
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
        // $this->publishes([__DIR__ . '/../resources/js/mix' => public_path('vendor/larapex-livewire')], 'larapex-livewire-assets'); // Publish assets
        // $this->publishes([__DIR__ . '/../configs/larapex-livewire.php' => config_path('larapex-livewire.php')], 'larapex-livewire-configs'); // publish configs
        return $this;
    }
}