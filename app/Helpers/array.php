<?php

//  遍历二维数组，每一项子数组合并$appendArray
function array_each_merge(array $targetArray, array $appendArray)
{
    return array_map(function ($item) use ($appendArray) {
        return array_merge($item, $appendArray);
    }, $targetArray);
}