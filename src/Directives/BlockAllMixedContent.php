<?php
declare(strict_types=1);

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
class BlockAllMixedContent extends Directive
{
    use NoValueDirective;

    public const KEY = 'block-all-mixed-content';
}

