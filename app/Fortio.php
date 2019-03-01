<?php namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class Fortio extends Model {

    //

    protected $table = 'ga_fortio';

    //get all perifereies
    public function getFortia(){

//        $query = "SELECT * from ga_fortio";
//
//        $results = DB::select($query);
//
//        return $results;
        
        
        $query = "SELECT * FROM ga_fortio limit 0,20";

        $results = DB::select($query);

        return $results;
        
    }
}