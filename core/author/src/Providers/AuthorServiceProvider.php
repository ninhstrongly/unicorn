<?php 

namespace Unicorn\Author\Providers;

use Illuminate\Support\ServiceProvider;

class AuthorServiceProvider extends ServiceProvider
{
    public function boot()
    {
        
        $this->loadRoutesFrom(__DIR__ . '/../../routes/web.php');
        $this->loadViewsFrom(__DIR__ . '/../../resources/views', 'author');
        $this->loadMigrationsFrom(__DIR__ . '/../../database/migrations');
        $this->publishes([
            __DIR__.'/../../public' => public_path(''),
        ], 'public');// /../../public là đường dẫn của core // '' là đường dẫn của project

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../../config/config_request.php' => config_path('config_request.php'),
            ], 'config');
        }
        
    }
}