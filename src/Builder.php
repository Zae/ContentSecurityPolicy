<?php
declare(strict_types=1);

namespace Zae\ContentSecurityPolicy;

/**
 * @author    Ezra Pool <ezra@tsdme.nl>
 * @copyright Ezra Pool
 */

use Zae\ContentSecurityPolicy\Contracts\Directive;
use function base64_encode;
use function implode;
use function random_bytes;

/**
 * Class CSP
 *
 * @package Zae\ContentSecurityPolicy
 */
class Builder implements Contracts\Builder, Contracts\NonceGenerator
{
    private const NONCE_LENGTH = 12;
    private static $nonce;

    /**
     * @var Collections\Directives
     */
    private $directives;

    /**
     * CSP constructor.
     *
     * @throws \Exception
     */
    public function __construct()
    {
        /* do not change the nonce if the constructor
           is called multiple times.
        */
        if (empty(static::$nonce)) {
            static::$nonce = $this->generateNonce();
        }

        $this->directives = new Collections\Directives();
    }

    /**
     * @param Directive $source
     *
     * @throws \Exception
     */
    public function setDirective(Directive $source): void
    {
        $this->directives->attach($source);
    }

    /**
     * @return string
     */
    public function getNonce(): string
    {
        return static::getStaticNonce();
    }

    /**
     * @return string
     */
    public static function getStaticNonce(): string
    {
        return static::$nonce;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->build();
    }

    /**
     * @return string
     */
    private function build(): string
    {
        return implode(';', $this->directives->toArray());
    }

    /**
     * @return string
     * @throws \Exception
     */
    private function generateNonce(): string
    {
        return base64_encode(random_bytes(static::NONCE_LENGTH));
    }
}
