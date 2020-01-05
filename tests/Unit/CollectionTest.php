<?php
declare(strict_types=1);

namespace Zae\ContentSecurityPolicy\Tests\Unit;

use PHPUnit\Framework\TestCase;
use Zae\ContentSecurityPolicy\Collections\Directives;
use Zae\ContentSecurityPolicy\Contracts\Directive;
use Zae\ContentSecurityPolicy\Directives\BaseUri;
use Zae\ContentSecurityPolicy\Directives\DefaultSrc;

/**
 * Class CollectionTest
 *
 * @package Zae\ContentSecurityPolicy\Tests\Unit
 */
class CollectionTest extends TestCase
{
    /**
     * @test
     * @group        builder
     */
    public function attach(): void
    {
        $collection = new Directives();

        $collection->attach(new BaseUri('*'));
        $collection->attach(new DefaultSrc('https:'));

        static::assertEquals(2, $collection->count());
    }

    /**
     * @test
     * @group        builder
     */
    public function it_only_allows_directives(): void
    {
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('Only classes that implement ' . Directive::class . ' are allowed');

        $collection = new Directives();

        $collection->attach('default-src https:');
    }
}
