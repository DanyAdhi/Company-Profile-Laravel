<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
// use Fideloper\Proxy\TrustProxies as Middleware;
use Illuminate\Http\Middleware\TrustProxies as Middleware;
use Symfony\Component\HttpFoundation\Request as SymfonyRequest;

class TrustProxies extends Middleware
{
    /**
     * The trusted proxies for this application.
     *
     * @var array|string
     */
    protected $proxies;

    /**
     * The headers that should be used to detect proxies.
     *
     * @var int
     */
    // protected $headers = Request::HEADER_X_FORWARDED_ALL;
    protected $headers =
        SymfonyRequest::HEADER_X_FORWARDED_FOR |
        SymfonyRequest::HEADER_X_FORWARDED_HOST |
        SymfonyRequest::HEADER_X_FORWARDED_PORT |
        SymfonyRequest::HEADER_X_FORWARDED_PROTO;
}
