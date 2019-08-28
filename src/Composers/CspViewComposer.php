<?php
declare(strict_types=1);

namespace Zae\ContentSecurityPolicy\Composers;

use Illuminate\Contracts\View\View;
use Zae\ContentSecurityPolicy\Contracts\NonceGenerator;

/**
 * Class CspViewComposer
 *
 * @package Zae\ContentSecurityPolicy\Composers
 */
class CspViewComposer
{
    /**
     * @var NonceGenerator
     */
    private $generator;

    /**
     * CspViewComposer constructor.
     *
     * @param NonceGenerator $generator
     */
    public function __construct(NonceGenerator $generator)
    {
        $this->generator = $generator;
    }

    /**
     * @param View $view
     */
    public function compose(View $view): void
    {
        $view->with('cspnonce', $this->generator->getNonce());
    }
}
