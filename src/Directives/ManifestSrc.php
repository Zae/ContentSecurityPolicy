<?php

namespace Zae\ContentSecurityPolicy\Directives;

/**
 * @author    Ezra Pool <ezra@tsdme.nl>
 * @copyright Ezra Pool
 */

/**
 * Class ManifestSrc
 *
 * @package Zae\ContentSecurityPolicy\Directives
 */
class ManifestSrc extends Directive
{
    const KEY = 'manifest-src';

    function getKey()
    {
        return static::KEY;
    }
}