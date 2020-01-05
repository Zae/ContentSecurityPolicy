<?php
declare(strict_types=1);

namespace Zae\ContentSecurityPolicy\Tests\Unit;

use Mockery;
use Symfony\Component\HttpFoundation\HeaderBag;
use yii\web\HeaderCollection;
use Zae\ContentSecurityPolicy\Builder;
use Zae\ContentSecurityPolicy\Directives\BaseUri;
use Zae\ContentSecurityPolicy\Directives\DefaultSrc;
use Zae\ContentSecurityPolicy\Tests\GenericTestCase;
use Zae\ContentSecurityPolicy\Translators\AdapterTranslator;
use Zae\ContentSecurityPolicy\Translators\HeaderBagAdapter;
use Zae\ContentSecurityPolicy\Translators\HeaderCollectionAdapter;

/**
 * Class TranslatorsTest
 *
 * @package Zae\ContentSecurityPolicy\Tests\Unit
 */
class TranslatorsTest extends GenericTestCase
{
    /**
     * @test
     * @group translators
     *
     * @throws \Exception
     */
    public function symfony(): void
    {
        $builder = new Builder();

        $builder->setDirective(new BaseUri('https:'));
        $builder->setDirective(new DefaultSrc(DefaultSrc::SELF));

        $headerBag = Mockery::mock(HeaderBag::class);
        $headerBag->expects()
            ->set('Content-Security-Policy', "base-uri https:;default-src 'self'");

        (new AdapterTranslator($builder))
            ->translate(new HeaderBagAdapter($headerBag));
    }

    /**
     * @test
     * @group translators
     *
     * @throws \Exception
     */
    public function yii(): void
    {
        $builder = new Builder();

        $builder->setDirective(new BaseUri('https:'));
        $builder->setDirective(new DefaultSrc(DefaultSrc::SELF));

        $headerCollection = Mockery::mock(HeaderCollection::class);
        $headerCollection->expects()
                  ->set('Content-Security-Policy', "base-uri https:;default-src 'self'");

        (new AdapterTranslator($builder))
            ->translate(new HeaderCollectionAdapter($headerCollection));
    }
}
