<?php
declare(strict_types=1);

namespace Zae\ContentSecurityPolicy\Tests;

use Orchestra\Testbench\TestCase;
use Zae\ContentSecurityPolicy\Laravel\Providers\ServiceProvider;

/**
 * Class LaravelTestCase
 */
class LaravelTestCase extends TestCase
{
    /**
     * Get package providers.
     *
     * @param  \Illuminate\Foundation\Application  $app
     *
     * @return array
     */
    protected function getPackageProviders($app): array
    {
        return [
            ServiceProvider::class
        ];
    }
}
