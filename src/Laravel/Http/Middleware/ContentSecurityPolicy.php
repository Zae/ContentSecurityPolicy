<?php
declare(strict_types=1);

namespace Zae\ContentSecurityPolicy\Laravel\Http\Middleware;

use Closure;
use Illuminate\Contracts\Config\Repository;
use Illuminate\Http\Request;
use Zae\ContentSecurityPolicy\Contracts\Builder;
use Zae\ContentSecurityPolicy\Factories\LaravelDirectivesFactory;
use Zae\ContentSecurityPolicy\Translators\Laravel;
use Illuminate\Http\Response;

/**
 * Class CSP
 *
 * @package Zae\ContentSecurityPolicy\Laravel\Http\Middleware
 */
class ContentSecurityPolicy
{
    /**
     * @var Builder
     */
    private $builder;
    /**
     * @var Repository
     */
    private $config;

    /**
     * Create a new middleware instance.
     *
     * @param Builder    $builder
     * @param Repository $config
     */
    public function __construct(Builder $builder, Repository $config)
    {
        $this->builder = $builder;
        $this->config = $config;
    }

    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        /** @var Response $response */
        $response = $next($request);

        LaravelDirectivesFactory::create(
            $this->builder,
            (array)$this->config->get('csp')
        );

        (new Laravel($this->builder))
            ->translate($response->headers);

        return $response;
    }
}

