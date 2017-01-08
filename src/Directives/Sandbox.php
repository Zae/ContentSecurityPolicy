<?php

namespace Zae\ContentSecurityPolicy\Directives;

/**
 * @author    Ezra Pool <ezra@tsdme.nl>
 * @copyright Ezra Pool
 */

/**
 * Class Sandbox
 *
 * @package Zae\ContentSecurityPolicy\Directives
 */
class Sandbox extends Directive
{
    const KEY = 'sandbox';

    const ALLOW_FORMS = 'allow-forms';
    const ALLOW_MODALS = 'allow-modals';
    const ALLOW_ORIENTATION_LOCK = 'allow-orientation-lock';
    const ALLOW_POINTER_LOCK = 'allow-pointer-lock';
    const ALLOW_POPUPS = 'allow-popups';
    const ALLOW_POPUPS_TO_ESCAPE_SANDBOX = 'allow-popups-to-escape-sandbox';
    const ALLOW_PRESENTATION = 'allow-presentation';
    const ALLOW_SAME_ORIGIN = 'allow-same-origin';
    const ALLOW_SCRIPTS = 'allow-scripts';
    const ALLOW_TOP_NAVIGATION = 'allow-top-navigation';

    function getKey()
    {
        return static::KEY;
    }
}