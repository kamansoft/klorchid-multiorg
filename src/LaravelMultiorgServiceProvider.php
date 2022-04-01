<?php

namespace Kamansoft\LaravelMultiorg;

use Illuminate\Support\ServiceProvider;
use Kamansoft\LaravelMultiorg\Console\Commands\LaravelMultiorgInstallCommand;

class LaravelMultiorgServiceProvider extends ServiceProvider
{


    /**
     * The available command shortname.
     *
     * @var array
     */
    public $commands = [
        LaravelMultiorgInstallCommand::class,

    ];

    public function register()
    {
        /*$this->mergeConfigFrom(
            __DIR__ . '/../config/klorchid_package_config.php', 'laravel-multiorg'
        );*/
        $this
            //->registerProviders()
            //->registerRepository()
            //->registerMiddlewaresAlias()
            //->reisterMiddlewareGroups()
            //->registerKmigrationCreator()
            //->registerKmigrationCommandSingleton()
            //->registerNotificater()
            //->registerNotificator()
            ->registerCommands();
    }

    protected function registerCommands(): self
    {
        if ($this->app->runningInConsole()) {
            $this->commands($this->commands);
        }

        return $this;
    }

    public function boot()
    {

        //$this->dashboard = $dashboard;
        $this
            //->registerKlorchidModelsForOrchid()
            ->registerConfig()
            //->registerKlorchid()
            //->registerProviders()
            //->registerTranslations()
            ->registerMigrations()
            //->registerSeeders()
            //->registerMiddlewaresAlias()
            //->reisterMiddlewareGroups()
            //->registerRoutes()
            //->registerViews()
        ;

        //$this->registerPermissions($dashboard);

    }

    protected function registerMigrations(): self
    {

        if ($this->app->runningInConsole()) {
            // Export the migration
            $this->publishes([
                __DIR__ . '/../database/migrations/2022_03_16_104841_create_organizations_table.php' => database_path('migrations/2022_03_16_104841_create_organizations_table.php'),
            ], 'laravel-multiorg-migrations');


        }

        return $this;
    }

    /**
     * Register configuration.
     *
     * @return $this
     */
    protected function registerConfig(): self
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../config/package_defaults.php', 'laravel-multiorg'
        );

         if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/package_defaults.php' => config_path('laravel-multiorg.php'),
            ], 'laravel-multiorg-migrations');
        }

        return $this;
    }
}