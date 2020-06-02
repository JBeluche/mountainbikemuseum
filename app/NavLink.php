<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NavLink extends Model
{
    public function pages(){
        return $this->hasMany(Page::class);
    }
}
