<?php

namespace Zae\ContentSecurityPolicy\Collections;

/**
 * @author    Ezra Pool <ezra@tsdme.nl>
 * @copyright Ezra Pool
 */

use Zae\ContentSecurityPolicy\Contracts\Directive;
use Exception;
use SplObjectStorage;

/**
 * Class Directives
 *
 * @package Zae\ContentSecurityPolicy\Collections
 */
class Directives extends SplObjectStorage
{
    /**
     * @param object $object
     * @param null   $data
     *
     * @throws Exception
     */
    public function attach($object, $data = null)
    {
        if (!is_a($object, Directive::class)) {
            throw new Exception(sprintf('Only classes that implement %s are allowed', Directive::class));
        }

        parent::attach($object, $data);
    }

    /**
     * @param Directive $object
     *
     * @return string
     */
    public function getHash($object)
    {
        return get_class($object);
    }

    /**
     * @return array
     */
    public function toArray()
    {
        $directives = [];

        $this->rewind();

        foreach ($this as $directive) {
            $directives[] = $directive;
        }

        return $directives;
    }
}