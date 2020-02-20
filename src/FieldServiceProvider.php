<?php

namespace Emilianotisato\NovaTinyMCE;

use Laravel\Nova\Nova;
use Laravel\Nova\Events\ServingNova;
use Illuminate\Support\ServiceProvider;
use Emilianotisato\NovaTinyMCE\Console\SupportFileManagerCommand;

class FieldServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            realpath(__DIR__ . '/../dist/tinymce') => public_path('vendor/tinymce'),
        ], 'public');

        $this->publishes([
            __DIR__.'/../config/nova-tinymce.php' => config_path('nova-tinymce.php'),
        ], 'config');

        Nova::serving(function (ServingNova $event) {
            Nova::script('Nova-TinyMCE-tinymce', __DIR__.'/../dist/js/tinymce.js');
            Nova::script('Nova-TinyMCE', __DIR__.'/../dist/js/field.js');
            Nova::style('Nova-TinyMCE', __DIR__.'/../dist/css/field.css');
        });

        if ($this->app->runningInConsole()) {
            $this->commands([
                SupportFileManagerCommand::class
            ]);
        }
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/nova-tinymce.php', 'nova-tinymce');
    }
}
