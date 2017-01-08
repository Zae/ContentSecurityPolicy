<?php

namespace Zae\ContentSecurityPolicy\Directives;

/**
 * @author    Ezra Pool <ezra@tsdme.nl>
 * @copyright Ezra Pool
 */

/**
 * Class ScriptSrc
 *
 * @package Zae\ContentSecurityPolicy\Directives
 */
class ScriptSrc extends Directive
{
    const KEY = 'script-src';

    function getKey()
    {
        return static::KEY;
    }
}