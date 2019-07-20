<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/7/18
 * Time: 14:23
 */

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\MustVerifyEmail;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;


class User extends BaseModel implements
    AuthenticatableContract,
    AuthorizableContract,
    CanResetPasswordContract,
    JWTSubject
{
    use Notifiable, Authenticatable, Authorizable, CanResetPassword, MustVerifyEmail;


    protected $hidden = ['password'];

    protected $fillable = ['name', 'password'];

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }


    public function scopeWhereAge($query, $age) {
        if ($age && $age >0) {
            return $query->where('age', $age);
        }
        return $query;
    }

    public function scopeWhereName($query, $name) {
        if (!empty($name)) {
            return $query->where('name', 'like', "%{$name}%");
        }
        return $query;
    }
}