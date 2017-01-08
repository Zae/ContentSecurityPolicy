<?php

namespace Zae\ContentSecurityPolicy\Directives;

/**
 * @author    Ezra Pool <ezra@tsdme.nl>
 * @copyright Ezra Pool
 */

/**
 * Class BlockAllMixedContent
 *
 * @package Zae\ContentSecurityPolicy\Directives
 */
class BlockAllMixedContent extends NoValueDirective
{
    const KEY = 'block-all-mixed-content';

    function getKey()
    {
        return static::KEY;
    }
}

