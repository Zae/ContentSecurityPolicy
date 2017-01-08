<?php

namespace Zae\ContentSecurityPolicy\Directives;

/**
 * @author    Ezra Pool <ezra@tsdme.nl>
 * @copyright Ezra Pool
 */

/**
 * Class FontSrc
 *
 * @package Zae\ContentSecurityPolicy\Directives
 */
class FontSrc extends Directive
{
    const KEY = 'font-src';

    function getKey()
    {
        return static::KEY;
    }
}