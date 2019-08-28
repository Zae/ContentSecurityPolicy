<?php
declare(strict_types=1);

namespace Zae\ContentSecurityPolicy\Contracts;

/**
 * @author    Ezra Pool <ezra@tsdme.nl>
 * @copyright Ezra Pool
 */

/**
 * Class Directive
 *
 * @package Zae\ContentSecurityPolicy\Directives
 */
interface Directive
{
    /**
     * Get the key of the directive
     *
     * @return string
     */
    function getKey(): string;

    /**
     * @param string $source
     */
    public function addValue($source): void;
}
