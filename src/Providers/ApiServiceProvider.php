<?php

declare(strict_types=1);

namespace MHauri\ApiBundle\Providers;

use Illuminate\Contracts\Debug\ExceptionHandler as IlliminateExceptionHandler;
use Illuminate\Support\ServiceProvider;
use MHauri\ApiBundle\Console\Commands\DocumentationGenerateCommand;
use MHauri\ApiBundle\Exceptions\ExceptionHandler;

class ApiServiceProvider extends ServiceProvider
{
    /**
     * Boot the service provider.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([realpath(__DIR__.'/../../config/api.php') => config_path('api.php')]);
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->registerConfig();
        $this->registerCommands();
        $this->registerExceptionHandler();
    }

    protected function registerConfig()
    {
        $this->mergeConfigFrom(realpath(__DIR__.'/../../config/api.php'), 'api');
    }

    protected function registerCommands()
    {
        $this->app->singleton(DocumentationGenerateCommand::class, function ($app) {
            return new DocumentationGenerateCommand();
        });

        $this->commands([DocumentationGenerateCommand::class]);
    }

    protected function registerExceptionHandler()
    {
        $appExceptionHandler = $this->app->make(IlliminateExceptionHandler::class);

        $this->app->singleton(IlliminateExceptionHandler::class, function ($app) use ($appExceptionHandler) {
            return new ExceptionHandler($appExceptionHandler);
        });
    }
}
