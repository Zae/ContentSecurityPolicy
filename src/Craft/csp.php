<?php

/**
 * @author    Ezra Pool <ezra@tsdme.nl>
 * @copyright Ezra Pool (c) 2019
 */

use Zae\ContentSecurityPolicy\Builder;
use Zae\ContentSecurityPolicy\Directives\BaseUri;
use Zae\ContentSecurityPolicy\Directives\BlockAllMixedContent;
use Zae\ContentSecurityPolicy\Directives\ChildSrc;
use Zae\ContentSecurityPolicy\Directives\DefaultSrc;
use Zae\ContentSecurityPolicy\Directives\FontSrc;
use Zae\ContentSecurityPolicy\Directives\FormAction;
use Zae\ContentSecurityPolicy\Directives\FrameAncestors;
use Zae\ContentSecurityPolicy\Directives\ImgSrc;
use Zae\ContentSecurityPolicy\Directives\ObjectSrc;
use Zae\ContentSecurityPolicy\Directives\RequireSriFor;
use Zae\ContentSecurityPolicy\Directives\Sandbox;
use Zae\ContentSecurityPolicy\Directives\ScriptSrc;
use Zae\ContentSecurityPolicy\Directives\StyleSrc;
use Zae\ContentSecurityPolicy\Directives\UpgradeInsecureRequests;

return [
    'components' => [
        'builder' => Builder::class,
    ],
    'params' => [
        BlockAllMixedContent::class,
        FrameAncestors::class => FrameAncestors::NONE,
        FormAction::class => FormAction::SELF,
        ObjectSrc::class => ObjectSrc::NONE,
        RequireSriFor::class => [
            RequireSriFor::SRI_TYPE_SCRIPT,
            RequireSriFor::SRI_TYPE_STYLE,
        ],
        UpgradeInsecureRequests::class,
        Sandbox::class => [
            Sandbox::ALLOW_FORMS,
            Sandbox::ALLOW_SCRIPTS,
            Sandbox::ALLOW_TOP_NAVIGATION,
            Sandbox::ALLOW_SAME_ORIGIN,
            Sandbox::ALLOW_POPUPS,
        ],
        BaseUri::class => BaseUri::SELF,
        DefaultSrc::class => [
            DefaultSrc::SELF,
        ],
        StyleSrc::class => [
            StyleSrc::SELF,
        ],
        FontSrc::class => [
            FontSrc::SELF,
        ],
        ScriptSrc::class => [
            ScriptSrc::SELF,
            ScriptSrc::NONCE,
        ],
        ChildSrc::class => [
            ChildSrc::SELF,
        ],
        ImgSrc::class => [
            ImgSrc::SELF,
        ]
    ]
];
