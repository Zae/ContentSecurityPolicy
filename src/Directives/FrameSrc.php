<?php

namespace Zae\ContentSecurityPolicy\Directives;

/**
 * @author    Ezra Pool <ezra@tsdme.nl>
 * @copyright Ezra Pool (c) 2019
 */

/**
 * Class FrameSrc
 *
 * @package Zae\ContentSecurityPolicy\Directives
 */
class FrameSrc extends Directive
{
    const KEY = 'frame-src';

    function getKey()
    {
        return static::KEY;
    }
}
