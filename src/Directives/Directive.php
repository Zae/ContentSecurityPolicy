<?php

namespace Zae\ContentSecurityPolicy\Directives;

/**
 * @author    Ezra Pool <ezra@tsdme.nl>
 * @copyright Ezra Pool
 */

use Zae\ContentSecurityPolicy\Contracts\Directive as DirectiveContract;
use Zae\ContentSecurityPolicy\Builder;

/**
 * Class Directive
 *
 * @package Zae\ContentSecurityPolicy\Directives
 */
abstract class Directive implements DirectiveContract
{
    const SELF              = "'self'";
    const UNSAFE_INLINE     = "'unsafe-inline'";
    const UNSAFE_EVAL       = "'unsafe-eval'";
    const STRICT_DYNAMIC    = "'strict-dynamic'";
    const NONCE             = 'nonce';
    const NONE              = "'none'";

    abstract function getKey();

    protected $values = [];

    /**
     * Directive constructor.
     *
     * @param array|string $value
     */
    public function __construct($value = [])
    {
        $values = (array)$value;

        foreach ($values as $v) {
            $this->addValue($v);
        }
    }

    /**
     * @param string $source
     */
    public function addValue($source)
    {
        if ($source === static::NONCE) {
            $source = sprintf("'%s-%s'", 'nonce', Builder::getNonce());
        }

        $this->values[] = $source;
    }

    public function __toString()
    {
        return sprintf('%s %s', $this->getKey(), join(' ', $this->values));
    }
}