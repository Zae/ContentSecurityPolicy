<?php

namespace Zae\ContentSecurityPolicy\Directives;

/**
 * @author    Ezra Pool <ezra@tsdme.nl>
 * @copyright Ezra Pool
 */

/**
 * Class UpgradeInsecureRequests
 *
 * @package Zae\ContentSecurityPolicy\Directives
 */
class UpgradeInsecureRequests extends NoValueDirective
{
    //todo: this directive has no value, check if that works!
    const KEY = 'upgrade-insecure-requests';

    function getKey()
    {
        return static::KEY;
    }
}