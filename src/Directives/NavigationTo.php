<?php

namespace Zae\ContentSecurityPolicy\Directives;

/**
 * @author    Ezra Pool <ezra@tsdme.nl>
 * @copyright Ezra Pool
 */

/**
 * Class NavigationTo
 *
 * TODO: find out how this works and implement!
 *
 * @package Zae\ContentSecurityPolicy\Directives
 */
class NavigationTo extends Directive
{
    const KEY = 'navigation-to';

    function getKey()
    {
        return static::KEY;
    }
}