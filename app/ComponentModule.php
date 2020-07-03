<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ComponentModule extends Model
{
    public function components()
    {
        return $this->belongsToMany(Component::class);
    }

    public function componentsmoduledatafields()
    {
        return $this->hasMany(ComponentModuleDatafield::class);
    }
}
