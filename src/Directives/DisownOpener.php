<?php

namespace Zae\ContentSecurityPolicy\Directives;

/**
 * @author    Ezra Pool <ezra@tsdme.nl>
 * @copyright Ezra Pool
 */

/**
 * Class DisownOpener
 *
 * TODO: find out how this works and implement!
 *
 * @package Zae\ContentSecurityPolicy\Directives
 */
class DisownOpener extends Directive
{
    const KEY = 'disown-opener';

    function getKey()
    {
        return static::KEY;
    }
}