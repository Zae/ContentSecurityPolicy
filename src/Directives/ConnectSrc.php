<?php

namespace Zae\ContentSecurityPolicy\Directives;

/**
 * @author    Ezra Pool <ezra@tsdme.nl>
 * @copyright Ezra Pool
 */

/**
 * Class ConnectSrc
 *
 * @package Zae\ContentSecurityPolicy\Directives
 */
class ConnectSrc extends Directive
{
    const KEY = 'connect-src';

    function getKey()
    {
        return static::KEY;
    }
}