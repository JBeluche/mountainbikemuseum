<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ComponentTextfield extends Model
{
    public function components()
    {
        return $this->belongsTo(Component::class);
    }
}
