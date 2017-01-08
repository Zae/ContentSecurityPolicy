<?php

namespace Zae\ContentSecurityPolicy\Directives;

/**
 * @author    Ezra Pool <ezra@tsdme.nl>
 * @copyright Ezra Pool
 */

/**
 * Class BaseUri
 *
 * @package Zae\ContentSecurityPolicy\Directives
 */
class BaseUri extends Directive
{
    const KEY = 'base-uri';

    function getKey()
    {
        return static::KEY;
    }
}