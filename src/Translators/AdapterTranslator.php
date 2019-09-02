<?php
declare(strict_types=1);

namespace Zae\ContentSecurityPolicy\Translators;

/**
 * @author    Ezra Pool <ezra@tsdme.nl>
 * @copyright Ezra Pool
 */

use Zae\ContentSecurityPolicy\Contracts\Headers;

/**
 * Class AdapterTranslator
 *
 * @package Zae\ContentSecurityPolicy\Translators
 */
class AdapterTranslator extends BaseTranslator
{
    /**
     * @param Headers $headers
     */
    public function translate(Headers $headers): void
    {
        $builder = (string)$this->builder;

        if (!empty($builder)) {
            $headers->set(static::HEADER_NAME, $builder);
        }
    }
}
