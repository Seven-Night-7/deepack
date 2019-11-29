<?php

namespace App\Models;

class InterfaceManual extends Model
{
    protected $fillable = ['dir_id','name','uri','method_type','desc'];

    public function params()
    {
        return $this->hasMany(InterfaceManualParam::class, 'manual_id', 'id');
    }
}
