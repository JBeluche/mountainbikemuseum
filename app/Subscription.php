<?php

namespace App;
use App\User;
use App\Product;

use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    public function users()
    {
      return $this->belongsTo(User::class);
    }
    
    public function product()
    {
      return $this->belongsTo(Product::class);
    }

}
