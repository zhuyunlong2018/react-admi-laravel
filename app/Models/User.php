<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/7/18
 * Time: 14:23
 */

namespace App\Models;


class User extends BaseModel
{
    protected $hidden = ['password'];

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