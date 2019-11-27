<?php

namespace Foryoufeng\Generator\Models;

use App\Models\BaseModel;

class LaravelGeneratorType extends BaseModel
{

    protected $guarded=[];

    public const MODEL='Model';
    public const Controllers='Controllers';
    public const Views='Views';
    public const Route='Route';
    /**
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function templates()
    {
        return $this->hasMany(LaravelGenerator::class,'template_id','id');
    }
}
