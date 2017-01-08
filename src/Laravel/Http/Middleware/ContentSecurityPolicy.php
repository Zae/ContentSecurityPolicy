<?php

namespace Zae\ContentSecurityPolicy\Laravel\Http\Middleware;

use Closure;
use Zae\ContentSecurityPolicy\Contracts\Builder as CSPContract;
use Zae\ContentSecurityPolicy\Translators\Laravel;
use Illuminate\Http\Response;

/**
 * Class CSP
 *
 * @package Zae\ContentSecurityPolicy\Laravel\Http\Middleware
 */
class ContentSecurityPolicy
{
    const CSP_NONCE_SESSION_KEY = 'CSP_NONCE';

    /**
     * @var \Zae\ContentSecurityPolicy\Builder
     */
    private $builder;

    /**
     * Create a new middleware instance.
     *
     * @param CSPContract $builder
     */
    public function __construct(CSPContract $builder)
    {
        $this->builder = $builder;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        /** @var Response $response */
        $response = $next($request);

        $request->session()->set(static::CSP_NONCE_SESSION_KEY, $this->builder->getNonce());
        $response->headers = (new Laravel($this->builder))->translate($response->headers);

        return $response;
    }
}

