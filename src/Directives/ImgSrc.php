<?php

namespace Zae\ContentSecurityPolicy\Directives;

/**
 * @author    Ezra Pool <ezra@tsdme.nl>
 * @copyright Ezra Pool
 */

/**
 * Class ImgSrc
 *
 * @package Zae\ContentSecurityPolicy\Directives
 */
class ImgSrc extends Directive
{
    const KEY = 'img-src';

    function getKey()
    {
        return static::KEY;
    }
}