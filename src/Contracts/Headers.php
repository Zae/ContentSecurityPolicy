<?php
declare(strict_types=1);

namespace Zae\ContentSecurityPolicy\Contracts;

/**
 * @author    Ezra Pool <ezra@tsdme.nl>
 * @copyright Ezra Pool
 */

/**
 * Interface Headers
 *
 * @package Zae\ContentSecurityPolicy\Contracts
 */
interface Headers
{
    /**
     * @param string $name
     * @param string $value
     */
    public function set(string $name, string $value): void;
}
