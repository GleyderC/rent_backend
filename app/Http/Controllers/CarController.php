<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Car;
use Input;
use DB;
class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         // return Car::Paginate(20); 
           return Car::with(array("images","location","user","model"))->simplePaginate(20);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            $car = new Car;
            $car->model_id  = Input::get("model");
            $car->user_id  = Auth::user()->id;
            $car->is_electric = Input::get("is_electric");
            $car->allow_animals = Input::get("allow_animals");
            $car->it_have_ac = Input::get("it_have_ac");
            $car->is_available = Input::get("is_available");
            $car->capacity = Input::get("capacity");
            $car->gasoline = Input::get("gasoline");
            $car->price_per_day= Input::get("price_per_day");
            $car->price_per_hour = Input::get("price_per_hour");
            $car->price_per_week = Input::get("price_per_week");
            $car->price_per_month = Input::get("price_per_month");
            
            if(Input::get("location_id")!=null){
                        $car->location_id = Input::get("location_id");
            }else{
                if(Input::get("latitude")!=null){
                
                    $star_lat = Input::get("latitude");
                    $star_long = Input::get("longitude");
                    $SQL_location = "SELECT id, latitude, longitude, SQRT(
                                    POW(69.1 * (latitude - [".$star_lat."]), 2) +
                                    POW(69.1 * ([".$star_long."] - longitude) * COS(latitude / 57.3), 2)) AS distance
                                    FROM location HAVING distance < 4 ORDER BY distance;" ;
                    $arr  =  array();
                    $location = DB::select($SQL_location)->get()->first();
                    
                    $car->location_id = $location->id;
                }
            }
            $car->save();
            
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $car = Car::where("id",$id)->with("images")->get();
        return  $car;

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }
    public function getCar()
    {       
            $query = DB::table("cars");
            $where = array();
            if(Input::get("model")!=null){
                    $where["model_id"] = Input::get("model");
            }
            if(Input::get("brand")!=null){
                $brand = Input::get("brand");
                if(Input::get("model")!=null){
                    $where["model_id"] = Input::get("model");
                }else{
                    $sql =  DB::table("model")->select("id")->where("brand_id",$brand)->get();
                    $arr = array();
                    foreach($sql as $k => $v ) {
                        array_push($arr,$v->id);
                    }
                    
                    $query->whereIn("model_id",$arr);    
                }
            }
            if(Input::get("user")!=null){
                    $where["user_id"] = Input::get("user");
            }      
            if(Input::get("is_electric")!=null){
                    $where["is_electric"] = Input::get("is_electric");
            }      
            
            if(Input::get("allow_animals")!=null){
                    $where["allow_animals"] = Input::get("allow_animals");
            }
            if(Input::get("it_have_ac")!=null){
                    $where["it_have_ac"] = Input::get("it_have_ac");
            }
             if(Input::get("is_available")!=null){
                    $where["is_available"] = Input::get("is_available");
            }
            if(Input::get("capacity")!=null){
                    $where["capacity"] = Input::get("capacity");
            }
            
         
            if(Input::get("is_electric")!=null){
                    $where["is_electric"] = Input::get("is_electric");
            }      
            if(Input::get("gasoline")!=null){
                    $where["gasoline"] = Input::get("gasoline");
            }
             if(Input::get("price_per_hour")!=null){
                    $where["price_per_hour"] = Input::get("price_per_hour");
            }
            if(Input::get("price_per_day")!=null){
                    $where["price_per_day"] = Input::get("price_per_day");
            }
            if(Input::get("price_per_month")!=null){
                    $where["price_per_month"] = Input::get("price_per_month");
            }
            if(Input::get("price_per_week")!=null){
                    $where["price_per_week"] = Input::get("price_per_week");
            }
            
            if(Input::get("latitude")!=null){
                
                $star_lat = Input::get("latitude");
                $star_long = Input::get("longitude");
                $SQL_location = "SELECT id, latitude, longitude, SQRT(
                                POW(69.1 * (latitude - [".$star_lat."]), 2) +
                                POW(69.1 * ([".$star_long."] - longitude) * COS(latitude / 57.3), 2)) AS distance
                                FROM location HAVING distance < 5 ORDER BY distance;" ;
                $arr  =  array();
                $qry_location = DB::select($SQL_location)->get();
                foreach($SQL_location as $k => $v ) {
                    array_push($arr,$v->id);
                }
                $query->whereIn("location_id",$arr);

            }
            if(Input::get("location")!=null){
                    $where["location_id"] = Input::get("location");
            }
            $result =  $query->where($where)->get();
            return $result;
            
            
    }
}


