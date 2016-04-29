<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    //
    public $timestamps = false;
    protected $table = "cars";
    
    public function model(){
        return $this->belongsTo("App\Model","model_id","id");
    }
    public function images(){
        return $this->hasMany("App\Image","cars_id","id");
    }
    
    public function location(){
        return $this->belongsTo("App\Location","location_id","id");
    }
    public function user(){
        
        return $this->belongsTo("App\User");
    }
    
}
