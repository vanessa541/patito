<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    //relación empleado->usuario
   public function user()
    {
    return $this->belongsTo(User::class);
    }
 
}

