<?php

namespace Zae\ContentSecurityPolicy\Directives;

/**
 * @author    Ezra Pool <ezra@tsdme.nl>
 * @copyright Ezra Pool
 */

/**
 * Class FrameAncestors
 *
 * @package Zae\ContentSecurityPolicy\Directives
 */
class FrameAncestors extends Directive
{
    const KEY = 'frame-ancestors';

    function getKey()
    {
        return static::KEY;
    }
}