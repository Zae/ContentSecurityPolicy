<?php
declare(strict_types=1);

namespace Zae\ContentSecurityPolicy\Tests;

use Mockery;
use PHPUnit\Framework\TestCase;

/**
 * Class GenericTestCase
 *
 * @package Zae\ContentSecurityPolicy\Tests
 */
class GenericTestCase extends TestCase
{
    protected function tearDown(): void
    {
        if (class_exists(Mockery::class)) {
            if ($container = Mockery::getContainer()) {
                $this->addToAssertionCount($container->mockery_getExpectationCount());
            }

            Mockery::close();
        }

        parent::tearDown();
    }
}
