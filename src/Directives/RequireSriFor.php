<?php

namespace Zae\ContentSecurityPolicy\Directives;

/**
 * @author    Ezra Pool <ezra@tsdme.nl>
 * @copyright Ezra Pool
 */

/**
 * Class RequireSriFor
 *
 * @package Zae\ContentSecurityPolicy\Directives
 */
class RequireSriFor extends Directive
{
    const KEY = 'require-sri-for';

    const SRI_TYPE_SCRIPT = 'script';
    const SRI_TYPE_STYLE = 'style';

    function getKey()
    {
        return static::KEY;
    }
}