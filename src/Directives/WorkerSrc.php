<?php

namespace Zae\ContentSecurityPolicy\Directives;

/**
 * @author    Ezra Pool <ezra@tsdme.nl>
 * @copyright Ezra Pool
 */

/**
 * Class WorkerSrc
 *
 * @package Zae\ContentSecurityPolicy\Directives
 */
class WorkerSrc extends Directive
{
    const KEY = 'worker-src';

    function getKey()
    {
        return static::KEY;
    }
}