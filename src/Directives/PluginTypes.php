<?php

namespace Zae\ContentSecurityPolicy\Directives;

/**
 * @author    Ezra Pool <ezra@tsdme.nl>
 * @copyright Ezra Pool
 */

/**
 * Class PluginTypes
 *
 * @package Zae\ContentSecurityPolicy\Directives
 */
class PluginTypes extends Directive
{
    const KEY = 'plugin-types';

    function getKey()
    {
        return static::KEY;
    }
}