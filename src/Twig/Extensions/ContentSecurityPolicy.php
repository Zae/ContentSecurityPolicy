<?php
declare(strict_types=1);

namespace Zae\ContentSecurityPolicy\Twig\Extensions;

/**
 * @author    Ezra Pool <ezra@tsdme.nl>
 * @copyright Ezra Pool (c) 2019
 */

use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;
use Zae\ContentSecurityPolicy\Builder;

/**
 * Class ContentSecurityPolicy
 *
 * @package Zae\ContentSecurityPolicy\Twig\Extensions
 */
class ContentSecurityPolicy extends AbstractExtension
{
    /**
     * Returns the name of the extension.
     *
     * @return string The extension name
     */
    public function getName()
    {
        return 'ContentSecurityPolicy';
    }

    /**
     * @return array
     */
    public function getFunctions()
    {
        return [
            'cspnonce' => new TwigFunction('cspnonce', [Builder::class, 'getStaticNonce']),
        ];
    }
}
