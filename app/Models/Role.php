<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/7/18
 * Time: 10:50
 */

namespace App\Models;


use Illuminate\Support\Facades\Log;

class Role extends BaseModel
{

    public function getPermissionsAttribute($value) {
        return explode(",", $value);
    }

    public function setPermissionsAttribute($value) {
        Log::debug($value);
        $permissions = "";
        if (is_array($value)) {
            foreach ($value as $item) {
                $permissions .= $item . ",";
            }
        }
        $this->attributes['permissions'] = $permissions;
    }

}