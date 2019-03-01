<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\ReportsModel;
use App\AjaxMitrwo;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Route;

class ReportsController extends Controller
{

    private $_reportsModel;
    private $_user;
    private $_mitrwo;

    public function __construct(ReportsModel $repModel,AjaxMitrwo $mitwo){
        parent::__construct();
        $this->_reportsModel = $repModel;
        $this->_mitrwo = $mitwo;
        $this->middleware('auth');
        $this->_user = Auth::user();
    }
    
    
     public function my_mb_ucfirst($str) {
        $str = mb_strtolower($str);
        $fc = mb_strtoupper(mb_substr($str, 0, 1));
        $returnString = $fc.mb_substr($str, 1);
        $returnString = str_replace('σ','ς',$returnString);
        return $returnString;
    }
    

    public function index(){
        //
        //print_r(Input::All());exit;
        $year = Input::get('year',2014);
        $availableYears = $this->_reportsModel->getAvailableYears();
        $regionsData = $this->_reportsModel->getPerifereies($year);
        $arrayData = $this->_reportsModel->getMainChartData($year);
        $regionMapCode = $this->_reportsModel->getMapRegionCode();
        
        $regionsList = $this->_mitrwo->getAllRegions();
        $subregionsList = $this->_mitrwo->getAllSubRegions();
        $municipalitiesList = $this->_mitrwo->getAllMunicipalities();
        
        $clientsList = $this->_mitrwo->getAllClients();
        $networkList = $this->_mitrwo->getAllNetworks(0);
        
        return view('reports.index')
            ->with('arrayData',$arrayData)
            ->with('regionsData',$regionsData)
            ->with('breadCrumbText','ΖΥΠ Reports / Κατηγορία')
            ->with('breadCrumbIcon','gicon-menu-abp-reports')
            ->with('availableYears',$availableYears)
            ->with('selectedYear',$year)
            ->with('regionMapCode',$regionMapCode)
            ->with('regionsList',$regionsList)
            ->with('subregionsList',$subregionsList)
            ->with('municipalitiesList',$municipalitiesList)
            ->with('clientsList',$clientsList)
            ->with('networkList',$networkList);
        
         

        
        


    }

    public function regions($id){
        //
        
        if($id>0)$this->_reportsModel->regionId = $id;
        
        $year = Input::get('year',2014);
        $parentPerif = $this->_reportsModel->getParentPeriferia($id);
        $availableYears = $this->_reportsModel->getAvailableYears();
        $regionsData = $this->_reportsModel->getPerifereies($year);
        $arrayData = $this->_reportsModel->getMainChartData($year);
        $regionMapCode = $this->_reportsModel->getMapRegionCode();
        return view('regions.Regions')
            ->with('arrayData',$arrayData)
            ->with('regionsData',$regionsData)
            ->with('breadCrumbText','Περιφέρειες > '.$parentPerif[0]->Kpefdescr)
            ->with('breadCrumbIcon','gicon-menu-regions')
            ->with('chosenYear',$year)
            ->with('availableYears',$availableYears)
            ->with('rId',$id)
            ->with('regionMapCode',$regionMapCode);

    }

    public function subregions($id = 0){
        //
        $year = Input::get('year',2014);

        if($id>0)$this->_reportsModel->regionId = $id;


        $parentPerif = $this->_reportsModel->getParentPeriferia($id);
        $availableYears = $this->_reportsModel->getAvailableYears();
        $regionsData = $this->_reportsModel->getPerifereies($year);
        $arrayData = $this->_reportsModel->getMainChartData($year);
        $regionMapCode = $this->_reportsModel->getMapRegionCode();
        return view('regions.subregions')
            ->with('arrayData',$arrayData)
            ->with('regionsData',$regionsData)
            ->with('breadCrumbText','Περιφέρειες > '.$parentPerif[0]->Kpefdescr." ")//> Περιφεριακές ενότητες
            ->with('breadCrumbIcon','gicon-menu-regions')
            ->with('chosenYear',$year)
            ->with('availableYears',$availableYears)
            ->with('regionMapCode',$regionMapCode)
            ->with('rId',$id)
            ->with('periferiaName',$parentPerif[0]->Kpefdescr);

    }

    public function municipalities($id = 0){
        //
        $year = Input::get('year',2014);

        if($id>0)$this->_reportsModel->municipalityId = $id;

        //$parentPerif = $this->_reportsModel->getParentPeriferia($id);
        $parentPen = $this->_reportsModel->getParentPerEnotita($id);

        $availableYears = $this->_reportsModel->getAvailableYears();
        $regionsData = $this->_reportsModel->getPerifereies($year);
        $arrayData = $this->_reportsModel->getMainChartData($year);
        $regionMapCode = $this->_reportsModel->getMapRegionCode();
        return view('regions.municipality')
            ->with('arrayData',$arrayData)
            ->with('regionsData',$regionsData)
            //->with('breadCrumbText','Περιφέρειες > '.$parentPen[0]->Kpefdescr." > ".$this->my_mb_ucfirst($parentPen[0]->Kpendescr) )
            ->with('breadCrumbIcon','gicon-menu-regions')
            ->with('chosenYear',$year)
            ->with('availableYears',$availableYears)
            ->with('regionMapCode',$regionMapCode)
            ->with('rId',$id);

    }

    public function getRegions($year){
        $id = Input::get('id',0);
        if($id>0)$this->_reportsModel->regionId = $id;
        return $this->_reportsModel->getPerifereies($year);
    }

    public function getSubRegions($year){
        $id = Input::get('id',0);
        if($id>0)$this->_reportsModel->regionId = $id;

        return $this->_reportsModel->getSubRegions($year);
    }

    public function getMunicipalities($year){
        $id = Input::get('id',0);
        $perrId = Input::get('perrId',0);
        
        //if($id>0)$this->_reportsModel->regionId = $id;
        if($perrId>0)$this->_reportsModel->subregionId = $perrId;
        
        
        return $this->_reportsModel->getMunicipalities($year);
    }

    public function exportExcel($year = 2014){

        $data = $this->_reportsModel->getPerifereies($year);
        fputcsv($out, array_keys($data[1]));
        $out = fopen('php://output', 'w');
        foreach($data as $line)
        {
            fputcsv($out, $line);
        }
        fclose($out);


    }
}
