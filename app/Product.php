<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Subscriptions;
use App\Payment;

class Product extends Model
{
  public function subscriptions()
  {
    return $this->hasMany(Subscription::class);
  }
  
 
}
