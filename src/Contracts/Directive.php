<?php

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
     * @return mixed
     */
    function getKey();

    /**
     * @param string $source
     */
    public function addValue($source);
}