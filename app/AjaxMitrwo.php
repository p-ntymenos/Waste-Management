<?php
<<<<<<< HEAD

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

=======
namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Auth;
>>>>>>> newGorilla
class AjaxMitrwo extends Model
{
    protected $table = 'zcl_mhtrooneww';

<<<<<<< HEAD
    public function getPeriferies()
    {
        return $this->where('Kpefdescr','!=','')->groupBy('Kpefdescr')->orderBy('Kpefdescr','ASC')->paginate(20,['Kpefdescr']);
    }

    public function getPeriferiakesEnotites($periferia = null)
    {
        $query = $this->select(DB::raw('Ygeodescr, sum(qty) as qty'))
                    ->where('Kpefdescr','!=','')
                    ->where('Ygeodescr','!=','');
=======
    protected $customerId ;

    public function __construct(){
        parent::__construct();
        if(Auth::user()){
            $this->customerId = Auth::user()->customer_id;
        }

    }

    public function getAllDiktya(){

        $query = "SELECT cusid,customer FROM zcl_mhtrooneww group by cusid order by customer asc";

        $results = DB::select($query);

        return $results;
    }

    public function getAllRegions(){

        $query = "SELECT distinct(Kpefdescr) as name , Kpefid as id FROM zcl_mhtrooneww where Kpefid>0 order by name asc";

        $results = DB::select($query);

        return $results;
    }
    
    public function getAllSubRegions($id = null){
        $query = "SELECT distinct(Kpendescr) as name, Kpenid as id FROM zcl_mhtrooneww where ";
        if($id) $query .="  Kpefid = '".$id."' and ";
        $query .=" Kpendescr <> '' ";
        $query .=" order by name asc";
        
        $results = DB::select($query);
        return $results;
    }
    
    public function getAllMunicipalities($id = null){
        $query = "SELECT distinct(Kgeodescr) as name,Kgeoid as id FROM zcl_mhtrooneww where";
        if($id) $query .=" Kpenid = '".$id."' and ";
        $query .=" Kgeodescr <> '' ";
        $query .=" order by name asc";
        
        $results = DB::select($query);
        return $results;
    }
    
    public function getAllNetworks($cusId){
        $query = "SELECT distinct(diktyo) as name,pelatis  FROM zcl_mhtrooneww where diktyo <> ''";
        
        if(!empty($cusId))$query .= "  and cusid = ".$cusId." ";
        $query .=" group by name order by name asc";
        
        
        $results = DB::select($query);
        return $results;
    }
    
    public function getAllStoragesPlants(){
        $query = "SELECT distinct(paraliptis) as name  FROM zcl_mhtrooneww where paraliptis <> '' ";
        $results = DB::select($query);
        return $results;
    }
    
    public function getAllProcessingPlants(){
        $query = "SELECT distinct(monada) as name  FROM zcl_mhtrooneww where monada <> '' ";
        $results = DB::select($query);
        return $results;
    }
    
    public function getRoles(){
        $query = "SELECT * FROM roles";
        $results = DB::select($query);
        return $results;
    }

    public function getClient($id){

        $query = "SELECT cusid,customer FROM zcl_mhtrooneww where cusid = ".$id." limit 0,1";

        $results = DB::select($query);

        return $results;
    }

    public function getAllClients(){

        $query = "SELECT distinct(cusid),customer FROM zcl_mhtrooneww where cusid>0 order by customer asc";

        $results = DB::select($query);

        return $results;
    }

    public function getRegions($year = 2014,$clientId = 0){

        $query = "SELECT Kpefdescr as name , sum(qty) as qty FROM zcl_mhtrooneww where Kpefdescr <> '' and ";

        if($year == '')$year = '2014';
        if($year == 'last-12'){
            $query .= " ftrdate >= DATE_SUB(now(), INTERVAL 12 MONTH) "; 
        }else{    
            $query .=" year(ftrdate) = ".$year;
        }
        $query .= " group by name order by Kpefdescr asc"; 
        $results = DB::select($query);
        return $results;
    }

    public function getSubRegions($year = 2014,$clientId = 0){

        $query = "SELECT Kpendescr as name , sum(qty) as qty FROM zcl_mhtrooneww where Kpendescr <> '' and ";

        if($year == '')$year = '2014';


        if($year == 'last-12'){
            $query .= " ftrdate >= DATE_SUB(now(), INTERVAL 12 MONTH) "; 
        }else{    
            $query .=" year(ftrdate) = ".$year;

        }

        $query .= " group by name order by Kpendescr asc"; 



        $results = DB::select($query);

        return $results;
    }

    public function getMunicipalities($year = 2014,$clientId = 0){

        $query = "SELECT Kgeodescr as name , sum(qty) as qty FROM zcl_mhtrooneww where Kgeodescr <> '' and ";

        if($year == '')$year = '2014';


        if($year == 'last-12'){
            $query .= " ftrdate >= DATE_SUB(now(), INTERVAL 12 MONTH) "; 
        }else{    
            $query .=" year(ftrdate) = ".$year;

        }

        $query .= " group by name order by name asc"; 



        $results = DB::select($query);

        return $results;
    }

    public function getProducers($year = 2014,$clientId = 0){

        $query = "SELECT pelatis as name , sum(qty) as qty FROM zcl_mhtrooneww where pelatis <> '' and ";

        if($year == '')$year = '2014';


        if($year == 'last-12'){
            $query .= " ftrdate >= DATE_SUB(now(), INTERVAL 12 MONTH) "; 
        }else{    
            $query .=" year(ftrdate) = ".$year;
        }
        
        if($this->customerId)$query .= ' and cusid = '.$this->customerId;

        $query .= " group by cusid order by name asc"; 

        $results = DB::select($query);
        return $results;
    }

    public function getProducersActivity($year = 2014){

        $query = "SELECT occupation as name , sum(qty) as qty FROM zcl_mhtrooneww where occupation <> '' and ";

        if($year == '')$year = '2014';


        if($year == 'last-12'){
            $query .= " ftrdate >= DATE_SUB(now(), INTERVAL 12 MONTH) "; 
        }else{    
            $query .=" year(ftrdate) = ".$year;
        }
        
        if($this->customerId)$query .= ' and cusid = '.$this->customerId;

        $query .= " group by occupation order by name asc"; 

        $results = DB::select($query);
        return $results;
    }

    public function getPeriferies(){

        $query = "SELECT * FROM `zcl_periferia` as a left join zcl_mhtrooneww as b on a.CODEID = b.Kpefid where kpefid <> 0 group by Kpefid order by Kpefid asc";
        $results = DB::select($query);
        return $results;

        //return $this->where('Kpefdescr','!=','')->groupBy('Kpefdescr')->orderBy('Kpefdescr','ASC')->paginate(20,['Kpefdescr']);
    }

    public function getPeriferiakesEnotites($periferia = null,$perEnotita = null){
        $query = $this->select(DB::raw('Ygeodescr, sum(qty) as qty'))
            ->where('Kpefdescr','!=','')
            ->where('Ygeodescr','!=','');


>>>>>>> newGorilla

        if ($periferia != null) {
            $query = $query->where('Kpefdescr','=',$periferia);
        }

<<<<<<< HEAD
        $query = $query->orderBy('Ygeodescr','ASC')
                    ->groupBy('Ygeodescr')
                    ->paginate(20);
=======


        $query = $query->orderBy('Ygeodescr','ASC')
            ->groupBy('Ygeodescr')
            ->paginate(20);
>>>>>>> newGorilla

        return $query;
    }

<<<<<<< HEAD
    public function getDimoi($periferia = null)
    {
=======
    public function getDimoi($periferia = null){
>>>>>>> newGorilla
        $query = $this->select(DB::raw('Kgeodescr, sum(qty) as qty'))
            ->where('Kpefdescr','!=','')
            ->where('Kgeodescr','!=','');

        if ($periferia != null) {
            $query = $query->where('Kpefdescr','=',$periferia);
        }

        $query = $query->orderBy('Kgeodescr','ASC')
            ->groupBy('Kgeodescr')
            ->paginate(5);

        return $query;
    }

<<<<<<< HEAD
    public function getDrastiriotites($paragwgos = null)
    {
=======
    public function getDrastiriotites($paragwgos = null){
>>>>>>> newGorilla
        $query = $this->select(DB::raw('occupation, sum(qty) as qty'))
            ->where('Kpefdescr','!=','')
            ->where('Kgeodescr','!=','');

        if ($paragwgos != null) {
            $query = $query->where('Kpefdescr','=',$paragwgos);
        }

        $query = $query->orderBy('occupation','ASC')
            ->groupBy('occupation')
            ->paginate(5);

        return $query;
    }

<<<<<<< HEAD
    public function getWeightByPeriferia($periferia)
    {
        return $this->select(DB::raw('sum(qty) as qty,descr'))->where('Kpefdescr','=',$periferia)->groupBy('descr')->orderBy('descr','ASC')->get();
    }

    public function getCategories()
    {
=======
    public function getWeightByPeriferia($periferia){
        return $this->select(DB::raw('sum(qty) as qty,descr'))->where('Kpefdescr','=',$periferia)->groupBy('descr')->orderBy('descr','ASC')->get();
    }

    public function getCategories(){
>>>>>>> newGorilla
        return $this->select(DB::raw('distinct(descr)'))->orderBy('descr','ASC')->get('descr');
    }


}
