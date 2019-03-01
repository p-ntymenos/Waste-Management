<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\MonadesModel;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Route;

class MonadesController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //$availableYears = $this->_routesModel->getAvailableYears();
        $year = Input::get('year',2014);
        
        $monades = MonadesModel::paginate(2);
        
        return view('monades.index')
            ->with('breadCrumbText','Μονάδες Επεξεργασίας & ΜΕΧ')
            ->with('breadCrumbIcon','gicon-plants-processing-facility')
            ->with('rows',$monades);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('monades.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $Monada = new MonadesModel();
        $Monada->create(Input::all());
        return redirect('/monades');
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $monada = MonadesModel::find($id);
        return view('monades.update')->with('monada',$monada);
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
        
        $Monada = MonadesModel::find($id);
        $Monada->update(Input::all());
        return redirect('/monades');
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
