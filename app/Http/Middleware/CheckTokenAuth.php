<?php

namespace App\Http\Middleware;

use App\Exceptions\AuthException;
use App\Logic\AuthLogic;
use Closure;
class CheckTokenAuth
{
    protected $except = [
        "admin/menus/getUserRoutes",
    ];

    /**
     * 校验登录用户token绑定的路由权限
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     * @throws AuthException
     */
    public function handle($request, Closure $next)
    {
        $authLogic = new AuthLogic($request->user());
        if (
            !$authLogic->checkAuth($request->route()->uri) &&
            !in_array($request->route()->uri, $this->except)
        ) {
            throw new AuthException();
        }
        return $next($request);
    }
}
