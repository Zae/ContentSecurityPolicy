<?php
declare(strict_types=1);

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
    public const KEY = 'sandbox';

    public const ALLOW_FORMS = 'allow-forms';
    public const ALLOW_MODALS = 'allow-modals';
    public const ALLOW_ORIENTATION_LOCK = 'allow-orientation-lock';
    public const ALLOW_POINTER_LOCK = 'allow-pointer-lock';
    public const ALLOW_POPUPS = 'allow-popups';
    public const ALLOW_POPUPS_TO_ESCAPE_SANDBOX = 'allow-popups-to-escape-sandbox';
    public const ALLOW_PRESENTATION = 'allow-presentation';
    public const ALLOW_SAME_ORIGIN = 'allow-same-origin';
    public const ALLOW_SCRIPTS = 'allow-scripts';
    public const ALLOW_TOP_NAVIGATION = 'allow-top-navigation';
}
