<?php
/**
 * Created by PhpStorm.
 * User: ZhuYunLong2018
 * Email: 920200256@qq.com
 * Date: 2019/7/18
 * Time: 10:50
 */

namespace App\Models;


use Illuminate\Support\Facades\Log;

/**
 * App\Models\Role
 *
 * @property int $id
 * @property string|null $name 名称
 * @property string|null $description 描述
 * @property array $permissions 权限key,逗号隔开
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Admin[] $admins
 * @property-read int|null $admins_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BaseModel multiWhere($where)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Role newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Role newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Role query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Role whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Role whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Role whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Role wherePermissions($value)
 * @mixin \Eloquent
 */
class Role extends BaseModel
{

    /**
     * 将绑定的权限key字符串转换为数组
     * @param $value
     * @return array
     */
    public function getPermissionsAttribute($value) {
        return explode(",", $value);
    }

    /**
     * 将数组key转为字符串进行存储
     * @param $value
     */
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

    public function admins() {
        return $this->belongsToMany(Admin::class);
    }

}