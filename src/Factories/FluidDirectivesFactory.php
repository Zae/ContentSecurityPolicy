<?php

namespace Zae\ContentSecurityPolicy\Factories;

/**
 * @author    Ezra Pool <ezra@tsdme.nl>
 * @copyright Ezra Pool
 */

use Zae\ContentSecurityPolicy\Builder;
use Zae\ContentSecurityPolicy\Directives\BaseUri;
use Zae\ContentSecurityPolicy\Directives\BlockAllMixedContent;
use Zae\ContentSecurityPolicy\Directives\ChildSrc;
use Zae\ContentSecurityPolicy\Directives\ConnectSrc;
use Zae\ContentSecurityPolicy\Directives\DefaultSrc;
use Zae\ContentSecurityPolicy\Directives\DisownOpener;
use Zae\ContentSecurityPolicy\Directives\FontSrc;
use Zae\ContentSecurityPolicy\Directives\FormAction;
use Zae\ContentSecurityPolicy\Directives\FrameAncestors;
use Zae\ContentSecurityPolicy\Directives\ImgSrc;
use Zae\ContentSecurityPolicy\Directives\ManifestSrc;
use Zae\ContentSecurityPolicy\Directives\MediaSrc;
use Zae\ContentSecurityPolicy\Directives\NavigationTo;
use Zae\ContentSecurityPolicy\Directives\ObjectSrc;
use Zae\ContentSecurityPolicy\Directives\PluginTypes;
use Zae\ContentSecurityPolicy\Directives\ReportTo;
use Zae\ContentSecurityPolicy\Directives\ReportUri;
use Zae\ContentSecurityPolicy\Directives\RequireSriFor;
use Zae\ContentSecurityPolicy\Directives\Sandbox;
use Zae\ContentSecurityPolicy\Directives\ScriptSrc;
use Zae\ContentSecurityPolicy\Directives\StyleSrc;
use Zae\ContentSecurityPolicy\Directives\UpgradeInsecureRequests;
use Zae\ContentSecurityPolicy\Directives\WorkerSrc;

/**
 * Class FluidDirectivesFactory
 *
 * @package Zae\ContentSecurityPolicy\Laravel\Factories
 *
 * @method $this baseUri(array|string $settings=[]);
 * @method $this blockAllMixedContent(array|string $settings=[]);
 * @method $this childSrc(array|string $settings=[]);
 * @method $this connectSrc(array|string $settings=[]);
 * @method $this defaultSrc(array|string $settings=[]);
 * @method $this disownOpener(array|string $settings=[]);
 * @method $this fontSrc(array|string $settings=[]);
 * @method $this formAction(array|string $settings=[]);
 * @method $this frameAncestors(array|string $settings=[]);
 * @method $this imgSrc(array|string $settings=[]);
 * @method $this manifestSrc(array|string $settings=[]);
 * @method $this mediaSrc(array|string $settings=[]);
 * @method $this navigationTo(array|string $settings=[]);
 * @method $this objectSrc(array|string $settings=[]);
 * @method $this pluginTypes(array|string $settings=[]);
 * @method $this reportTo(array|string $settings=[]);
 * @method $this reportUri(array|string $settings=[]);
 * @method $this requireSriFor(array|string $settings=[]);
 * @method $this sandbox(array|string $settings=[]);
 * @method $this scriptSrc(array|string $settings=[]);
 * @method $this styleSrc(array|string $settings=[]);
 * @method $this upgradeInsecureRequests(array|string $settings=[]);
 * @method $this workerSrc(array|string $settings=[]);
 */
class FluidDirectivesFactory
{
    private static $mapping = [
        'baseUri'                   => BaseUri::class,
        'blockAllMixedContent'      => BlockAllMixedContent::class,
        'childSrc'                  => ChildSrc::class,
        'connectSrc'                => ConnectSrc::class,
        'defaultSrc'                => DefaultSrc::class,
        'disownOpener'              => DisownOpener::class,
        'fontSrc'                   => FontSrc::class,
        'formAction'                => FormAction::class,
        'frameAncestors'            => FrameAncestors::class,
        'imgSrc'                    => ImgSrc::class,
        'manifestSrc'               => ManifestSrc::class,
        'mediaSrc'                  => MediaSrc::class,
        'navigationTo'              => NavigationTo::class,
        'objectSrc'                 => ObjectSrc::class,
        'pluginTypes'               => PluginTypes::class,
        'reportTo'                  => ReportTo::class,
        'reportUri'                 => ReportUri::class,
        'requireSriFor'             => RequireSriFor::class,
        'sandbox'                   => Sandbox::class,
        'scriptSrc'                 => ScriptSrc::class,
        'styleSrc'                  => StyleSrc::class,
        'upgradeInsecureRequests'   => UpgradeInsecureRequests::class,
        'workerSrc'                 => WorkerSrc::class
    ];

    /**
     * @var Builder
     */
    private $builder;

    /**
     * FluidDirectivesFactory constructor.
     *
     * @param Builder $builder
     */
    function __construct(Builder &$builder)
    {
        $this->builder = $builder;
    }

    /**
     * @param $directive
     * @param $arguments
     *
     * @return $this
     */
    function __call($directive, $arguments)
    {
        $class = $this->mapDirectives($directive);
        $settings = !empty($arguments[0]) ? $arguments[0] : null;

        $this->builder->setDirective(new $class($settings));

        return $this;
    }

    /**
     * @param string $name
     *
     * @return mixed
     */
    private function mapDirectives($name)
    {
        return static::$mapping[$name];
    }
}