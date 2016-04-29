<?php

namespace App;

use Illuminate\Database\Eloquent\Model as Mod;

class Model extends Mod
{
    //
      public $timestamps = false;
    protected $table = "model";
    
    
    public function cars(){
      return $this->hasMany("App\Car");
    }
}
