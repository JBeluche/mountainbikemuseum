<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    
  public function components()
  {
    return $this->belongsToMany(Component::class);
  }

  public function navitems(){
    return $this->belongsTo(NavItem::class);
  }

  public function getRouteKeyName(){
    return 'name';
}

}
