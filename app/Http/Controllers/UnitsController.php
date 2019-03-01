<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\UnitsModel;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Route;

class UnitsController extends Controller
{

    private $_UnitsModel;
    private $_user;

    public function __construct(UnitsModel $UnitsModel){
        parent::__construct();
        $this->_UnitsModel = $UnitsModel;
        $this->middleware('auth');
        $this->_user = Auth::user();
     
     
    }
    

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $year = Input::get('year',2014);
        $availableYears = $this->_UnitsModel->getAvailableYears();
        $arrayData = $this->_UnitsModel->getMainChartData($year);
        return view('units.units')
            ->with('arrayData',$arrayData)
            ->with('breadCrumbText','Μονάδες')
            ->with('breadCrumbIcon','gicon-plants-processing-facility')
            ->with('chosenYear',$year)
            ->with('availableYears',$availableYears);
    }

    public function getUnits($year){
        return $this->_UnitsModel->getUnits($year);
        
    }
    
}
