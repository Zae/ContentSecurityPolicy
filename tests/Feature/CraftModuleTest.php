<?php
declare(strict_types=1);

namespace Zae\ContentSecurityPolicy\Tests\Feature;

use craft\web\Application;
use craft\web\Request;
use craft\web\Response;
use craft\web\View;
use Mockery;
use yii\base\Event;
use yii\web\HeaderCollection;
use Zae\ContentSecurityPolicy\Builder;
use Zae\ContentSecurityPolicy\Craft\Module;
use Zae\ContentSecurityPolicy\Tests\GenericTestCase;

/**
 * Class CraftModuleTest
 *
 * @package Zae\ContentSecurityPolicy\Tests\Feature
 */
class CraftModuleTest extends GenericTestCase
{
    /**
     * @test
     * @group craft
     * @group module
     */
    public function it_registers_twig_extension(): void
    {
        $craftMock = Mockery::mock('alias:Craft', CraftStub::class);
        $craftMock->expects()
            ->setAlias('@modules/contentsecuritypolicy', Mockery::any())
            ->once();

        $craftMock->expects()
            ->getAlias('@config/csp.php')
            ->once()
            ->andReturns(__DIR__ . '/../assets/config/csp.php');

        $craftMock->expects()
            ->configure(Mockery::any(), [])
            ->once()
            ->andReturns([]);

        $requestMock = Mockery::mock(Request::class);
        $requestMock->expects()
            ->getIsSiteRequest()
            ->once()
            ->andReturns(true);

        $craftMock::$app = Mockery::mock(Application::class);
        $craftMock::$app->expects()
            ->has('request')
            ->andReturns(true);

        $viewMock = Mockery::mock(View::class);
        $viewMock->expects()
            ->registerTwigExtension(Mockery::any())
            ->once();

        $craftMock::$app->expects()
            ->has('view')
            ->andReturns(true);

        $craftMock::$app->expects()
            ->get('view')
            ->andReturns($viewMock);

        $craftMock::$app->expects()
            ->get('request')
            ->andReturns($requestMock);

        new Module('csp');
    }

    /**
     * @test
     * @group craft
     * @group module
     * @preserveGlobalState false
     */
    public function it_sends_headers(): void
    {
        $craftMock = Mockery::mock('alias:Craft', CraftStub::class);
        $craftMock->expects()
            ->setAlias('@modules/contentsecuritypolicy', Mockery::any())
            ->once();

        $craftMock->expects()
            ->getAlias('@config/csp.php')
            ->once()
            ->andReturns(__DIR__ . '/../assets/config/csp.php');

        $craftMock->expects()
            ->configure(Mockery::any(), [])
            ->once()
            ->andReturns([]);

        $requestMock = Mockery::mock(Request::class);
        $requestMock->expects()
            ->getIsSiteRequest()
            ->once()
            ->andReturns(false);

        $builderMock = Mockery::mock(Builder::class);

        $headersMock = Mockery::mock(HeaderCollection::class);
        $headersMock->expects()
            ->set('Content-Security-Policy', (string)$builderMock);

        $responseMock = Mockery::mock(Response::class);
        $responseMock->expects()
            ->getHeaders()
            ->andReturns($headersMock);

        $craftMock::$app = Mockery::mock(Application::class);
        $craftMock::$app->expects()
            ->has('request')
            ->andReturns(true);

        $craftMock::$app->expects()
            ->get('request')
            ->andReturns($requestMock);

        $craftMock::$app->expects()
            ->has('response')
            ->andReturns(true);

        $craftMock::$app->expects()
            ->get('response')
            ->andReturns($responseMock);

        /*
         * make sure to clear the Yii Event Bus, it can contain old
         * listeners from other tests, flushing the bus makes sure
         * no listeners except our own are called.
         */
        Event::offAll();

        $module = new Module('csp');
        $module->set('builder', $builderMock);

        Event::trigger(
            \yii\web\Application::class,
            \yii\web\Application::EVENT_BEFORE_REQUEST
        );
    }
}

class CraftStub
{
    public static $app;
}
