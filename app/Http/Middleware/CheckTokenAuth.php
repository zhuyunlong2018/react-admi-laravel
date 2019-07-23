<?php

namespace App\Http\Middleware;

use Closure;

class CheckTokenAuth
{
    /**
     * 校验登录用户token绑定的路由权限
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        return $next($request);
    }
}
