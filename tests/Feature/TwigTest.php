<?php
declare(strict_types=1);

namespace Zae\ContentSecurityPolicy\Tests\Feature;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use Zae\ContentSecurityPolicy\Builder;
use Zae\ContentSecurityPolicy\Tests\GenericTestCase;
use Zae\ContentSecurityPolicy\Twig\Extensions\ContentSecurityPolicy;

/**
 * Class BladeTest
 *
 * @package Zae\ContentSecurityPolicy\Tests\Feature
 */
class TwigTest extends GenericTestCase
{
    /**
     * @test
     * @group laravel
     * @group view
     * @group blade
     */
    public function nonceFunction(): void
    {
        $builder = new Builder();

        $loader = new FilesystemLoader(__DIR__ . '/../assets/views');
        $twig = new Environment($loader);
        $twig->addExtension(new ContentSecurityPolicy());

        $template = $twig->load('twig/test.twig');

        $this->assertEquals($builder->getNonce() . "\n", $template->render());
    }
}
