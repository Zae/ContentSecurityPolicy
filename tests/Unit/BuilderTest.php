<?php
declare(strict_types=1);

namespace Zae\ContentSecurityPolicy\Tests\Unit;

use PHPUnit\Framework\TestCase;
use Zae\ContentSecurityPolicy\Builder;
use Zae\ContentSecurityPolicy\Directives\BaseUri;
use Zae\ContentSecurityPolicy\Directives\DefaultSrc;

/**
 * Class DirectivesTest
 *
 * @package Zae\ContentSecurityPolicy\Tests\Unit
 */
class BuilderTest extends TestCase
{
    /**
     * @test
     * @group        builder
     */
    public function general(): void
    {
        $builder = new Builder();

        $builder->setDirective(new BaseUri('*'));
        $builder->setDirective(new DefaultSrc('https:'));

        static::assertEquals('base-uri *;default-src https:', (string)$builder);
    }

    /**
     * @test
     * @group        builder
     */
    public function nonce(): void
    {
        $builder = new Builder();

        static::assertNotEmpty($builder->getNonce());
    }

    /**
     * @test
     * @group        builder
     */
    public function nonceInDirectives(): void
    {
        $builder = new Builder();

        $src = new DefaultSrc();
        $src->addValue('https:');
        $src->addValue(DefaultSrc::NONCE);

        $builder->setDirective(new BaseUri('*'));
        $builder->setDirective($src);

        $nonce = $builder->getNonce();

        static::assertEquals("base-uri *;default-src https: 'nonce-{$nonce}'", (string)$builder);
    }
}
