<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use Auth;
use App\Role;
use App\User;

class RoutesModel extends Model{

    protected $table = 'zcl_mhtrooneww';

    public $customerId,$regionId,$subregionId,$municipalityId,$networkId,$storageId,$storageUnitId,$finalUnitId;

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
            $query .=" and  (Ypefid = ".$this->regionId.")";// or Ypefid = ".$this->regionId." )";
        }

        if($this->subregionId>0){ 
            $query .=" and  (Ypenid = ".$this->subregionId.")";// or Ypefid = ".$this->regionId." )";
        }

        if($this->municipalityId>0){ 
            $query .=" and  (Ygeoid = ".$this->municipalityId.")";// or Ypefid = ".$this->regionId." )";
        }

        return $query;
    }

    public function getMapRegionCode(){
        if($this->regionId>0){
            $query = "SELECT code FROM `ga_periferia` where id = ".$this->regionId;
            $results = DB::select($query);
            return $results[0]->code;
        }else{
            return '';
        }

    }

    public function getCatsPerRegion($regionId,$year = 2014){
        $query = "SELECT sum(qty) as sum, descr as category FROM `zcl_mhtrooneww` ";
        $query .= " where Ypefid = ".$regionId;
        $query .= " and ".$this->filterDownUser($year);
        $query .= ' group by descr';
        $results = DB::select($query);
        return $results;
    }

    public function getPerifereies($year = 2014){

        $query = "SELECT b.*,c.code from ( ";
        $query .= "SELECT Ypefid as id, Ypefdescr as perifereia , sum(qty) as qty FROM zcl_mhtrooneww where Ypefdescr <> '' and ";
        $query .= $this->filterDownUser($year);
        $query .= " group by perifereia order by Ypefdescr asc"; 
        $query .= " ) as b join ga_periferia as c on b.id = c.id";
        $results = DB::select($query);

        foreach ($results as $key => $region){
            $empRow = new \stdClass();
            $empRow = $results[$key];
            $catsSums = RoutesModel::getCatsPerRegion($region->id,$year);
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
        $query .= " where Ypenid = ".$Id;
        $query .= " and ".$this->filterDownUser($year);
        $query .= ' group by descr';
        $results = DB::select($query);
        return $results;
    }

    public function getSubRegions($year = 2014){

        $query = "SELECT Ypenid as id, Ypendescr as name , sum(qty) as qty FROM zcl_mhtrooneww where Ypendescr <> '' and ";
        $query .= $this->filterDownUser($year);
        $query .= " group by name order by Ypendescr asc"; 
        $results = DB::select($query);

        foreach ($results as $key => $region){
            $empRow = new \stdClass();
            $empRow = $results[$key];
            $catsSums = RegionsModel::getCatsPerSubRegion($region->id,$year);
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
        $query .= " where Ygeoid = ".$Id;
        $query .= " and ".$this->filterDownUser($year);
        $query .= ' group by descr';
        $results = DB::select($query);
        return $results;
    }

    public function getMunicipalities($year = 2014){

        $query = "SELECT Ygeoid as id, Ygeodescr as name , sum(qty) as qty FROM zcl_mhtrooneww where Ygeodescr <> '' and ";
        $query .= $this->filterDownUser($year);
        $query .= " group by name order by Ygeodescr asc"; 
        $results = DB::select($query);

        foreach ($results as $key => $region){
            $empRow = new \stdClass();
            $empRow = $results[$key];
            $catsSums = RegionsModel::getCatsPerMunicipality($region->id,$year);
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

    public function getParentPeriferia($id){

        $query = "SELECT Kpefid,Kpenid,Kpefdescr,Kpendescr FROM `zcl_mhtrooneww` where Kpefid = ".$id." group by Kpenid limit 0,1";
        return DB::select($query);

    }

    public function getParentPerEnotita($id){
        $query = "SELECT Kpefid,Kpenid,Kgeoid,Kpefdescr,Kpendescr,Kgeodescr FROM `zcl_mhtrooneww` where Kpenid = ".$id." group by Kgeoid limit 0,1";
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

    public function getFinalUnit($year){
        $query = "SELECT descr,sum(qty) as sum FROM `zcl_mhtrooneww` ";
        $results = DB::select($query);
        return $emptyRow;
    }

    public function getTrucks($year,$count = 0){

        $query = "SELECT distinct(pinakida) as trucks FROM `zcl_mhtrooneww` where ";
        $query .= $this->filterDownUser($year);
        $results = DB::select($query);

        if($count === 1){
            $emptyRow = new \stdClass();
            $emptyRow = $results[0]->trucks;
            return $emptyRow; 
        }else{
            return $results;
        }
        
    }

    public function getRoutesProdToMex($year){

        $query = "SELECT count(distinct(tradecode)) as prodToMex FROM `zcl_mhtrooneww` where  tradecode2<> '' and ";
        $query .= $this->filterDownUser($year);
        $results = DB::select($query);
        $emptyRow = new \stdClass();
        $emptyRow = $results[0]->prodToMex;
        return $emptyRow; 
    }

    public function getRoutesMexToFinal($year){

        $query = "SELECT count(distinct(tradecode2)) as mexToFinal FROM `zcl_mhtrooneww` where ";
        $query .= $this->filterDownUser($year);
        $results = DB::select($query);
        $emptyRow = new \stdClass();
        $emptyRow = $results[0]->mexToFinal;
        return $emptyRow; 
    }

    public function getRoutesProdToFinal($year){

        $query = "SELECT count(distinct(tradecode)) as prodToFinal FROM `zcl_mhtrooneww` where  tradecode2 =  '' and ";
        $query .= $this->filterDownUser($year);
        $results = DB::select($query);

        $emptyRow = new \stdClass();
        $emptyRow = $results[0]->prodToFinal;

        return $emptyRow; 
    }

    public function getAllRoutes($year){

        return (RoutesModel::getRoutesProdToMex($year)+RoutesModel::getRoutesMexToFinal($year)+RoutesModel::getRoutesProdToFinal($year));

    }

    public function getAllRoutesDetails($year){

        $query = "SELECT id, ftrdate, ftrdate2, customer, egrisi, qty, paraliptis as mex, monada as finalunit, pinakida as trucks FROM `zcl_mhtrooneww` where ";
        $query .= $this->filterDownUser($year);
        $results = DB::select($query);
        return $results;

    }

    public function getMainChartData($year,$district = null,$customerId = 0){


        $categories = ['ALL','category1','category2','category3','laspi','fytika'];
        $jsonOutput = array();
        $jsonOutput['xAxis'] = $this->getMainChart($year,0,1);
        foreach($categories as $key => $value){
            $jsonOutput[$value] = RoutesModel::getMainChart($year,$key,0,$district,$customerId);
        }

        $jsonOutput['totalQTY']         = RoutesModel::getTotalQty($year,$district);
        $jsonOutput['categoriesSUM']    = RoutesModel::getCategoriesSum($year,$district);
        $jsonOutput['totalProducers']   = RoutesModel::getTotalProducers($year,$district); 
        //$jsonOutput['totalDromologia']   = RoutesModel::getTotaDromologia($year,$district); 
        $jsonOutput['totalDromologia'] = RoutesModel::getAllRoutes($year);
        $jsonOutput['totalMonades']     = RoutesModel::getTotaMonades($year,$district);
        $jsonOutput['totalForthga']     = RoutesModel::getTrucks($year,1);
        $jsonOutput['ForthgaDetails']     = RoutesModel::getTrucks($year);
        $jsonOutput['temperature']      = RoutesModel::getTemperature($year,$district);
        $jsonOutput['material']         = RoutesModel::getMaterial($year,$district);
        $jsonOutput['confiscation']     = RoutesModel::getConfiscation($year,$district);
        //$jsonOutput['confPercent']['yes']   = number_format($jsonOutput['confiscation'][0]->sum*100/($jsonOutput['confiscation'][0]->sum+$jsonOutput['confiscation'][1]->sum),2,'.','');
        //$jsonOutput['confPercent']['no']    = number_format($jsonOutput['confiscation'][1]->sum*100/($jsonOutput['confiscation'][0]->sum+$jsonOutput['confiscation'][1]->sum),2,'.','');
        //$jsonOutput['packaging']        = RegionsModel::getPackaging($year,$district);
        //$jsonOutput['packagingPercent']['yes'] = number_format($jsonOutput['packaging'][0]->sum*100/($jsonOutput['packaging'][0]->sum+$jsonOutput['packaging'][1]->sum),2,'.','');
        //$jsonOutput['packagingPercent']['no'] = number_format($jsonOutput['packaging'][1]->sum*100/($jsonOutput['packaging'][0]->sum+$jsonOutput['packaging'][1]->sum),2,'.','');
        $jsonOutput['mex'] = RoutesModel::getMex($year);
        $jsonOutput['regions'] = RoutesModel::getPerifereies($year);
        $jsonOutput['routesProdToMex'] = RoutesModel::getRoutesProdToMex($year);
        $jsonOutput['routesMexToFinal'] = RoutesModel::getRoutesMexToFinal($year);
        $jsonOutput['routesProdToFinal'] = RoutesModel::getRoutesProdToFinal($year);






        return $jsonOutput;
    }


}




