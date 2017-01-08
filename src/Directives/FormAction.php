<?php

namespace Zae\ContentSecurityPolicy\Directives;

/**
 * @author    Ezra Pool <ezra@tsdme.nl>
 * @copyright Ezra Pool
 */

/**
 * Class FormAction
 *
 * @package Zae\ContentSecurityPolicy\Directives
 */
class FormAction extends Directive
{
    const KEY = 'form-action';

    function getKey()
    {
        return static::KEY;
    }
}