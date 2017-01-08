<?php

namespace Zae\ContentSecurityPolicy\Translators;

/**
 * @author    Ezra Pool <ezra@tsdme.nl>
 * @copyright Ezra Pool
 */

use Zae\ContentSecurityPolicy\Builder;

/**
 * Class BaseTranslator
 *
 * @package Zae\ContentSecurityPolicy\Translators
 */
abstract class BaseTranslator
{
    const HEADER_NAME = 'Content-Security-Policy';

    /**
     * @var Builder
     */
    protected $builder;

    /**
     * @param $headers
     *
     * @return string
     */
    abstract public function translate($headers);

    public function __construct(Builder $builder)
    {
        $this->builder = $builder;
    }
}