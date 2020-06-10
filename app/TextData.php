<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TextData extends Model
{
    public function componenttextfields()
    {
        return $this->hasMany(ComponentTextfield::class);
    }
}
