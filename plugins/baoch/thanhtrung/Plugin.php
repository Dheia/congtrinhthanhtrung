<?php namespace Baoch\Thanhtrung;

use Illuminate\Database\DatabaseManager;
use System\Classes\PluginBase;

class Plugin extends PluginBase
{
    public function registerComponents()
    {
    }

    public function registerSettings()
    {
    }

    public function boot()
    {
        if (\App::runningInBackend()) {
            $this->app->singleton(DatabaseManager::class, function ($app) {
                return $app->make('db');
            });
        }
    }
}
