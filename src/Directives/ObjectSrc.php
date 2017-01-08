<?php

namespace Zae\ContentSecurityPolicy\Directives;

/**
 * @author    Ezra Pool <ezra@tsdme.nl>
 * @copyright Ezra Pool
 */

/**
 * Class ObjectSrc
 *
 * @package Zae\ContentSecurityPolicy\Directives
 */
class ObjectSrc extends Directive
{
    const KEY = 'object-src';

    function getKey()
    {
        return static::KEY;
    }
}