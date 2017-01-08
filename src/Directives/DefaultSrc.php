<?php

namespace Zae\ContentSecurityPolicy\Directives;

/**
 * @author    Ezra Pool <ezra@tsdme.nl>
 * @copyright Ezra Pool
 */

/**
 * Class DefaultSrc
 *
 * @package Zae\ContentSecurityPolicy\Directives
 */
class DefaultSrc extends Directive
{
    const KEY = 'default-src';

    function getKey()
    {
        return static::KEY;
    }
}