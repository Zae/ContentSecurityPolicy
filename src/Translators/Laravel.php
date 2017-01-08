<?php

namespace Zae\ContentSecurityPolicy\Translators;

/**
 * @author    Ezra Pool <ezra@tsdme.nl>
 * @copyright Ezra Pool
 */

use Symfony\Component\HttpFoundation\HeaderBag;

/**
 * Class Laravel
 *
 * @package Zae\ContentSecurityPolicy\Translators
 */
class Laravel extends BaseTranslator
{
    public function translate($headers)
    {
        /** @var HeaderBag $headers */
        $builder = (string)$this->builder;

        if (!empty($builder)) {
            $headers->set(static::HEADER_NAME, $builder, true);
        }

        return $headers;
    }
}