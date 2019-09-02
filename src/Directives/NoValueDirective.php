<?php
declare(strict_types=1);

namespace Zae\ContentSecurityPolicy\Directives;

use function sprintf;

/**
 * @author    Ezra Pool <ezra@tsdme.nl>
 * @copyright Ezra Pool
 */

/**
 * Class NoValueDirective
 *
 * @package Zae\ContentSecurityPolicy\Directives
 */
trait NoValueDirective
{
    /**
     * @return string
     */
    public function __toString(): string
    {
        return sprintf('%s', $this->getKey());
    }
}
