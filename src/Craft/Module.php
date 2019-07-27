<?php

namespace Zae\ContentSecurityPolicy\Craft;

/**
 * @author    Ezra Pool <ezra@tsdme.nl>
 * @copyright Ezra Pool (c) 2019
 */

use Closure;
use Craft;
use yii\base\Event;
use yii\web\Application;
use Zae\ContentSecurityPolicy\Contracts\Builder;
use Zae\ContentSecurityPolicy\Twig\Extensions\ContentSecurityPolicy;

/**
 * Class Module
 *
 * @package DigitalNatives
 */
class Module extends \yii\base\Module
{
    /**
     * Initializes the module.
     */
    public function init()
    {
        Craft::setAlias('@modules/contentsecuritypolicy', $this->getBasePath());
        $this->controllerNamespace = 'modules\contentsecuritypolicy\controllers';
        parent::init();

        Craft::configure($this, require Craft::getAlias('@config/csp.php'));

        if (Craft::$app->request->getIsSiteRequest()) {
            Craft::$app->view->registerTwigExtension(new ContentSecurityPolicy());
        }

        $this->initializeEvents();
    }

    /**
     * Register the events in Craft / Yii
     */
    private function initializeEvents()
    {
        Event::on(
            Application::class,
            Application::EVENT_BEFORE_REQUEST,
            Closure::fromCallable([$this, 'injectSecurityHeaders'])
        );
    }

    /**
     * Inject Link header into the request just before we send it, so we can preload our most important resources.
     */
    private function injectSecurityHeaders()
    {
        $elements = $this->params;

        /** @var Builder $builder */
        $builder = $this->get('builder');

        foreach ($elements as $directive => $settings) {
            /*
            * support simple array structures for directives that take no
            * values, they will be values of the input array, not the keys.
            */

            if (is_numeric($directive) && is_string($settings)) {
                $directive = $settings;
                $settings = [];
            }

            $builder->setDirective(new $directive($settings));
        }

        Craft::$app->response->headers->set('Content-Security-Policy', (string)$builder);
    }
}
