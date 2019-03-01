<?php namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;
<<<<<<< HEAD

class Mitrwo extends Model {

    //

    protected $table = 'zcl_mhtrooneww';

    //get all perifereies
    public function getPerifereies(){

        $query = "SELECT Kpefdescr as perifereia , sum(qty) as qty FROM zcl_mhtrooneww where Kpefdescr <> '' group by perifereia order by Kpefdescr asc";

        $results = DB::select($query);

        return $results;
    }

    public function getMainChart($year,$category,$xAxis,$district = null){
=======
use Auth;
use App\Role;
use App\User;

class Mitrwo extends Model {

    protected $table = 'zcl_mhtrooneww';

    protected $customerId,$regionId,$subregionId,$networkId,$storageId,$storageUnitId,$finalUnitId;

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

    public function test(){
        return Auth::user()->customer_id;
    }

    public function getCustomerId(){
        return Auth::user()->customer_id;
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

    public function getPerifereies($year = 2014,$clientId = 0){

        $query = "SELECT Kpefdescr as perifereia , sum(qty) as qty FROM zcl_mhtrooneww where Kpefdescr <> '' and ";
        $query .= $this->filterDownUser($year);
        $query .= " group by perifereia order by Kpefdescr asc"; 
        $results = DB::select($query);
        return $results;
    }

    public function getMainChart($year,$category,$xAxis){
>>>>>>> newGorilla


        $categories = ['ALL','Κατηγορία 1','Κατηγορία 2','Κατηγορία 3','Λάσπη','Φυτικά'];
        if($category>=0){ $chooseCategory = $categories[$category]; }else{die('no category selected');}

        $query = "select month(ftrdate) as month, year(ftrdate) as year, sum(qty) as posotita, descr as katigoria from zcl_mhtrooneww where ";

        if($chooseCategory<>'ALL')$query .="descr='".$chooseCategory."' and";
<<<<<<< HEAD
        
        if($year == 'last-12'){
            $query .=" ftrdate >= DATE_SUB(now(), INTERVAL 12 MONTH) ";
        }else if($year){
            $query .=" year(ftrdate) = ".$year;
        }

        if($district) $query .=" and  (Kpefdescr = '".$district."' or Ypefdescr = '".$district."') ";
        
        $query .=" group by month(ftrdate) ";
        
        if($year == 'last-12'){
            $query .="order by ftrdate asc";
        }
        $jsonOutput = Array();
        $results = DB::select($query);

        
=======
        $query .= $this->filterDownUser($year);

        $query .=" group by month(ftrdate) ";
        if($year == 'last-12'){
            $query .="order by ftrdate asc";
        }

        $jsonOutput = Array();
        $results = DB::select($query);


>>>>>>> newGorilla
        foreach($results as $obj ) {
            if(!empty($xAxis)){
                array_push($jsonOutput,date('M', mktime(0, 0, 0, $obj->month, 10))."<br>".$obj->year);
            }else{
                array_push($jsonOutput,floatval($obj->posotita/1000));
            }
        }

        return $jsonOutput;
    }

<<<<<<< HEAD
    //get all sum of qty given in year
    public function getTotalQty($year){
=======
    public function getTotalQty($year,$customerId = 0){
>>>>>>> newGorilla

        if($year == '')$year = '2014';

        $query = "select sum(qty) as posotita, descr as katigoria from zcl_mhtrooneww where ";
<<<<<<< HEAD
        if($year == 'last-12'){
            $query .= " ftrdate >= DATE_SUB(now(), INTERVAL 12 MONTH) "; 
        }else{    
            $query .=" year(ftrdate) = ".$year;
        }
=======

        $query .= $this->filterDownUser($year);
>>>>>>> newGorilla

        $results = DB::select($query);

        foreach($results as $obj){
            $jsonOutput = floatval($obj->posotita);
        }

        $retVal = number_format($jsonOutput/1000,2,",",".");

        return $retVal;

    }

<<<<<<< HEAD
    // get total producers per year
    public function getTotalProducers($year,$district = null){

        $query = "select count(distinct(pelatis)) as paragogoi  from zcl_mhtrooneww where ";

        if($year == 'last-12'){
            $query .= " ftrdate >= DATE_SUB(now(), INTERVAL 12 MONTH) "; 
        }else{    $query .=" year(ftrdate) = ".$year;}
        
        if($district) $query .=" and  (Kpefdescr = '".$district."' or Ypefdescr = '".$district."') ";
        
        $results = DB::select($query);

        $jsonOutput = Array();

=======
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
>>>>>>> newGorilla
        /* fetch object array */
        foreach($results as $obj){
            $jsonOutput = floatval($obj->paragogoi);
        }
<<<<<<< HEAD

        $retVal = number_format($jsonOutput,0,",",".");

        return $retVal;
    }

    //get quantity summary per year
    public function getCategoriesSum($year,$district = null){

        $query = "SELECT sum(qty) as sum,descr FROM `zcl_mhtrooneww` where ";
        if($year == 'last-12'){
            $query .=" ftrdate >= DATE_SUB(now(), INTERVAL 12 MONTH) ";
        }else if($year){
            $query .=" year(ftrdate) = ".$year;
        }
        if($district) $query .=" and  (Kpefdescr = '".$district."' or Ypefdescr = '".$district."') ";
        $query .=" group by descr order by descr asc";
        
        $results = DB::select($query);

        return  $results;

    }
    
    //
    public function getMainChartData($year,$district = null){

        $categories = ['ALL','category1','category2','category3','laspi','fytika'];
        $jsonOutput = array();
        $jsonOutput['xAxis'] = $this->getMainChart($year,0,1);
        foreach($categories as $key => $value){
            $jsonOutput[$value] = Mitrwo::getMainChart($year,$key,0,$district);
        }

        $jsonOutput['totalQTY']         = Mitrwo::getTotalQty($year,$district);
        $jsonOutput['totalProducers']   = Mitrwo::getTotalProducers($year,$district); 
        $jsonOutput['categoriesSUM']    = Mitrwo::getCategoriesSum($year,$district);
        $jsonOutput['temperature']      = Mitrwo::getTemperature($year,$district);
        $jsonOutput['material']         = Mitrwo::getMaterial($year,$district);
        $jsonOutput['confiscation']     = Mitrwo::getConfiscation($year,$district);
        $jsonOutput['packaging']        = Mitrwo::getPackaging($year,$district);
        
        
        return $jsonOutput;
    }
    
    //Temperature informations
    public function getTemperature($year,$district=null){

        $query = "SELECT sum(qty) as sum ,thermokrasia as type FROM `zcl_mhtrooneww` where thermokrasia <> '' ";

        if($year == '12-last'){

            $query .= ' and DATE_SUB(now(), INTERVAL 12 MONTH)';

        }else{

            $query .=" and year(ftrdate) = ".$year;

        }
        
        if($district) $query .=" and  (Kpefdescr = '".$district."' or Ypefdescr = '".$district."') ";

        $query .= ' group by thermokrasia';
        $results = DB::select($query);

=======
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
>>>>>>> newGorilla
        return $results;

    }

    public function getMaterial($year,$district=null){

<<<<<<< HEAD
        $query = "SELECT sum(qty) as sum ,eidos_ylikon as material FROM `zcl_mhtrooneww` where eidos_ylikon <> '' ";

        if($year == '12-last'){

            $query .= ' and DATE_SUB(now(), INTERVAL 12 MONTH)';

        }else{

            $query .=" and year(ftrdate) = ".$year;

        }
        
        if($district) $query .=" and  (Kpefdescr = '".$district."' or Ypefdescr = '".$district."') ";

        $query .= ' group by eidos_ylikon';
        $results = DB::select($query);

        return $results;

    }
    
    //synolo katashesis
    public function getConfiscation($year,$district=null){

        $query = "SELECT sum(qty) as sum ,katasxesi as type FROM `zcl_mhtrooneww` where katasxesi <> '' ";

        if($year == '12-last'){

            $query .= ' and DATE_SUB(now(), INTERVAL 12 MONTH)';

        }else{

            $query .=" and year(ftrdate) = ".$year;

        }
        
        if($district) $query .=" and  (Kpefdescr = '".$district."' or Ypefdescr = '".$district."') ";

        $query .= ' group by katasxesi';
        $results = DB::select($query);

        return $results;

    }
    
    //Packaging informations
    public function getPackaging($year,$district=null){

        $query = "SELECT (sum(qty)/1000) as sum ,syskeysia as type FROM `zcl_mhtrooneww` where syskeysia <> '' ";

        if($year == '12-last'){

            $query .= ' and DATE_SUB(now(), INTERVAL 12 MONTH)';

        }else{

            $query .=" and year(ftrdate) = ".$year;

        }
        
        if($district) $query .=" and  (Kpefdescr = '".$district."' or Ypefdescr = '".$district."') ";

        $query .= ' group by syskeysia';
        $results = DB::select($query);

        return $results;

    }
    
    
=======
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
        if($sum>0)
            array_push($jsonOutput,['name'=>'Λοιπά','y'=>floatval($this->formatNumber(($sum2/$sum)*100))]);
        else
            array_push($jsonOutput,['name'=>'Λοιπά','y'=>floatval(0)]);
            
        return $jsonOutput;
    }

    public function getConfiscation($year,$district=null){

        $arrayReturn = array();
        $query = "SELECT sum(qty) as sum ,katasxesi as type FROM `zcl_mhtrooneww` where katasxesi = 'Κατασχεμένα' ";
        $query .= " and ".$this->filterDownUser($year);
        $query .= ' group by katasxesi';
        $results = DB::select($query);
        if(count($results)==0){
            $emptyRow = new \stdClass();
            $emptyRow->sum = "0";
            $emptyRow->type = 'Κατασχεμένα';
            array_push($arrayReturn,$emptyRow);
        }else{
            array_push($arrayReturn,$results[0]);    
        }

        $query = "SELECT sum(qty) as sum ,katasxesi as type FROM `zcl_mhtrooneww` where katasxesi = 'Μη Κατασχεμένα' ";
        $query .= " and ".$this->filterDownUser($year);
        $query .= ' group by katasxesi';
        
        $results = DB::select($query);
        if(count($results)==0){
            $emptyRow = new \stdClass();
            $emptyRow->sum = "0";
            $emptyRow->type = 'Μη Κατασχεμένα';
            array_push($arrayReturn,$emptyRow);
        }else{
            array_push($arrayReturn,$results[0]);    
        }
        
        $sum = 0;
        foreach($arrayReturn as $row){$sum +=$row->sum;}
        
        $arrayReturn2 = array();
        foreach($arrayReturn as $row2){
            $emptyRow = new \stdClass();
            $emptyRow->sum = $row2->sum;
            $emptyRow->type = $row2->type;
            if($sum>0){
                $emptyRow->perc = number_format(($row2->sum*100/$sum),2,",",".");
                $emptyRow->percCss = number_format(($row2->sum*100/$sum),2,".",".");
            }else{
                $emptyRow->perc = 0;
                $emptyRow->percCss = 0;
            }
            array_push($arrayReturn2,$emptyRow);    
        }
        
        
        return $arrayReturn2;

    }

    public function getPackaging($year,$district=null){

//        $query = "SELECT (sum(qty)/1000) as sum ,syskeysia as type FROM `zcl_mhtrooneww` where syskeysia <> '' ";
//        $query .= " and ".$this->filterDownUser($year);
//        $query .= ' group by syskeysia';
//        $results = DB::select($query);
//        if(count($results)<2){
//            $emptyRow = new \stdClass();
//            $emptyRow->sum = "0";
//            $emptyRow->type = 'No Data';
//            $results = array_pad($results, 2, $emptyRow);
//        }
//        return $results;
        
                $arrayReturn = array();
        $query = "SELECT sum(qty) as sum ,syskeysia as type FROM `zcl_mhtrooneww` where syskeysia = 'Συσκευασμένα' ";
        $query .= " and ".$this->filterDownUser($year);
        $query .= ' group by syskeysia';
        $results = DB::select($query);
        if(count($results)==0){
            $emptyRow = new \stdClass();
            $emptyRow->sum = "0";
            $emptyRow->type = 'Συσκευασμένα';
            array_push($arrayReturn,$emptyRow);
        }else{
            array_push($arrayReturn,$results[0]);    
        }

        $query = "SELECT sum(qty) as sum ,syskeysia as type FROM `zcl_mhtrooneww` where syskeysia = 'Μη Συσκευασμένα' ";
        $query .= " and ".$this->filterDownUser($year);
        $query .= ' group by syskeysia';
        
        $results = DB::select($query);
        if(count($results)==0){
            $emptyRow = new \stdClass();
            $emptyRow->sum = "0";
            $emptyRow->type = 'Μη Συσκευασμένα';
            array_push($arrayReturn,$emptyRow);
        }else{
            array_push($arrayReturn,$results[0]);    
        }
        
        $sum = 0;
        foreach($arrayReturn as $row){$sum +=$row->sum;}
        
        $arrayReturn2 = array();
        foreach($arrayReturn as $row2){
            $emptyRow = new \stdClass();
            $emptyRow->sum = $row2->sum;
            $emptyRow->type = $row2->type;
            if($sum>0){
                $emptyRow->perc = number_format(($row2->sum*100/$sum),2,",",".");
                $emptyRow->percCss = number_format(($row2->sum*100/$sum),2,".",".");
            }else{
                $emptyRow->perc = 0;
                $emptyRow->percCss = 0;
            }
            array_push($arrayReturn2,$emptyRow);    
        }
        
        
        return $arrayReturn2;

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

    public function getFinalUnit($year){

        $query = "SELECT sum(qty2) as sum, monada as finalUnit FROM `zcl_mhtrooneww` ";
        $query .= " where monada <> '' and ".$this->filterDownUser($year);
        $query .= ' group by finalUnit';
        $results = DB::select($query);
        $sum = 0;
        foreach($results as $row){
            $sum += $row->sum;
        }
        $emptyRow = new \stdClass();
        $emptyRow->count = count($results);
        $emptyRow->sum = $this->formatNumber($sum/1000);
        return $emptyRow;

    }

    public function getProcMethod($year){

        $query = "SELECT sum(qty2) as sum, monada as finalUnit FROM `zcl_mhtrooneww` ";
        $query .= " where monada <> '' and ".$this->filterDownUser($year);
        $query .= ' group by finalUnit';
        $results = DB::select($query);

    }

    public function getMainChartData($year,$district = null,$customerId = 0){


        $categories = ['ALL','category1','category2','category3','laspi','fytika'];
        $jsonOutput = array();
        $jsonOutput['xAxis'] = $this->getMainChart($year,0,1);
        foreach($categories as $key => $value){
            $jsonOutput[$value] = Mitrwo::getMainChart($year,$key,0,$district,$customerId);
        }

        $jsonOutput['totalQTY']         = Mitrwo::getTotalQty($year,$district);
        $jsonOutput['categoriesSUM']    = Mitrwo::getCategoriesSum($year,$district);
        $jsonOutput['totalProducers']   = Mitrwo::getTotalProducers($year,$district); 
        $jsonOutput['totalDromologia']   = Mitrwo::getTotaDromologia($year,$district); 
        $jsonOutput['totalMonades']     = Mitrwo::getTotaMonades($year,$district);
        //$jsonOutput['totalForthga']     = Mitrwo::getTotaTrucks($year,$district);
        $jsonOutput['totalForthga'] = '-';
        $jsonOutput['temperature']      = Mitrwo::getTemperature($year,$district);
        $jsonOutput['material']         = Mitrwo::getMaterial($year,$district);
        $jsonOutput['confiscation']     = Mitrwo::getConfiscation($year,$district);
        $jsonOutput['packaging']        = Mitrwo::getPackaging($year,$district);
        $jsonOutput['mex'] = Mitrwo::getMex($year);
        $jsonOutput['finalUnit'] = Mitrwo::getFinalUnit($year);



        return $jsonOutput;
    }

>>>>>>> newGorilla

}




