<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
USE App\Mitrwo;
<<<<<<< HEAD
=======
USE App\Fortio;
>>>>>>> newGorilla

class GetdataController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */

<<<<<<< HEAD
    public $_mitrwo;
=======
    public $_mitrwo,$_fortio;
>>>>>>> newGorilla

    /**
 * Create a new controller instance.
 *
 * @return void
 */
<<<<<<< HEAD
    public function __construct(Mitrwo $mitrwo)
    {
        parent::__construct();
        $this->_mitrwo = $mitrwo;
=======
    public function __construct(Mitrwo $mitrwo,Fortio $fortio)
    {
        parent::__construct();
        $this->_mitrwo = $mitrwo;
        $this->_fortio = $fortio;
>>>>>>> newGorilla
    }

    public function index()
    {
        //

        return \Response::json($this->_mitrwo->getMainChart(0,'2015',0));

    }
<<<<<<< HEAD
=======
    
    public function getDataNew(){
        
        //return "none";
        return \Response::json($this->_fortio->getFortia());
        
    }
>>>>>>> newGorilla

    public function queries($category = 0,$year = null,$xAxis = 0)
    {
        //
        return \Response::json($this->_mitrwo->getMainChart($category,$year,$xAxis));

    }

    public function mainChart($year,$category = 0,$xAxis = 0)
    {

        return \Response::json($this->_mitrwo->getMainChart($year,$category,$xAxis));

    }

    public function mainChartData($year,$filters = null)
    {

        return \Response::json($this->_mitrwo->getMainChartData($year,$filters));

    }

    public function categoriesSum($year){

        return \Response::json($this->_mitrwo->getCategoriesSum($year));
    }

}
