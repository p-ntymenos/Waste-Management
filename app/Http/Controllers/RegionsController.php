<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\RegionsModel;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Route;


class RegionsController extends Controller
{
    private $_regionsModel;
    private $_user;

    public function __construct(RegionsModel $regionsModel){
        parent::__construct();
        $this->_regionsModel = $regionsModel;
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
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        //
        $year = Input::get('year',2014);
        $availableYears = $this->_regionsModel->getAvailableYears();
        $regionsData = $this->_regionsModel->getPerifereies($year);
        $arrayData = $this->_regionsModel->getMainChartData($year);
        $regionMapCode = $this->_regionsModel->getMapRegionCode();
        return view('regions.index')
            ->with('arrayData',$arrayData)
            ->with('regionsData',$regionsData)
            ->with('breadCrumbText','Περιφέρειες')
            ->with('breadCrumbIcon','gicon-menu-regions')
            ->with('chosenYear',$year)
            ->with('availableYears',$availableYears)
            ->with('regionMapCode',$regionMapCode);

    }

    public function regions($id){
        //
        
        if($id>0)$this->_regionsModel->regionId = $id;
        
        $year = Input::get('year',2014);
        $parentPerif = $this->_regionsModel->getParentPeriferia($id);
        $availableYears = $this->_regionsModel->getAvailableYears();
        $regionsData = $this->_regionsModel->getPerifereies($year);
        $arrayData = $this->_regionsModel->getMainChartData($year);
        $regionMapCode = $this->_regionsModel->getMapRegionCode();
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

        if($id>0)$this->_regionsModel->regionId = $id;


        $parentPerif = $this->_regionsModel->getParentPeriferia($id);
        $availableYears = $this->_regionsModel->getAvailableYears();
        $regionsData = $this->_regionsModel->getPerifereies($year);
        $arrayData = $this->_regionsModel->getMainChartData($year);
        $regionMapCode = $this->_regionsModel->getMapRegionCode();
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

        if($id>0)$this->_regionsModel->municipalityId = $id;

        //$parentPerif = $this->_regionsModel->getParentPeriferia($id);
        $parentPen = $this->_regionsModel->getParentPerEnotita($id);

        $availableYears = $this->_regionsModel->getAvailableYears();
        $regionsData = $this->_regionsModel->getPerifereies($year);
        $arrayData = $this->_regionsModel->getMainChartData($year);
        $regionMapCode = $this->_regionsModel->getMapRegionCode();
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
        if($id>0)$this->_regionsModel->regionId = $id;
        return $this->_regionsModel->getPerifereies($year);
    }

    public function getSubRegions($year){
        $id = Input::get('id',0);
        if($id>0)$this->_regionsModel->regionId = $id;

        return $this->_regionsModel->getSubRegions($year);
    }

    public function getMunicipalities($year){
        $id = Input::get('id',0);
        $perrId = Input::get('perrId',0);
        
        //if($id>0)$this->_regionsModel->regionId = $id;
        if($perrId>0)$this->_regionsModel->subregionId = $perrId;
        
        
        return $this->_regionsModel->getMunicipalities($year);
    }

    public function exportExcel($year = 2014){

        $data = $this->_regionsModel->getPerifereies($year);
        fputcsv($out, array_keys($data[1]));
        $out = fopen('php://output', 'w');
        foreach($data as $line)
        {
            fputcsv($out, $line);
        }
        fclose($out);


    }
}
