<?php
/**
 * Created by PhpStorm.
 * User: ZhuYunLong2018
 * Email: 920200256@qq.com
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