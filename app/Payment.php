<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Subscription;

class Payment extends Model
{
    public function users()
    {
      return $this->belongsTo(User::class);
    }
 
  

}
