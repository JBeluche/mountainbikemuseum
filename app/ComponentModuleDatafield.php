<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ComponentModuleDatafield extends Model
{
    public function componentModule()
    {
        return $this->belongsTo(ComponentModule::class);
    }
}
