<?php

namespace Zae\ContentSecurityPolicy;

/**
 * @author    Ezra Pool <ezra@tsdme.nl>
 * @copyright Ezra Pool
 */

use Zae\ContentSecurityPolicy\Contracts\Directive;

/**
 * Class CSP
 *
 * @package Zae\ContentSecurityPolicy
 */
class Builder implements Contracts\Builder
{
    const NONCE_LENGTH = 12;
    private static $nonce;

    /**
     * @var Collections\Directives
     */
    private $directives;

    /**
     * CSP constructor.
     */
    function __construct()
    {
        $this->directives = new Collections\Directives();
        static::$nonce = $this->generateNonce();
    }

    /**
     * @param Directive $source
     */
    public function setDirective(Directive $source)
    {
        $this->directives->attach($source);
    }

    public static function getNonce()
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
    private function build()
    {
        return join(';', $this->directives->toArray());
    }

    private function generateNonce()
    {
        return base64_encode(random_bytes(self::NONCE_LENGTH));
    }
}