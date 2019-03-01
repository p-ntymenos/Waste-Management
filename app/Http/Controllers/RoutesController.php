<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\RoutesModel;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Route;
class RoutesController extends Controller
{

    private $_routesModel;
    private $_user;

    public function __construct(RoutesModel $routesModel){
        parent::__construct();
        $this->_routesModel = $routesModel;
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
        $year = Input::get('year',2014);
        $availableYears = $this->_routesModel->getAvailableYears();
        $regionsData = $this->_routesModel->getPerifereies($year);
        $arrayData = $this->_routesModel->getMainChartData($year);
        $regionMapCode = $this->_routesModel->getMapRegionCode();
        return view('routes.index')
            ->with('arrayData',$arrayData)
            ->with('regionsData',$regionsData)
            ->with('breadCrumbText','Δρομολόγια')
            ->with('breadCrumbIcon','gicon-menu-routes')
            ->with('chosenYear',$year)
            ->with('availableYears',$availableYears)
            ->with('regionMapCode',$regionMapCode);
    }

    public function getRoutes($year){

        return $this->_routesModel->getAllRoutesDetails($year);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $year = Input::get('year',2014);
        $availableYears = $this->_routesModel->getAvailableYears();
        $regionsData = $this->_routesModel->getPerifereies($year);
        $arrayData = $this->_routesModel->getMainChartData($year);
        $regionMapCode = $this->_routesModel->getMapRegionCode();
        return view('routes.show')
            ->with('arrayData',$arrayData)
            ->with('regionsData',$regionsData)
            ->with('breadCrumbText','Δρομολόγια / Δρομολόγιο '.$id)
            ->with('breadCrumbIcon','gicon-menu-routes')
            ->with('chosenYear',$year)
            ->with('availableYears',$availableYears)
            ->with('regionMapCode',$regionMapCode);
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
        //
    }
}
