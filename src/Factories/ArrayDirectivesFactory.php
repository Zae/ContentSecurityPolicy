<?php
declare(strict_types=1);

namespace Zae\ContentSecurityPolicy\Factories;

/**
 * @author    Ezra Pool <ezra@tsdme.nl>
 * @copyright Ezra Pool
 */

use Zae\ContentSecurityPolicy\Contracts\Builder;
use function is_numeric;
use function is_string;

/**
 * Class ArrayDirectivesFactory
 *
 * @package Zae\ContentSecurityPolicy\Factories
 */
class ArrayDirectivesFactory
{
    /**
     * @param Builder $builder
     * @param array   $directives
     */
    public static function create(Builder $builder, array $directives = []): void
    {
        foreach ($directives as $directive => $settings) {

            /*
             * support simple array structures for directives that take no
             * values, they will be values of the input array, not the keys.
             */
            if (is_numeric($directive) && is_string($settings)) {
                $directive = $settings;
                $settings = [];
            }

            $builder->setDirective(new $directive($settings));
        }
    }
}


