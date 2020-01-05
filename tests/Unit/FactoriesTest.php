<?php
declare(strict_types=1);

namespace Zae\ContentSecurityPolicy\Tests\Unit;

use PHPUnit\Framework\TestCase;
use Zae\ContentSecurityPolicy\Builder;
use Zae\ContentSecurityPolicy\Directives\BaseUri;
use Zae\ContentSecurityPolicy\Directives\DefaultSrc;
use Zae\ContentSecurityPolicy\Directives\Sandbox;
use Zae\ContentSecurityPolicy\Factories\ArrayDirectivesFactory;
use Zae\ContentSecurityPolicy\Factories\FluidDirectivesFactory;

/**
 * Class FactoriesTest
 *
 * @package Zae\ContentSecurityPolicy\Tests\Unit
 */
class FactoriesTest extends TestCase
{
    /**
     * @test
     * @group        factory
     * @dataProvider arrayProvider
     *
     * @param array  $directives
     * @param string $expected
     *
     * @throws \Exception
     */
    public function array(array $directives, string $expected): void
    {
        $builder = new Builder();
        ArrayDirectivesFactory::create($builder, $directives);

        static::assertEquals($expected, (string)$builder);
    }

    /**
     * @return array
     */
    public function arrayProvider(): array
    {
        return [
            [[BaseUri::class => ['https:'], DefaultSrc::class => [DefaultSrc::NONE]], "base-uri https:;default-src 'none'"],
            [[Sandbox::class => [Sandbox::ALLOW_POPUPS], DefaultSrc::class => [DefaultSrc::SELF]], "sandbox allow-popups;default-src 'self'"],
        ];
    }

    /**
     * @test
     * @group        factory
     * @dataProvider fluidProvider
     *
     * @param array $directives
     * @param       $expected
     *
     * @throws \Exception
     */
    public function fluid(array $directives, $expected): void
    {
        $builder = new Builder();

        $factory = (new FluidDirectivesFactory($builder));

        foreach ($directives as $directive => $values) {
            $factory->$directive($values);
        }

        static::assertEquals($expected, (string)$builder);
    }

    /**
     * @return array
     */
    public function fluidProvider(): array
    {
        return [
            [['baseUri' => ['https:'], 'defaultSrc' => [DefaultSrc::NONE]], "base-uri https:;default-src 'none'"],
            [['sandbox' => [Sandbox::ALLOW_POPUPS], 'defaultSrc' => [DefaultSrc::SELF]], "sandbox allow-popups;default-src 'self'"]
        ];
    }
}
