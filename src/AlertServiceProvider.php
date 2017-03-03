<?php

/*
 * This file is part of Laravel Alert.
 *
 * (c) Vincent Klaiber <hello@vinkla.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Vinkla\Alert;

use Illuminate\Contracts\Container\Container;
use Illuminate\Support\ServiceProvider;

/**
 * This is the alert service provider class.
 *
 * @author Vincent Klaiber <hello@vinkla.com>
 */
class AlertServiceProvider extends ServiceProvider
{
    /**
     * Boot the service provider.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'alert');
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->registerAlert();
    }

    /**
     * Register the alert class.
     *
     * @return void
     */
    protected function registerAlert()
    {
        $this->app->singleton('alert', function (Container $app) {
            $session = $app['session.store'];

            return new Alert($session);
        });

        $this->app->alias('alert', Alert::class);
    }

    /**
     * Get the services provided by the provider.
     *
     * @return string[]
     */
    public function provides()
    {
        return [
            'alert',
        ];
    }
}
