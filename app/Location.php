<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    //
    public $timestamps = false;
    protected $table = "location";
    
    public function cars(){
        return $this->HasMany("App\Car","location_id","id")->simplePaginate(20);    
    }
}
