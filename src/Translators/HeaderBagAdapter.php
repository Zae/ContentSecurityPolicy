<?php
declare(strict_types=1);

namespace Zae\ContentSecurityPolicy\Translators;

use Symfony\Component\HttpFoundation\HeaderBag;
use Zae\ContentSecurityPolicy\Contracts\Headers;

/**
 * Class HeaderBagAdapter
 *
 * @package Zae\ContentSecurityPolicy\Translators
 */
class HeaderBagAdapter implements Headers
{
    /**
     * @var HeaderBag
     */
    private $bag;

    /**
     * HeaderBagAdapter constructor.
     *
     * @param HeaderBag $bag
     */
    public function __construct(HeaderBag $bag)
    {
        $this->bag = $bag;
    }

    /**
     * @param string $name
     * @param string $value
     */
    public function set(string $name, string $value): void
    {
        $this->bag->set($name, $value);
    }
}
