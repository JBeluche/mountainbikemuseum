<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ListItem extends Model
{
    public function listitems()
    {
        return $this->hasMany(ListItem::class);
    }

    public function components()
    {
        return $this->belongsTo(Component::class);
    }

    public function childrenListItems()
    {
        return $this->hasMany(ListItem::class)->with('listitems');
    }

}
