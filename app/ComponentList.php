<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ComponentList extends Model
{
    public function components()
    {
        return $this->belongsToMany(Component::class);
    }

}
