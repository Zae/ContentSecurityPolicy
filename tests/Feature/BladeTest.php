<?php
declare(strict_types=1);

namespace Zae\ContentSecurityPolicy\Tests\Feature;

use Illuminate\View\Factory;
use Zae\ContentSecurityPolicy\Builder;
use Zae\ContentSecurityPolicy\Composers\CspViewComposer;
use Zae\ContentSecurityPolicy\Tests\LaravelTestCase;

/**
 * Class BladeTest
 *
 * @package Zae\ContentSecurityPolicy\Tests\Feature
 */
class BladeTest extends LaravelTestCase
{
    /**
     * @test
     * @group laravel
     * @group view
     * @group blade
     */
    public function nonceComposer(): void
    {
        $builder = new Builder();

        /** @var Factory $factory */
        $factory = $this->app->make('view');
        $factory->composer('blade.test', CspViewComposer::class);
        $factory->addLocation(__DIR__ . '/../assets/views');

        $view = $factory->make('blade.test');

        $this->assertEquals($builder->getNonce() . "\n", $view->render());
    }
}
