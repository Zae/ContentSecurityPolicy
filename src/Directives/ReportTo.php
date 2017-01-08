<?php

namespace Zae\ContentSecurityPolicy\Directives;

/**
 * @author    Ezra Pool <ezra@tsdme.nl>
 * @copyright Ezra Pool
 */

/**
 * Class ReportTo
 *
 * TODO: find out how this works and implement!
 *
 * @package Zae\ContentSecurityPolicy\Directives
 */
class ReportTo extends Directive
{
    const KEY = 'report-to';

    function getKey()
    {
        return static::KEY;
    }
}