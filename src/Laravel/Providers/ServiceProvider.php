<?php
declare(strict_types=1);

namespace Zae\ContentSecurityPolicy\Laravel\Providers;

/**
 * @author    Ezra Pool <ezra@tsdme.nl>
 * @copyright Ezra Pool
 */

use View;
use Zae\ContentSecurityPolicy\Composers\CspViewComposer;
use Zae\ContentSecurityPolicy\Contracts\Builder;
use Illuminate\Support\ServiceProvider as LaravelServiceProvider;
use \Zae\ContentSecurityPolicy\Builder as ConcreteCSP;
use Zae\ContentSecurityPolicy\Contracts\NonceGenerator;

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
        $this->app->bind(NonceGenerator::class, ConcreteCSP::class);
        $this->app->bind(Builder::class, ConcreteCSP::class);
        $this->app->alias(Builder::class, 'csp');
    }

    /**
     * Boot the application services.
     */
    public function boot(): void
    {
        View::composer(
            '*', CspViewComposer::class
        );
    }
}

