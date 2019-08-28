<?php
declare(strict_types=1);

namespace Zae\ContentSecurityPolicy\Translators;

/**
 * @author    Ezra Pool <ezra@tsdme.nl>
 * @copyright Ezra Pool
 */

use Symfony\Component\HttpFoundation\HeaderBag;
use Zae\ContentSecurityPolicy\Contracts\Builder;

/**
 * Class BaseTranslator
 *
 * @package Zae\ContentSecurityPolicy\Translators
 */
abstract class BaseTranslator
{
    protected const HEADER_NAME = 'Content-Security-Policy';

    /**
     * @var Builder
     */
    protected $builder;

    /**
     * @param HeaderBag $headers
     *
     * @return HeaderBag
     */
    abstract public function translate(HeaderBag $headers): HeaderBag;

    /**
     * BaseTranslator constructor.
     *
     * @param Builder $builder
     */
    public function __construct(Builder $builder)
    {
        $this->builder = $builder;
    }
}
