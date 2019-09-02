<?php
declare(strict_types=1);

namespace Zae\ContentSecurityPolicy\Contracts;

/**
 * Interface NonceGenerator
 *
 * @package Zae\ContentSecurityPolicy\Contracts
 */
interface NonceGenerator
{
    /**
     * @return string
     */
    public function getNonce(): string;

    /**
     * @return string
     */
    public static function getStaticNonce(): string;
}
