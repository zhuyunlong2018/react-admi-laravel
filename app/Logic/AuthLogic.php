<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/7/23
 * Time: 17:06
 */

namespace App\Logic;

use App\Exceptions\AuthException;
use App\Models\Admin;
use App\Models\Menu;
use Illuminate\Support\Facades\Redis;

/**
 * 后台用户登录权限
 * Class AuthLogic
 * @package App\Logic
 */
class AuthLogic
{
    const CACHE_KEY = "authorities for user_:";

    private $user = null;


    public function __construct(Admin $user)
    {
        $this->setUser($user);
    }

    public function setUser(Admin $user) {
        $this->user = $user;
    }

    /**
     * 获取用户缓存权限的key
     * @return string
     */
    private function getAuthKey() {
        return self::CACHE_KEY . $this->user->id;
    }

    /**
     * 获取用户关联的所有角色所关联的菜单key集合
     * @return array
     */
    public function getPermissions(): array {
        $roles = $this->user->roles;
        $permissions = [];
        foreach ($roles as $role) {
            foreach ($role->permissions as $permission) {
                if (!empty($permission) && !in_array($permission, $permissions)) {
                    $permissions[] = $permission;
                }
            }
        }
        return $permissions;
    }


    /**
     * 将用户api权限结合存储到缓存中
     */
    public function saveAuthoritiesToCache() {
        $menus = Menu::getMany([
            'key' => ['in', $this->getPermissions()],
            'type' => 2
        ]);
        $authorities = [];
        foreach ($menus as $menu) {
            if (!in_array($menu->code, $authorities) && !empty($menu->code)) {
                $authorities[] = $menu->code;
            }
        }
        if (empty($authorities)) {
            throw new AuthException(['msg' => "用户获得任何权限"]);
        }
        Redis::sAdd($this->getAuthKey(), ...$authorities);
        //权限过期时间和token时间一致
        Redis::expire($this->getAuthKey(), config('jwt.ttl')*60);
    }

    /**
     * 检查当前api是否在用户的权限集合中
     * @param $api
     * @return bool
     */
    public function checkAuth($api) : bool {
        return Redis::sIsMember($this->getAuthKey(), $api);
    }

    /**
     * 刷新指定用户的权限缓存
     * @throws AuthException
     */
    public function refreshCache() {
        if (Redis::exists($this->getAuthKey())) {
            $this->saveAuthoritiesToCache();
        }
    }


    /**
     * 刷新已经登录的管理员的权限缓存
     * TODO 若有异步需求，可以修改为生产消费模式
     */
    public static function refreshAllCache() {
        //TODO 此处获取的keys值最大数量2000，默认当前登录的管理员不超过此数量
        $keys = Redis::scan(0,'match', self::CACHE_KEY .'*','count',2000);
        $self = null;
        foreach ($keys as $key) {
            $id = substr($key, strlen(self::CACHE_KEY));
            if (empty($self)) {
                $self = new static(Admin::find($id));
            } else {
                $self->setUser(Admin::find($id));
            }
            $self->saveAuthoritiesToCache();
        }
    }

}