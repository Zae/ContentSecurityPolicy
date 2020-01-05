<?php
declare(strict_types=1);

namespace Zae\ContentSecurityPolicy\Tests\Feature;

use Illuminate\Foundation\Application;
use Zae\ContentSecurityPolicy\Directives\BlockAllMixedContent;
use Zae\ContentSecurityPolicy\Directives\Sandbox;
use Zae\ContentSecurityPolicy\Laravel\Http\Middleware\ContentSecurityPolicy;
use Zae\ContentSecurityPolicy\Tests\LaravelTestCase;

/**
 * Class LaravelMiddlewareTest
 *
 * @package Feature
 */
class LaravelMiddlewareTest extends LaravelTestCase
{
    /**
     * @param Application $application
     */
    protected function CSPConfig(Application $application): void
    {
        $application->config->set('csp', [
            BlockAllMixedContent::class,
            Sandbox::class => [
                Sandbox::ALLOW_FORMS,
                Sandbox::ALLOW_SCRIPTS,
                Sandbox::ALLOW_TOP_NAVIGATION,
                Sandbox::ALLOW_SAME_ORIGIN,
                Sandbox::ALLOW_POPUPS,
            ]
        ]);
    }

    /**
     * @test
     * @group laravel
     * @group middleware
     *
     * @environment-setup CSPConfig
     */
    public function it_sends_the_correct_headers()
    {
        $this->app->make('router')->get('/', [
            'middleware' => ContentSecurityPolicy::class,
            'uses' => function() {return '';},
            'as' => 'middleware.test'
        ]);

        $this->get(route('middleware.test'))
            ->assertHeader('Content-Security-Policy', 'block-all-mixed-content;sandbox allow-forms allow-scripts allow-top-navigation allow-same-origin allow-popups')
            ->assertStatus(200);
    }
}
