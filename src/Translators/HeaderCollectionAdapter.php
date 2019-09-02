<?php
declare(strict_types=1);

namespace Zae\ContentSecurityPolicy\Translators;

/**
 * @author    Ezra Pool <ezra@tsdme.nl>
 * @copyright Ezra Pool
 */

use yii\web\HeaderCollection;
use Zae\ContentSecurityPolicy\Contracts\Headers;

/**
 * Class HeaderCollectionAdapter
 *
 * @package Zae\ContentSecurityPolicy\Translators
 */
class HeaderCollectionAdapter implements Headers
{
    /**
     * @var HeaderCollection
     */
    private $headerCollection;

    /**
     * HeaderCollectionAdapter constructor.
     *
     * @param HeaderCollection $headerCollection
     */
    public function __construct(HeaderCollection $headerCollection)
    {
        $this->headerCollection = $headerCollection;
    }

    /**
     * @param string $name
     * @param string $value
     */
    public function set(string $name, string $value): void
    {
        $this->headerCollection->set($name, $value);
    }
}
