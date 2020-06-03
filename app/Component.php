<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Component extends Model
{

    public $textfield = array();

    public function textfields()
    {
        return $this->hasMany(Textfield::class);
    }

    public function imageFields()
    {
        return $this->hasMany(ImageField::class);
    }

    public function componentlists()
    {
        return $this->hasOne(ComponentList::class);
    }

    public function listItems()
    {
        return $this->hasMany(ListItem::class);
    }


    
}
