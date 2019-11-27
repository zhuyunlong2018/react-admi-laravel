<?php
/**
 * Created by PhpStorm.
 * User: ZhuYunLong2018
 * Email: 920200256@qq.com
 * Date: 2019/7/17
 * Time: 10:52
 */

namespace App\Models;



/**
 * App\Models\Menu
 *
 * @property int $id
 * @property string|null $key 菜单标识
 * @property string|null $parentKey 上级菜单标识
 * @property string|null $local 国际化，描述英译
 * @property string|null $text 描述
 * @property string|null $target url跳转类别
 * @property string|null $icon 图表
 * @property string|null $path 前端路由
 * @property string|null $url 浏览器跳转地址
 * @property int|null $order 排序，越大越前
 * @property int|null $type 类型1菜单、2功能
 * @property string|null $code 编码，功能权限使用
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Menu[] $children
 * @property-read int|null $children_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BaseModel multiWhere($where)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Menu newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Menu newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Menu query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Menu whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Menu whereIcon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Menu whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Menu whereKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Menu whereLocal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Menu whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Menu whereParentKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Menu wherePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Menu whereTarget($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Menu whereText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Menu whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Menu whereUrl($value)
 * @mixin \Eloquent
 * @property string|null $parent_key 上级菜单标识
 */
class Menu extends BaseModel
{
    public function children() {
        return $this->hasMany(Menu::class, "parent_key", "key");
    }

}