<?php

namespace Zae\ContentSecurityPolicy\Directives;

/**
 * @author    Ezra Pool <ezra@tsdme.nl>
 * @copyright Ezra Pool
 */

/**
 * Class ReportUri
 *
 * @package Zae\ContentSecurityPolicy\Directives
 */
class ReportUri extends Directive
{
    const KEY = 'report-uri';

    function getKey()
    {
        return static::KEY;
    }
}