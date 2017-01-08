<?php

namespace Zae\ContentSecurityPolicy\Directives;

/**
 * @author    Ezra Pool <ezra@tsdme.nl>
 * @copyright Ezra Pool
 */

use Zae\ContentSecurityPolicy\Builder;

/**
 * Class StyleSrc
 *
 * @package Zae\ContentSecurityPolicy\Directives
 */
class StyleSrc extends Directive
{
    const KEY = 'style-src';

    function getKey()
    {
        return static::KEY;
    }
}