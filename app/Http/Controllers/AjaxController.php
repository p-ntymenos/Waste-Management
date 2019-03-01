<?php

namespace App\Http\Controllers;

use App\AjaxMitrwo;
use App\Mitrwo;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class AjaxController extends Controller
{
    public $mitrwo;

    public function __construct(AjaxMitrwo $mitrwo){
        parent::__construct();
        $this->mitrwo = $mitrwo;
    }

<<<<<<< HEAD
=======
    public function getClientsList(){


        return $this->mitrwo->getAllClients();
    }

>>>>>>> newGorilla
    /**
     * Display a listing of periferies
     * .
     *
     * @return \Illuminate\Http\Response
     */
<<<<<<< HEAD
    public function getPeriferiesTab()
    {

        $perifereies = $this->mitrwo->getPeriferies();
=======

    public function getRegions($year = 2014){
        $res = $this->mitrwo->getRegions($year,0);
        foreach($res as $item){
            $item->qty = number_format( ($item->qty/1000) , 2 , "," , "." );
        }
        return $res;
    }

    public function getSubRegions($year = 2014){
        $res = $this->mitrwo->getSubRegions($year,0);
        foreach($res as $item){
            $item->qty = number_format( ($item->qty/1000) , 2 , "," , "." );
        }
        return $res;
    }

    public function getMunicipalities($year = 2014){
        $res = $this->mitrwo->getMunicipalities($year,0);
        foreach($res as $item){
            $item->qty = number_format( ($item->qty/1000) , 2 , "," , "." );
        }
        return $res;
    }

    public function getProducers($year = 2014){
        return $res = $this->mitrwo->getProducers($year,0);
        foreach($res as $item){
            $item->qty = number_format( ($item->qty/1000) , 2 , "," , "." );
        }
        return $res;
    }

    public function getProducersActivity($year = 2014){

        return $res = $this->mitrwo->getProducersActivity($year,0);
        foreach($res as $item){
            $item->qty = number_format( ($item->qty/1000) , 2 , "," , "." );
        }
        return $res;
    }


    public function getAllNetworks($id = null){
        return $this->mitrwo->getAllNetworks($id);
    }

    public function getAllSubRegions($id = null){
        return $this->mitrwo->getAllSubRegions($id);
    }

    public function getAllMunicipalities($id = null){
        return $this->mitrwo->getAllMunicipalities($id);
    }




    public function getPeriferiesTab(){

        $perifereies = $this->mitrwo->getPeriferies();

>>>>>>> newGorilla
        $posotites = [];
        $total = [];
        foreach($perifereies as $perifereia) {
            $categories = $this->mitrwo->getWeightByPeriferia($perifereia->Kpefdescr);
            foreach($categories as $category) {
                $posotites[$perifereia->Kpefdescr][$category->descr] = $category->qty;
                if (isset($total[$perifereia->Kpefdescr])) {
                    $total[$perifereia->Kpefdescr] += $category->qty;
                } else {
                    $total[$perifereia->Kpefdescr] = $category->qty;
                }
            }
        }

        $categories = $this->mitrwo->getCategories();
<<<<<<< HEAD

        return view('tabs.periferies')->with('perifereies',$perifereies)
                                      ->with('posotites',$posotites)
                                      ->with('total',$total)
                                      ->with('categories',$categories);
=======
        return view('tabs.periferies')->with('perifereies',$perifereies)
            ->with('posotites',$posotites)
            ->with('total',$total)
            ->with('categories',$categories);
>>>>>>> newGorilla
    }

    /**
     * Display a listing of periferiakes enotites
     *
     * @return \Illuminate\Http\Response
     */
    public function getPeriferiakesEnotTab()
    {
<<<<<<< HEAD
        $perifEnotites = $this->mitrwo->getPeriferiakesEnotites('Θεσσαλίας');
=======
        $periferia = Input::get('district','');



        $perifEnotites = $this->mitrwo->getPeriferiakesEnotites($periferia);
>>>>>>> newGorilla

        return view('tabs.perifEnotites')->with('perifEnotites',$perifEnotites);
    }

    /**
     * Display a listing of dimoi
     *
     * @return \Illuminate\Http\Response
     */
    public function getDimoi()
    {
        $dimoi = $this->mitrwo->getDimoi('Αττικής');

        return view('tabs.dimoi')->with('dimoi',$dimoi);
    }

    /**
     * Display a listing of drastiriotites
     *
     * @return \Illuminate\Http\Response
     */
    public function getDrastiriotites()
    {
        $drastiriotites = $this->mitrwo->getDrastiriotites();

        return view('tabs.drastiriotites')->with('drastiriotites',$drastiriotites);
    }

}
