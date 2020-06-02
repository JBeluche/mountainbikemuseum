<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImageField extends Model
{
    public function components(){
        $this->belongsTo(Component::class);
    }
}
