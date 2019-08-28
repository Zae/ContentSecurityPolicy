<?php
declare(strict_types=1);

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
class UpgradeInsecureRequests extends Directive
{
    use NoValueDirective;

    public const KEY = 'upgrade-insecure-requests';
}
