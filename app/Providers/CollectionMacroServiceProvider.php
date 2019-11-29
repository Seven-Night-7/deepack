<?php

namespace App\Providers;

use Illuminate\Support\Collection;
use Illuminate\Support\ServiceProvider;

class CollectionMacroServiceProvider extends ServiceProvider
{
    /**
     * 定义全局Collection宏方法
     */
    public function boot()
    {
        //  eachMerge：遍历二维数组，每一项子数组合并$arr
        Collection::macro('eachMerge', function ($arr) {
            return $this->map(function ($item) use ($arr) {
                return array_merge($item, $arr);
            });
        });
    }
}
