<?php

namespace Origami\Seo;

use Illuminate\Support\ServiceProvider;

class SeoServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/config/seo.php' => config_path('seo.php'),
        ]);
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/config/seo.php',
            'seo'
        );

        $this->app->singleton(Seo::class, function ($app) {
            $config = $app['config']->get('seo', []);
            return new Seo($config);
        });

        $this->app->alias(Seo::class, 'origami.seo');
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['origami.seo'];
    }
}
