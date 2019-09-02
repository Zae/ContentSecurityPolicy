<?php
declare(strict_types=1);

namespace Zae\ContentSecurityPolicy\Translators;

/**
 * @author    Ezra Pool <ezra@tsdme.nl>
 * @copyright Ezra Pool
 */

use Zae\ContentSecurityPolicy\Contracts\Builder;
use Zae\ContentSecurityPolicy\Contracts\Headers;

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
     * @param Headers $headers
     */
    abstract public function translate(Headers $headers): void;

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
