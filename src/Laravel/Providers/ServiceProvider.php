<?php

namespace Zae\ContentSecurityPolicy\Laravel\Providers;

/**
 * @author    Ezra Pool <ezra@tsdme.nl>
 * @copyright Ezra Pool
 */

use Zae\ContentSecurityPolicy\Contracts\Builder;
use Zae\ContentSecurityPolicy\Factories\LaravelDirectivesFactory;
use Illuminate\Contracts\Config\Repository;
use Illuminate\Support\ServiceProvider as LaravelServiceProvider;
use \Zae\ContentSecurityPolicy\Builder as ConcreteCSP;

/**
 * Class ServiceProvider
 *
 * @package Zae\ContentSecurityPolicy\Laravel\Providers
 */
class ServiceProvider extends LaravelServiceProvider
{
    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(['csp' => Builder::class], function()
        {
           return new ConcreteCSP();
        });
    }

    /**
     * @param Repository $config
     */
    public function boot(Repository $config)
    {
        LaravelDirectivesFactory::create($this->app['csp'], $config);
    }

    /**
     * @return array
     */
    public function provides()
    {
        return [ConcreteCSP::class];
    }
}

