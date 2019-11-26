<?php
/**
 * Created by PhpStorm.
 * User: ZhuYunLong2018
 * Email: 920200256@qq.com
 * Date: 2019/7/17
 * Time: 11:21
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class BaseModel extends Model
{
    const CREATED_AT = null;
    const UPDATED_AT = null;

    /**
     * 设置驼峰访问模型属性
     * @param string $key
     * @return mixed
     */
    public function getAttribute($key)
    {
        $key = Str::snake($key);
        return parent::getAttribute($key);
    }

    /**
     * 设置驼峰设置属性值
     * @param string $key
     * @param mixed $value
     * @return mixed
     */
    public function setAttribute($key, $value)
    {
        $key = Str::snake($key);
        return parent::setAttribute($key, $value);
    }


    /**
     * 多条件搜索
     *
     * @param $query
     * @param array $where 查询条件
     * @return mixed
     */
    public function scopeMultiWhere($query, array $where)
    {
        return $this->buildWhere($query, $where);
    }

    /**
     * 构造查询条件SQL语句
     *
     * 查询条件示例：
     * $where['field'] = $value;
     * $where['field'] = ['>=', $value1];
     * $where['field'] = [['>=', $value1], ['<=', $value2]];
     *
     * @param $query
     * @param mixed $where 查询条件
     * @return mixed
     */
    public function buildWhere($query, $where)
    {
        if (!is_array($where)) {
            return $query;
        }
        foreach ($where as $field => $val) {
            if ($field && ($val || $val === 0)) {
                if (!is_array($val)) {
                    $query->where($field, $val);
                } else {
                    if (is_array($val[0])) {
                        $query->where(function ($query) use ($field, $val) {
                            foreach ($val as $v) {
                                if (!isset($v[1])) {
                                    $query->orWhere($field, '=', $v[0]);
                                } else {
                                    $query->orWhere($field, $v[0], $v[1]);
                                }
                            }
                        });
                    } else {
                        switch ($val[0]) {
                            case 'between':
                                $query->whereBetween($field, $val[1]);
                                break;
                            case 'in':
                                $query->whereIn($field, $val[1]);
                                break;
                            case 'notIn':
                                $query->whereNotIn($field, $val[1]);
                                break;
                            case 'null':
                                $query->whereNull($field);
                                break;
                            case 'raw':
                                $query->whereRaw(str_replace('__field__', $field, $val[1]));
                                break;
                            default:
                                $query->where($field, $val[0], $val[1]);
                        }
                    }
                }
            }
        }
        return $query;
    }

    /**
     * 通过条件获取一条记录
     * @param $condition
     * @return mixed
     */
    public static function getOne($condition)
    {
        return self::multiWhere($condition)->first();
    }

    public static function getMany($condition) {
        return self::multiWhere($condition)->get();
    }

    /**
     * 通过条件删除记录
     * @param $condition
     * @return mixed
     */
    public static function deleteWhere($condition)
    {
        return self::multiWhere($condition)->delete();
    }

}