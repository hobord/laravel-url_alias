<?php
namespace Hobord\UrlAlias\Http\Middleware;

use Closure;
use Hobord\UrlAlias\UrlAlias;

class UrlAliasMiddleware
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $role
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $dupRequest = $request->duplicate();

        $alias = UrlAlias::where('src', $dupRequest->path())->first();
        if($alias) {
            $request->server->set('REQUEST_URI', $alias->target);
        }

        return $next($request);
    }
}