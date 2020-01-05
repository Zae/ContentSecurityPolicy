<?php
declare(strict_types=1);

namespace Zae\ContentSecurityPolicy\Tests\Unit;

use PHPUnit\Framework\TestCase;
use Zae\ContentSecurityPolicy\Directives\BaseUri;
use Zae\ContentSecurityPolicy\Directives\BlockAllMixedContent;
use Zae\ContentSecurityPolicy\Directives\ChildSrc;
use Zae\ContentSecurityPolicy\Directives\ConnectSrc;
use Zae\ContentSecurityPolicy\Directives\DefaultSrc;
use Zae\ContentSecurityPolicy\Directives\FontSrc;
use Zae\ContentSecurityPolicy\Directives\FormAction;
use Zae\ContentSecurityPolicy\Directives\FrameAncestors;
use Zae\ContentSecurityPolicy\Directives\ImgSrc;
use Zae\ContentSecurityPolicy\Directives\ManifestSrc;
use Zae\ContentSecurityPolicy\Directives\MediaSrc;
use Zae\ContentSecurityPolicy\Directives\NavigateTo;
use Zae\ContentSecurityPolicy\Directives\ObjectSrc;
use Zae\ContentSecurityPolicy\Directives\PluginTypes;
use Zae\ContentSecurityPolicy\Directives\ReportUri;
use Zae\ContentSecurityPolicy\Directives\Sandbox;
use Zae\ContentSecurityPolicy\Directives\ScriptSrc;
use Zae\ContentSecurityPolicy\Directives\StyleSrc;
use Zae\ContentSecurityPolicy\Directives\UpgradeInsecureRequests;
use Zae\ContentSecurityPolicy\Directives\WorkerSrc;

/**
 * Class DirectivesTest
 *
 * @package Zae\ContentSecurityPolicy\Tests\Unit
 */
class DirectivesTest extends TestCase
{
    /**
     * @test
     * @group        directives
     * @dataProvider generalProvider
     *
     * @param string $directive
     * @param array  $values
     * @param string $expected
     */
    public function general(string $directive, array $values, string $expected): void
    {
        $object = new $directive();

        if (!empty($values)) {
            foreach ($values as $value) {
                $object->addValue($value);
            }
        }

        static::assertEquals($expected, (string)$object);
    }

    /**
     * @return array
     */
    public function generalProvider(): array
    {
        return [
            [BaseUri::class, ['*'], 'base-uri *'],
            [BaseUri::class, ['self'], 'base-uri self'],
            [BaseUri::class, ['unsafe-eval'], 'base-uri unsafe-eval'],
            [BaseUri::class, ['unsafe-hashes'], 'base-uri unsafe-hashes'],
            [BaseUri::class, ['unsafe-inline'], 'base-uri unsafe-inline'],
            [BaseUri::class, ["'none'"], "base-uri 'none'"],
            [BaseUri::class, ['strict-dynamic'], 'base-uri strict-dynamic'],
            [BaseUri::class, ['http:', 'https:'], 'base-uri http: https:'],
            [BaseUri::class, ['self', 'unsafe-eval', 'unsafe-hashes', 'unsafe-inline'], 'base-uri self unsafe-eval unsafe-hashes unsafe-inline'],
            [BaseUri::class, ['https://example.com'], 'base-uri https://example.com'],

            [BlockAllMixedContent::class, [], 'block-all-mixed-content'],

            [ChildSrc::class, ['*'], 'child-src *'],
            [ChildSrc::class, ['self'], 'child-src self'],
            [ChildSrc::class, ['unsafe-eval'], 'child-src unsafe-eval'],
            [ChildSrc::class, ['unsafe-hashes'], 'child-src unsafe-hashes'],
            [ChildSrc::class, ['unsafe-inline'], 'child-src unsafe-inline'],
            [ChildSrc::class, ["'none'"], "child-src 'none'"],
            [ChildSrc::class, ['strict-dynamic'], 'child-src strict-dynamic'],
            [ChildSrc::class, ['http:', 'https:'], 'child-src http: https:'],
            [ChildSrc::class, ['self', 'unsafe-eval', 'unsafe-hashes', 'unsafe-inline'], 'child-src self unsafe-eval unsafe-hashes unsafe-inline'],
            [ChildSrc::class, ['https://example.com'], 'child-src https://example.com'],

            [ConnectSrc::class, ['*'], 'connect-src *'],
            [ConnectSrc::class, ['self'], 'connect-src self'],
            [ConnectSrc::class, ['unsafe-eval'], 'connect-src unsafe-eval'],
            [ConnectSrc::class, ['unsafe-hashes'], 'connect-src unsafe-hashes'],
            [ConnectSrc::class, ['unsafe-inline'], 'connect-src unsafe-inline'],
            [ConnectSrc::class, ["'none'"], "connect-src 'none'"],
            [ConnectSrc::class, ['strict-dynamic'], 'connect-src strict-dynamic'],
            [ConnectSrc::class, ['http:', 'https:'], 'connect-src http: https:'],
            [ConnectSrc::class, ['self', 'unsafe-eval', 'unsafe-hashes', 'unsafe-inline'], 'connect-src self unsafe-eval unsafe-hashes unsafe-inline'],
            [ConnectSrc::class, ['https://example.com'], 'connect-src https://example.com'],
            
            [DefaultSrc::class, ['*'], 'default-src *'],
            [DefaultSrc::class, ['self'], 'default-src self'],
            [DefaultSrc::class, ['unsafe-eval'], 'default-src unsafe-eval'],
            [DefaultSrc::class, ['unsafe-hashes'], 'default-src unsafe-hashes'],
            [DefaultSrc::class, ['unsafe-inline'], 'default-src unsafe-inline'],
            [DefaultSrc::class, ["'none'"], "default-src 'none'"],
            [DefaultSrc::class, ['strict-dynamic'], 'default-src strict-dynamic'],
            [DefaultSrc::class, ['http:', 'https:'], 'default-src http: https:'],
            [DefaultSrc::class, ['self', 'unsafe-eval', 'unsafe-hashes', 'unsafe-inline'], 'default-src self unsafe-eval unsafe-hashes unsafe-inline'],
            [DefaultSrc::class, ['https://example.com'], 'default-src https://example.com'],
            
            [FontSrc::class, ['*'], 'font-src *'],
            [FontSrc::class, ['self'], 'font-src self'],
            [FontSrc::class, ['unsafe-eval'], 'font-src unsafe-eval'],
            [FontSrc::class, ['unsafe-hashes'], 'font-src unsafe-hashes'],
            [FontSrc::class, ['unsafe-inline'], 'font-src unsafe-inline'],
            [FontSrc::class, ["'none'"], "font-src 'none'"],
            [FontSrc::class, ['strict-dynamic'], 'font-src strict-dynamic'],
            [FontSrc::class, ['http:', 'https:'], 'font-src http: https:'],
            [FontSrc::class, ['self', 'unsafe-eval', 'unsafe-hashes', 'unsafe-inline'], 'font-src self unsafe-eval unsafe-hashes unsafe-inline'],
            [FontSrc::class, ['https://example.com'], 'font-src https://example.com'],
            
            [FormAction::class, ['*'], 'form-action *'],
            [FormAction::class, ['self'], 'form-action self'],
            [FormAction::class, ['unsafe-eval'], 'form-action unsafe-eval'],
            [FormAction::class, ['unsafe-hashes'], 'form-action unsafe-hashes'],
            [FormAction::class, ['unsafe-inline'], 'form-action unsafe-inline'],
            [FormAction::class, ["'none'"], "form-action 'none'"],
            [FormAction::class, ['strict-dynamic'], 'form-action strict-dynamic'],
            [FormAction::class, ['http:', 'https:'], 'form-action http: https:'],
            [FormAction::class, ['self', 'unsafe-eval', 'unsafe-hashes', 'unsafe-inline'], 'form-action self unsafe-eval unsafe-hashes unsafe-inline'],
            [FormAction::class, ['https://example.com'], 'form-action https://example.com'],

            [FrameAncestors::class, ['*'], 'frame-ancestors *'],
            [FrameAncestors::class, ['self'], 'frame-ancestors self'],
            [FrameAncestors::class, ["'none'"], "frame-ancestors 'none'"],
            [FrameAncestors::class, ['http:', 'https:'], 'frame-ancestors http: https:'],
            [FrameAncestors::class, ['self', 'http:', 'https://example.com'], 'frame-ancestors self http: https://example.com'],
            [FrameAncestors::class, ['https://example.com'], 'frame-ancestors https://example.com'],

            [ImgSrc::class, ['*'], 'img-src *'],
            [ImgSrc::class, ['self'], 'img-src self'],
            [ImgSrc::class, ['unsafe-eval'], 'img-src unsafe-eval'],
            [ImgSrc::class, ['unsafe-hashes'], 'img-src unsafe-hashes'],
            [ImgSrc::class, ['unsafe-inline'], 'img-src unsafe-inline'],
            [ImgSrc::class, ["'none'"], "img-src 'none'"],
            [ImgSrc::class, ['strict-dynamic'], 'img-src strict-dynamic'],
            [ImgSrc::class, ['http:', 'https:'], 'img-src http: https:'],
            [ImgSrc::class, ['self', 'unsafe-eval', 'unsafe-hashes', 'unsafe-inline'], 'img-src self unsafe-eval unsafe-hashes unsafe-inline'],
            [ImgSrc::class, ['https://example.com'], 'img-src https://example.com'],
            
            [ManifestSrc::class, ['*'], 'manifest-src *'],
            [ManifestSrc::class, ['self'], 'manifest-src self'],
            [ManifestSrc::class, ['unsafe-eval'], 'manifest-src unsafe-eval'],
            [ManifestSrc::class, ['unsafe-hashes'], 'manifest-src unsafe-hashes'],
            [ManifestSrc::class, ['unsafe-inline'], 'manifest-src unsafe-inline'],
            [ManifestSrc::class, ["'none'"], "manifest-src 'none'"],
            [ManifestSrc::class, ['strict-dynamic'], 'manifest-src strict-dynamic'],
            [ManifestSrc::class, ['http:', 'https:'], 'manifest-src http: https:'],
            [ManifestSrc::class, ['self', 'unsafe-eval', 'unsafe-hashes', 'unsafe-inline'], 'manifest-src self unsafe-eval unsafe-hashes unsafe-inline'],
            [ManifestSrc::class, ['https://example.com'], 'manifest-src https://example.com'],
            
            [MediaSrc::class, ['*'], 'media-src *'],
            [MediaSrc::class, ['self'], 'media-src self'],
            [MediaSrc::class, ['unsafe-eval'], 'media-src unsafe-eval'],
            [MediaSrc::class, ['unsafe-hashes'], 'media-src unsafe-hashes'],
            [MediaSrc::class, ['unsafe-inline'], 'media-src unsafe-inline'],
            [MediaSrc::class, ["'none'"], "media-src 'none'"],
            [MediaSrc::class, ['strict-dynamic'], 'media-src strict-dynamic'],
            [MediaSrc::class, ['http:', 'https:'], 'media-src http: https:'],
            [MediaSrc::class, ['self', 'unsafe-eval', 'unsafe-hashes', 'unsafe-inline'], 'media-src self unsafe-eval unsafe-hashes unsafe-inline'],
            [MediaSrc::class, ['https://example.com'], 'media-src https://example.com'],
            
            [NavigateTo::class, ['*'], 'navigate-to *'],
            [NavigateTo::class, ['self'], 'navigate-to self'],
            [NavigateTo::class, ['unsafe-eval'], 'navigate-to unsafe-eval'],
            [NavigateTo::class, ['unsafe-hashes'], 'navigate-to unsafe-hashes'],
            [NavigateTo::class, ['unsafe-inline'], 'navigate-to unsafe-inline'],
            [NavigateTo::class, ["'none'"], "navigate-to 'none'"],
            [NavigateTo::class, ['strict-dynamic'], 'navigate-to strict-dynamic'],
            [NavigateTo::class, ['http:', 'https:'], 'navigate-to http: https:'],
            [NavigateTo::class, ['self', 'unsafe-eval', 'unsafe-hashes', 'unsafe-inline'], 'navigate-to self unsafe-eval unsafe-hashes unsafe-inline'],
            [NavigateTo::class, ['https://example.com'], 'navigate-to https://example.com'],
            
            [ObjectSrc::class, ['*'], 'object-src *'],
            [ObjectSrc::class, ['self'], 'object-src self'],
            [ObjectSrc::class, ['unsafe-eval'], 'object-src unsafe-eval'],
            [ObjectSrc::class, ['unsafe-hashes'], 'object-src unsafe-hashes'],
            [ObjectSrc::class, ['unsafe-inline'], 'object-src unsafe-inline'],
            [ObjectSrc::class, ["'none'"], "object-src 'none'"],
            [ObjectSrc::class, ['strict-dynamic'], 'object-src strict-dynamic'],
            [ObjectSrc::class, ['http:', 'https:'], 'object-src http: https:'],
            [ObjectSrc::class, ['self', 'unsafe-eval', 'unsafe-hashes', 'unsafe-inline'], 'object-src self unsafe-eval unsafe-hashes unsafe-inline'],
            [ObjectSrc::class, ['https://example.com'], 'object-src https://example.com'],

            [PluginTypes::class, ["'none'"], "plugin-types 'none'"],
            [PluginTypes::class, ['application/x-java-applet'], 'plugin-types application/x-java-applet'],
            [PluginTypes::class, ['application/x-java-applet', 'application/x-shockwave-flash'], 'plugin-types application/x-java-applet application/x-shockwave-flash'],

//            [PrefetchSrc::class, ['*'], 'prefetch-src *'],
//            [PrefetchSrc::class, ['self'], 'prefetch-src self'],
//            [PrefetchSrc::class, ['unsafe-eval'], 'prefetch-src unsafe-eval'],
//            [PrefetchSrc::class, ['unsafe-hashes'], 'prefetch-src unsafe-hashes'],
//            [PrefetchSrc::class, ['unsafe-inline'], 'prefetch-src unsafe-inline'],
//            [PrefetchSrc::class, ["'none'"], "prefetch-src 'none'"],
//            [PrefetchSrc::class, ['strict-dynamic'], 'prefetch-src strict-dynamic'],
//            [PrefetchSrc::class, ['http:', 'https:'], 'prefetch-src http: https:'],
//            [PrefetchSrc::class, ['self', 'unsafe-eval', 'unsafe-hashes', 'unsafe-inline'], 'prefetch-src self unsafe-eval unsafe-hashes unsafe-inline'],
//            [PrefetchSrc::class, ['https://example.com'], 'prefetch-src https://example.com'],

            [ReportUri::class, ['/csp-report'], 'report-uri /csp-report'],
            [ReportUri::class, ['/csp-report', '/backup-report'], 'report-uri /csp-report /backup-report'],

            [Sandbox::class, ['allow-downloads-without-user-activation'], 'sandbox allow-downloads-without-user-activation'],
            [Sandbox::class, ['allow-forms'], 'sandbox allow-forms'],
            [Sandbox::class, ['allow-modals'], 'sandbox allow-modals'],
            [Sandbox::class, ['allow-orientation-lock'], 'sandbox allow-orientation-lock'],
            [Sandbox::class, ['allow-pointer-lock'], 'sandbox allow-pointer-lock'],
            [Sandbox::class, ['allow-popups'], 'sandbox allow-popups'],
            [Sandbox::class, ['allow-popups-to-escape-sandbox'], 'sandbox allow-popups-to-escape-sandbox'],
            [Sandbox::class, ['allow-presentation'], 'sandbox allow-presentation'],
            [Sandbox::class, ['allow-same-origin'], 'sandbox allow-same-origin'],
            [Sandbox::class, ['allow-scripts'], 'sandbox allow-scripts'],
            [Sandbox::class, ['allow-storage-access-by-user-activation '], 'sandbox allow-storage-access-by-user-activation '],
            [Sandbox::class, ['allow-top-navigation'], 'sandbox allow-top-navigation'],
            [Sandbox::class, ['allow-top-navigation-by-user-activation'], 'sandbox allow-top-navigation-by-user-activation'],
            [Sandbox::class, ['allow-forms', 'allow-modals', 'allow-popups', 'allow-top-navigation-by-user-activation'], 'sandbox allow-forms allow-modals allow-popups allow-top-navigation-by-user-activation'],

            [ScriptSrc::class, ['*'], 'script-src *'],
            [ScriptSrc::class, ['self'], 'script-src self'],
            [ScriptSrc::class, ['unsafe-eval'], 'script-src unsafe-eval'],
            [ScriptSrc::class, ['unsafe-hashes'], 'script-src unsafe-hashes'],
            [ScriptSrc::class, ['unsafe-inline'], 'script-src unsafe-inline'],
            [ScriptSrc::class, ["'none'"], "script-src 'none'"],
            [ScriptSrc::class, ['strict-dynamic'], 'script-src strict-dynamic'],
            [ScriptSrc::class, ['http:', 'https:'], 'script-src http: https:'],
            [ScriptSrc::class, ['self', 'unsafe-eval', 'unsafe-hashes', 'unsafe-inline'], 'script-src self unsafe-eval unsafe-hashes unsafe-inline'],
            [ScriptSrc::class, ['https://example.com'], 'script-src https://example.com'],
            
            [StyleSrc::class, ['*'], 'style-src *'],
            [StyleSrc::class, ['self'], 'style-src self'],
            [StyleSrc::class, ['unsafe-eval'], 'style-src unsafe-eval'],
            [StyleSrc::class, ['unsafe-hashes'], 'style-src unsafe-hashes'],
            [StyleSrc::class, ['unsafe-inline'], 'style-src unsafe-inline'],
            [StyleSrc::class, ["'none'"], "style-src 'none'"],
            [StyleSrc::class, ['strict-dynamic'], 'style-src strict-dynamic'],
            [StyleSrc::class, ['http:', 'https:'], 'style-src http: https:'],
            [StyleSrc::class, ['self', 'unsafe-eval', 'unsafe-hashes', 'unsafe-inline'], 'style-src self unsafe-eval unsafe-hashes unsafe-inline'],
            [StyleSrc::class, ['https://example.com'], 'style-src https://example.com'],

            [UpgradeInsecureRequests::class, [], 'upgrade-insecure-requests'],

            [WorkerSrc::class, ['*'], 'worker-src *'],
            [WorkerSrc::class, ['self'], 'worker-src self'],
            [WorkerSrc::class, ['unsafe-eval'], 'worker-src unsafe-eval'],
            [WorkerSrc::class, ['unsafe-hashes'], 'worker-src unsafe-hashes'],
            [WorkerSrc::class, ['unsafe-inline'], 'worker-src unsafe-inline'],
            [WorkerSrc::class, ["'none'"], "worker-src 'none'"],
            [WorkerSrc::class, ['strict-dynamic'], 'worker-src strict-dynamic'],
            [WorkerSrc::class, ['http:', 'https:'], 'worker-src http: https:'],
            [WorkerSrc::class, ['self', 'unsafe-eval', 'unsafe-hashes', 'unsafe-inline'], 'worker-src self unsafe-eval unsafe-hashes unsafe-inline'],
            [WorkerSrc::class, ['https://example.com'], 'worker-src https://example.com'],

        ];
    }
}
