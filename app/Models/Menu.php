<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/7/17
 * Time: 10:52
 */

namespace App\Models;



class Menu extends BaseModel
{
    public function children() {
        return $this->hasMany(Menu::class, "parent_key", "key");
    }

}