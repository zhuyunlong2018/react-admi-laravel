<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/7/22
 * Time: 10:34
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


class Admin extends BaseModel implements
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

    public function roles() {
        return $this->belongsToMany(Role::class);
    }
}