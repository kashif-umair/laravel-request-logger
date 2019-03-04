<?php namespace AgelxNash\RequestLogger;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;

class ServiceProvider extends BaseServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/request-logger.php' => config_path('request-logger.php')
        ], 'config');

        $this->mergeConfigFrom(
            __DIR__ . '/../config/request-logger.php', 'request-logger'
        );
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->middleware(Middleware::class);
    }
}
