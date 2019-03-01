<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use Auth;
use App\Role;
use App\User;

class UnitsModel extends Model {

    protected $table = 'zcl_mhtrooneww';

    protected $customerId,$regionId,$subregionId,$municipalityId,$networkId,$storageId,$storageUnitId,$finalUnitId;

    public function __construct(){
        parent::__construct();
        if(Auth::user()){

            $this->customerId = Auth::user()->customer_id;
            $thisUser = User::with('roles')->find(Auth::user()->id);

            if($thisUser->hasRole('admin')){

            }

            if($thisUser->hasRole('gov')){

            }

            if($thisUser->hasRole('reg')){
                $this->regionId = $thisUser->region_id;
            }

            if($thisUser->hasRole('subreg')){
                $this->subregionId = $thisUser->subregion_id;
            }

            if($thisUser->hasRole('mnc')){
                $this->municipalityId = $thisUser->municipality_id;
            }

            if($thisUser->hasRole('net')){
                $this->networkId = $thisUser->network_id;
            }

            if($thisUser->hasRole('stor')){
                $this->customerId = $thisUser->customer_id;
            }

            if($thisUser->hasRole('stplant')){
                $this->storageUnitId = $thisUser->mex_id;
            }

            if($thisUser->hasRole('proplant')){
                $this->finalUnitId = $thisUser->finalunit_id;
            }


        }

    }


    public function getAvailableYears(){
        return DB::select('SELECT Year(ftrdate) as year FROM `zcl_mhtrooneww` group by Year(ftrdate) order by year desc');
    }

    public function formatNumber($number,$percentage = false){

        if($percentage) return number_format($number,2,",",".")." %";
        else   return number_format($number,2,",",".");

    }

    public function filterDownUser($year){

        $query = "";
        if($year == '')$year = '2014';
        if($year == 'last-12'){
            $query .= " ftrdate >= DATE_SUB(now(), INTERVAL 12 MONTH) "; 
        }else{    
            $query .=" year(ftrdate) = ".$year;
        }
        if($this->subregionId>0){

        }

        if($this->customerId>0){
            $query .=" and  cusid = ".$this->customerId;    
        }

        if(!empty($this->networkId)){
            $query .=" and  diktyo = '".$this->networkId."'";    
        }

        if($this->regionId>0){ 
            $query .=" and  (Kpefid = ".$this->regionId.")";// or Ypefid = ".$this->regionId." )";
        }

        if($this->subregionId>0){ 
            $query .=" and  (Kpenid = ".$this->subregionId.")";// or Ypefid = ".$this->regionId." )";
        }

        if($this->municipalityId>0){ 
            $query .=" and  (Kgeoid = ".$this->municipalityId.")";// or Ypefid = ".$this->regionId." )";
        }

        //        if($this->customerId>0){
        //            $query .=" and  cusid = ".$this->customerId;    
        //        }

        return $query;
    }

    public function getCatsPerRegion($regionId,$year = 2014){
        $query = "SELECT sum(qty) as sum, descr as category FROM `zcl_mhtrooneww` ";
        $query .= " where Kpefid = ".$regionId;
        $query .= " and ".$this->filterDownUser($year);
        $query .= ' group by descr';
        $results = DB::select($query);
        return $results;
    }

    public function getPerifereies($year = 2014){

        $query = "SELECT Kpefid as id, Kpefdescr as perifereia , sum(qty) as qty FROM zcl_mhtrooneww where Kpefdescr <> '' and ";
        $query .= $this->filterDownUser($year);
        $query .= " group by perifereia order by Kpefdescr asc"; 
        $results = DB::select($query);

        foreach ($results as $key => $region){
            $empRow = new \stdClass();
            $empRow = $results[$key];
            $catsSums = UnitsModel::getCatsPerRegion($region->id,$year);
            $region->qty =  floatval($region->qty/1000);
            $empRow->category1 = 0;
            $empRow->category2 = 0;
            $empRow->category3 = 0;
            $empRow->laspi      =0;
            $empRow->fytika     =0;
            foreach($catsSums as $sum){
                switch ($sum->category) {
                    case 'Κατηγορία 1':
                        $empRow->category1 = floatval($sum->sum/1000);
                        break;
                    case 'Κατηγορία 2':
                        $empRow->category2 = floatval($sum->sum/1000);
                        break;
                    case 'Κατηγορία 3':
                        $empRow->category3 = floatval($sum->sum/1000);
                        break;
                    case 'Λάσπη':
                        $empRow->laspi = floatval($sum->sum/1000);
                        break;
                    case 'Φυτικά':
                        $empRow->fytika = floatval($sum->sum/1000);
                        break;
                    default:
                }
            }

            $region = $empRow;
        }

        return $results;
    }

    public function getCatsPerSubRegion($Id,$year = 2014){
        $query = "SELECT sum(qty) as sum, descr as category FROM `zcl_mhtrooneww` ";
        $query .= " where Kpenid = ".$Id;
        $query .= " and ".$this->filterDownUser($year);
        $query .= ' group by descr';
        $results = DB::select($query);
        return $results;
    }

    public function getSubRegions($year = 2014){

        $query = "SELECT Kpenid as id, Kpendescr as name , sum(qty) as qty FROM zcl_mhtrooneww where Kpendescr <> '' and ";
        $query .= $this->filterDownUser($year);
        $query .= " group by name order by Kpendescr asc"; 
        $results = DB::select($query);

        foreach ($results as $key => $region){
            $empRow = new \stdClass();
            $empRow = $results[$key];
            $catsSums = UnitsModel::getCatsPerSubRegion($region->id,$year);
            $region->qty =  floatval($region->qty/1000);
            $empRow->category1 = 0;
            $empRow->category2 = 0;
            $empRow->category3 = 0;
            $empRow->laspi      =0;
            $empRow->fytika     =0;
            foreach($catsSums as $sum){
                switch ($sum->category) {
                    case 'Κατηγορία 1':
                        $empRow->category1 = floatval($sum->sum/1000);
                        break;
                    case 'Κατηγορία 2':
                        $empRow->category2 = floatval($sum->sum/1000);
                        break;
                    case 'Κατηγορία 3':
                        $empRow->category3 = floatval($sum->sum/1000);
                        break;
                    case 'Λάσπη':
                        $empRow->laspi = floatval($sum->sum/1000);
                        break;
                    case 'Φυτικά':
                        $empRow->fytika = floatval($sum->sum/1000);
                        break;
                    default:
                }
            }

            $region = $empRow;
        }

        return $results;
    }

    public function getCatsPerMunicipality($Id,$year = 2014){
        $query = "SELECT sum(qty) as sum, descr as category FROM `zcl_mhtrooneww` ";
        $query .= " where Kgeoid = ".$Id;
        $query .= " and ".$this->filterDownUser($year);
        $query .= ' group by descr';
        $results = DB::select($query);
        return $results;
    }

    public function getMunicipalities($year = 2014){

        $query = "SELECT Kgeoid as id, Kgeodescr as name , sum(qty) as qty FROM zcl_mhtrooneww where Kgeodescr <> '' and ";
        $query .= $this->filterDownUser($year);
        $query .= " group by name order by Kgeodescr asc"; 
        $results = DB::select($query);

        foreach ($results as $key => $region){
            $empRow = new \stdClass();
            $empRow = $results[$key];
            $catsSums = UnitsModel::getCatsPerMunicipality($region->id,$year);
            $region->qty =  floatval($region->qty/1000);
            $empRow->category1 = 0;
            $empRow->category2 = 0;
            $empRow->category3 = 0;
            $empRow->laspi      =0;
            $empRow->fytika     =0;
            foreach($catsSums as $sum){
                switch ($sum->category) {
                    case 'Κατηγορία 1':
                        $empRow->category1 = floatval($sum->sum/1000);
                        break;
                    case 'Κατηγορία 2':
                        $empRow->category2 = floatval($sum->sum/1000);
                        break;
                    case 'Κατηγορία 3':
                        $empRow->category3 = floatval($sum->sum/1000);
                        break;
                    case 'Λάσπη':
                        $empRow->laspi = floatval($sum->sum/1000);
                        break;
                    case 'Φυτικά':
                        $empRow->fytika = floatval($sum->sum/1000);
                        break;
                    default:
                }
            }

            $region = $empRow;
        }

        return $results;
    }

    public function getMainChart($year,$category,$xAxis){


        $categories = ['ALL','Κατηγορία 1','Κατηγορία 2','Κατηγορία 3','Λάσπη','Φυτικά'];
        if($category>=0){ $chooseCategory = $categories[$category]; }else{die('no category selected');}

        $query = "select month(ftrdate) as month, year(ftrdate) as year, sum(qty) as posotita, descr as katigoria from zcl_mhtrooneww where ";

        if($chooseCategory<>'ALL')$query .="descr='".$chooseCategory."' and";
        $query .= $this->filterDownUser($year);
        $query .=" group by month(ftrdate) ";
        if($year == 'last-12'){
            $query .="order by ftrdate asc";
        }

        $jsonOutput = Array();
        $results = DB::select($query);


        foreach($results as $obj ) {
            if(!empty($xAxis)){
                array_push($jsonOutput,date('M', mktime(0, 0, 0, $obj->month, 10))."<br>".$obj->year);
            }else{
                array_push($jsonOutput,floatval($obj->posotita/1000));
            }
        }

        return $jsonOutput;
    }

    public function getTotalQty($year,$customerId = 0){

        if($year == '')$year = '2014';

        $query = "select sum(qty) as posotita, descr as katigoria from zcl_mhtrooneww where ";

        $query .= $this->filterDownUser($year);

        $results = DB::select($query);

        foreach($results as $obj){
            $jsonOutput = floatval($obj->posotita);
        }

        $retVal = number_format($jsonOutput/1000,2,",",".");

        return $retVal;

    }

    public function getCategoriesSum($year,$district = null){

        $query = "SELECT sum(qty) as sum,descr FROM `zcl_mhtrooneww` where ";
        $query .= $this->filterDownUser($year);
        $query .=" group by descr order by descr asc";
        $results = DB::select($query);
        $sum = 0;
        $retResults = array();
        foreach($results as $key=>$row){
            $sum+=$row->sum;
        }
        foreach($results as $key=>$row){
            $empRow = new \stdClass();
            $empRow->sum = $row->sum;
            $empRow->descr = $row->descr;
            $empRow->perc = $this->formatNumber((($row->sum*100)/$sum),true);
            array_push($retResults,$empRow);
        }

        if(count($results)<5){

            $emptyRow = new \stdClass();
            $emptyRow->perc = "0%";
            $emptyRow->sum = "0";
            $emptyRow->descr = 'No Data';
            $retResults = array_pad($retResults, 5, $emptyRow);
        }
        return  $retResults;//$results;
    }

    public function getTotalProducers($year,$district = null,$customerId = 0){

        $query = "select count(distinct(pelatis)) as paragogoi  from zcl_mhtrooneww where ";
        $query .= $this->filterDownUser($year);
        $results = DB::select($query);
        $jsonOutput = Array();
        /* fetch object array */
        foreach($results as $obj){
            $jsonOutput = floatval($obj->paragogoi);
        }
        $retVal = number_format($jsonOutput,0,",",".");
        return $retVal;
    }

    public function getTotaDromologia($year,$district = null,$customerId = 0){//dromologia monades fortiga

        $query = "select count(distinct(tradecode)) as dromologia from zcl_mhtrooneww where ";
        $query .= $this->filterDownUser($year);
        $results = DB::select($query);
        $jsonOutput = Array();

        /* fetch object array */
        foreach($results as $obj){
            $jsonOutput = intval($obj->dromologia);
        }
        $retVal = $jsonOutput;
        return $retVal;

    }

    public function getTotaMonades($year,$district = null,$customerId = 0){//dromologia monades fortiga

        $query = "select count(distinct(monada)) as monades from zcl_mhtrooneww where ";
        $query .= $this->filterDownUser($year);
        $results = DB::select($query);
        $jsonOutput = Array();
        /* fetch object array */
        foreach($results as $obj){
            $jsonOutput = intval($obj->monades);
        }
        $retVal = $jsonOutput;
        return $retVal;
    }

    public function getTotaTrucks($year,$district = null,$customerId = 0){//dromologia monades fortiga

        $query = "select count(distinct(monada)) as monades from zcl_mhtrooneww where ";
        $query .= $this->filterDownUser($year);
        $results = DB::select($query);
        $jsonOutput = Array();
        /* fetch object array */
        foreach($results as $obj){
            $jsonOutput = intval($obj->monades);
        }
        $retVal = $jsonOutput;
        return $retVal;
    }

    public function getTemperature($year,$district=null){

        $query = "SELECT sum(qty) as sum ,thermokrasia as type FROM `zcl_mhtrooneww` where thermokrasia <> '' ";
        $query .= " and ".$this->filterDownUser($year);
        $query .= ' group by thermokrasia';
        $results = DB::select($query);
        //        $resArray = array();
        //        foreach($results as $row){
        //            $row->sum = $this->formatNumber($row->sum);
        //            array_push($resArray,$row);
        //        }
        return $results;

    }

    public function getMaterial($year,$district=null){

        $query = "SELECT sum(qty) as y ,eidos_ylikon as name FROM `zcl_mhtrooneww` where eidos_ylikon <> '' ";
        $query .= " and ".$this->filterDownUser($year);        
        $query .= ' group by eidos_ylikon order by y desc';
        $results = DB::select($query);

        $jsonOutput = Array();
        /* fetch object array */
        $sum = 0;
        foreach($results as $obj){
            $sum = $obj->y+$sum; 
        }
        $sum2=0;
        foreach($results as $key=>$obj){
            if($key<7)array_push($jsonOutput,['name'=>$obj->name,'y'=>floatval($this->formatNumber(($obj->y/$sum)*100))]);
            else{
                $sum2 = $obj->y+$sum2;
            }
        }
        if($sum)array_push($jsonOutput,['name'=>'Λοιπά','y'=>floatval($this->formatNumber(($sum2/$sum)*100))]);
        return $jsonOutput;
    }

    public function getConfiscation($year,$district=null){

        $query = "SELECT sum(qty) as sum ,katasxesi as type FROM `zcl_mhtrooneww` where katasxesi <> '' ";
        $query .= " and ".$this->filterDownUser($year);
        $query .= ' group by katasxesi';
        $results = DB::select($query);
        if(count($results)<2){
            $emptyRow = new \stdClass();
            $emptyRow->sum = "0";
            $emptyRow->type = 'No Data';
            $results = array_pad($results, 2, $emptyRow);
        }
        return $results;

    }

    public function getPackaging($year,$district=null){

        $query = "SELECT (sum(qty)/1000) as sum ,syskeysia as type FROM `zcl_mhtrooneww` where syskeysia <> '' ";
        $query .= " and ".$this->filterDownUser($year);
        $query .= ' group by syskeysia';
        $results = DB::select($query);
        if(count($results)<2){
            $emptyRow = new \stdClass();
            $emptyRow->sum = "0";
            $emptyRow->type = 'No Data';
            $results = array_pad($results, 2, $emptyRow);
        }
        return $results;

    }

    public function getPeriferiaName($id){

        $query = "select DESCR from zcl_periferia where codeid = ".$id;

        return DB::select($query);

    }

    public function getMex($year){

        $query = "SELECT sum(qty) as sum, paraliptis as mex FROM `zcl_mhtrooneww` ";
        $query .= " where paraliptis <> '' and ".$this->filterDownUser($year);
        $query .= ' group by paraliptis';
        $results = DB::select($query);
        $sum = 0;
        foreach($results as $row){
            $sum += $row->sum;
        }

        $emptyRow = new \stdClass();
        $emptyRow->count = count($results);
        $emptyRow->sum = $this->formatNumber($sum/1000);


        //        if(count($results)<2){
        //            $emptyRow = new \stdClass();
        //            $emptyRow->sum = "0";
        //            $emptyRow->type = 'No Data';
        //            $results = array_pad($results, 2, $emptyRow);
        //        }
        return $emptyRow;

    }

    public function getFinalUnit($year = 2014){

        $query = "SELECT descr,sum(qty) as sum FROM `zcl_mhtrooneww` ";
        //$query .= "where Kpefid = 2 ";
        //$query .= " group by descr ";

        $results = DB::select($query);
        return $emptyRow;

    }

    public function getFinalUnitCats($year = 2014,$unit){

        $query = "SELECT sum(qty) as sum, monada as name,descr, 
        case descr WHEN 'Κατηγορία 1' THEN sum(qty) else false end as category1 ,
        case descr WHEN 'Κατηγορία 2' THEN sum(qty) else false end as category2 ,
        case descr WHEN 'Κατηγορία 3' THEN sum(qty) else false end as category3 ,
        case descr WHEN 'Λάσπη' THEN sum(qty) else false end as laspi ,
        case descr WHEN 'Φυτικά' THEN sum(qty) else false end as fytika ";
        $query .=" FROM `zcl_mhtrooneww`";
        $query .= " where monada = '".$unit."' ";
        $query .= "  and ".$this->filterDownUser($year);
        $query .= ' group by descr';
        return DB::select($query);

    }

    public function getUnits($year){

        $query = "SELECT sum(qty) as sum, monada as name FROM `zcl_mhtrooneww` ";
        $query .= " where monada <> '' and ".$this->filterDownUser($year);
        $query .= ' group by monada';
        $results =  DB::select($query);
        $newResults = array();
        foreach ($results as $row){
            $emptyRow = new \stdClass();
            $emptyRow->category1 = 0;
            $emptyRow->category2 = 0;
            $emptyRow->category3 = 0;
            $emptyRow->laspi = 0;
            $emptyRow->fytika = 0;
            foreach($this->getFinalUnitCats($year,$row->name) as $row2){
                $emptyRow->category1 = (int)$row2->category1;
                $emptyRow->category2 = (int)$row2->category2;
                $emptyRow->category3 = (int)$row2->category3;
                $emptyRow->laspi = (int)$row2->laspi;
                $emptyRow->fytika = (int)$row2->fytika;
            }
            $row->categoriesSums = $emptyRow;
            array_push($newResults,$row);
        }
        return $newResults;
    }
    public function getMainChartData($year,$district = null,$customerId = 0){
        $categories = ['ALL','category1','category2','category3','laspi','fytika'];
        $jsonOutput = array();
        $jsonOutput['xAxis'] = $this->getMainChart($year,0,1);
        foreach($categories as $key => $value){
            $jsonOutput[$value] = UnitsModel::getMainChart($year,$key,0,$district,$customerId);
        }
        $jsonOutput['totalQTY']         = UnitsModel::getTotalQty($year,$district);
        $jsonOutput['categoriesSUM']    = UnitsModel::getCategoriesSum($year,$district);
        $jsonOutput['totalProducers']   = UnitsModel::getTotalProducers($year,$district); 
        $jsonOutput['totalDromologia']   = UnitsModel::getTotaDromologia($year,$district); 
        $jsonOutput['totalMonades']     = UnitsModel::getTotaMonades($year,$district);
        //$jsonOutput['totalForthga']     = UnitsModel::getTotaTrucks($year,$district);
        $jsonOutput['totalForthga'] = '-';
        $jsonOutput['temperature']      = UnitsModel::getTemperature($year,$district);
        $jsonOutput['material']         = UnitsModel::getMaterial($year,$district);
        $jsonOutput['confiscation']     = UnitsModel::getConfiscation($year,$district);
        $jsonOutput['confPercent']['yes']   = number_format($jsonOutput['confiscation'][0]->sum*100/($jsonOutput['confiscation'][0]->sum+$jsonOutput['confiscation'][1]->sum),2,'.','');
        $jsonOutput['confPercent']['no']    = number_format($jsonOutput['confiscation'][1]->sum*100/($jsonOutput['confiscation'][0]->sum+$jsonOutput['confiscation'][1]->sum),2,'.','');
        $jsonOutput['packaging']        = UnitsModel::getPackaging($year,$district);
        $jsonOutput['packagingPercent']['yes'] = number_format($jsonOutput['packaging'][0]->sum*100/($jsonOutput['packaging'][0]->sum+$jsonOutput['packaging'][1]->sum),2,'.','');
        $jsonOutput['packagingPercent']['no'] = number_format($jsonOutput['packaging'][1]->sum*100/($jsonOutput['packaging'][0]->sum+$jsonOutput['packaging'][1]->sum),2,'.','');
        $jsonOutput['mex'] = UnitsModel::getMex($year);
        $jsonOutput['regions'] = UnitsModel::getPerifereies($year);

        return $jsonOutput;
    }


}




