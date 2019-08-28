<?php
declare(strict_types=1);

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
    public const KEY = 'require-sri-for';

    public const SRI_TYPE_SCRIPT = 'script';
    public const SRI_TYPE_STYLE  = 'style';
}
