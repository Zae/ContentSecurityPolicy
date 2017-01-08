<?php

namespace Zae\ContentSecurityPolicy\Factories;

/**
 * @author    Ezra Pool <ezra@tsdme.nl>
 * @copyright Ezra Pool
 */

use Zae\ContentSecurityPolicy\Contracts\Directive;
use Zae\ContentSecurityPolicy\Builder;
use Illuminate\Contracts\Config\Repository;

/**
 * Class LaravelDirectivesFactory
 *
 * @package Zae\ContentSecurityPolicy\Factories
 */
class LaravelDirectivesFactory
{
    /**
     * @param Builder    $builder
     * @param Repository $config
     */
    public static function create(Builder &$builder, Repository $config)
    {
        $directives = (array)$config->get('csp');

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


