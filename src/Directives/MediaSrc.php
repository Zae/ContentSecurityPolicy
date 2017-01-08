<?php

namespace Zae\ContentSecurityPolicy\Directives;

/**
 * @author    Ezra Pool <ezra@tsdme.nl>
 * @copyright Ezra Pool
 */

/**
 * Class MediaSrc
 *
 * @package Zae\ContentSecurityPolicy\Directives
 */
class MediaSrc extends Directive
{
    const KEY = 'media-src';

    function getKey()
    {
        return static::KEY;
    }
}