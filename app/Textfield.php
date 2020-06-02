<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Textfield extends Model
{
    public function components()
    {
        return $this->belongsTo(Component::class);
    }
}
