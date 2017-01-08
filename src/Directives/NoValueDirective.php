<?php

namespace Zae\ContentSecurityPolicy\Directives;

/**
 * @author    Ezra Pool <ezra@tsdme.nl>
 * @copyright Ezra Pool
 */

/**
 * Class NoValueDirective
 *
 * @package Zae\ContentSecurityPolicy\Directives
 */
abstract class NoValueDirective extends Directive
{
    public function __toString()
    {
        return sprintf('%s', $this->getKey());
    }
}