<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Str;
use Psy\Util\Json;
use Symfony\Component\Routing\Exception\MethodNotAllowedException;

class Authorize
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($request->user()) {
            foreach (config('security.access_controle') as $security) {
                if (
                    preg_match('#'.$security['uri'].'#', $request->route()->uri()) &&
                    in_array(Str::lower($request->method()), $security['method'])
                ) {
                    if (!$this->verifyRole($security['roles'], $request)) {
                        return response('not autorize', 403);
                    }
                    return $next($request);
                }
            }
        }
        return response('not autorize', 403);
    }

    private function verifyRole($roles, Request $request)
    {
        if ($request->user()->hasAnyRole($roles)) {
            return true;
        }
        return false;
    }
}
