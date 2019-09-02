<?php
declare(strict_types=1);

namespace Zae\ContentSecurityPolicy\Directives;

/**
 * @author    Ezra Pool <ezra@tsdme.nl>
 * @copyright Ezra Pool
 */

use Zae\ContentSecurityPolicy\Builder;
use Zae\ContentSecurityPolicy\Contracts\Directive as DirectiveContract;
use function implode;
use function sprintf;

/**
 * Class Directive
 *
 * @package Zae\ContentSecurityPolicy\Directives
 */
abstract class Directive implements DirectiveContract
{
    public const KEY            = '';

    public const SELF           = "'self'";
    public const UNSAFE_INLINE  = "'unsafe-inline'";
    public const UNSAFE_EVAL    = "'unsafe-eval'";
    public const STRICT_DYNAMIC = "'strict-dynamic'";
    public const NONCE          = 'nonce';
    public const NONE           = "'none'";

    /**
     * Get the key of the directive
     *
     * @return mixed
     */
    public function getKey(): string
    {
        return static::KEY;
    }

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
    public function addValue($source): void
    {
        if ($source === static::NONCE) {
            $source = sprintf(
                "'%s-%s'",
                'nonce',
                Builder::getStaticNonce()
            );
        }

        $this->values[] = $source;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return sprintf(
            '%s %s',
            $this->getKey(),
            implode(' ', $this->values)
        );
    }
}
