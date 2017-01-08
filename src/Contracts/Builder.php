<?php

namespace Zae\ContentSecurityPolicy\Contracts;

/**
 * @author    Ezra Pool <ezra@tsdme.nl>
 * @copyright Ezra Pool
 */

/**
 * Class CSP
 *
 * @package Zae\ContentSecurityPolicy
 */
interface Builder
{
    /**
     * @param Directive $source
     */
    public function setDirective(Directive $source);
}