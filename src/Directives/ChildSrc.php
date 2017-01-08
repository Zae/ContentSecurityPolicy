<?php

namespace Zae\ContentSecurityPolicy\Directives;

/**
 * @author    Ezra Pool <ezra@tsdme.nl>
 * @copyright Ezra Pool
 */

/**
 * Class ChildSrc
 *
 * @package Zae\ContentSecurityPolicy\Directives
 */
class ChildSrc extends Directive
{
    const KEY = 'child-src';

    function getKey()
    {
        return static::KEY;
    }
}