<?php

namespace App\Models;

use App\Enums\DirLevel;

class ManualDir extends Model
{
    /**
     * 子目录
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function sub()
    {
        return $this->hasMany(self::class, 'parent_id', 'id');
    }

    /**
     * 接口文档
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function interfaceManuals()
    {
        return $this->hasMany(InterfaceManual::class, 'dir_id', 'id');
    }

    /**
     * 三级目录及对应接口文档
     * @param $query
     * @return mixed
     */
    public function scopeWithThreeLevel($query)
    {
        return $query->where('level', DirLevel::FIRST_LEVEL)
            ->with([
                'sub' => function ($query) {
                    $query->with([
                        'sub' => function ($query) {
                            $query->with(['sub','interfaceManuals']);
                        },
                        'interfaceManuals'
                    ]);
                },
                'interfaceManuals'
            ]);
    }
}
