<?php

namespace App\Models;

class InterfaceManualParam extends Model
{
    protected $fillable = ['manual_id','type','name','field_type','desc','is_required'];
}
