<<<<<<< HEAD
<?php namespace App\Http\Controllers;
=======
<?php 

namespace App\Http\Controllers;
>>>>>>> newGorilla

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
<<<<<<< HEAD
USE App\Mitrwo;
use Illuminate\Support\Facades\Input;
=======
use App\Mitrwo;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Route;
use Auth;
>>>>>>> newGorilla

class DashboardController extends Controller {

    //mitrwo model object
<<<<<<< HEAD
    public $_mitrwo;
	
    public function __construct(Mitrwo $mitrwo){
        parent::__construct();
        $this->_mitrwo = $mitrwo;
    }
    
=======
    private $_mitrwo;
    private $_user;

    public function __construct(Mitrwo $mitrwo){
        parent::__construct();
        $this->_mitrwo = $mitrwo;
        $this->middleware('auth');
        $this->_user = Auth::user();
    }

>>>>>>> newGorilla
    /**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
<<<<<<< HEAD
	public function index()
	{
=======
    public function index(){

        //get user scope 
        if(Auth::user()->customer_id>0)$clientId = Auth::user()->customer_id;
        else $clientId = null;
        
>>>>>>> newGorilla
        $year = Input::get('year',2014);
        $district = Input::get('district',null);

        if($district == 'all') $district = '';
<<<<<<< HEAD
        
        //$perifereies = $this->_mitrwo->getPerifereies();
        $totalQty = $this->_mitrwo->getTotalQty($year,$district);
        $totalprd = $this->_mitrwo->getTotalProducers($year,$district);
        $mainChartData = $this->_mitrwo->getMainChartData($year,$district);
        //return $perifereies;
        return view('Dashboard')->with('chosenDistrict',$district)
                                ->with('chosenYear',$year)
                                //->with('perifereies',$perifereies)
                                ->with('totalprd',$totalprd)
                                ->with('arrayData',$mainChartData)
                                ->with('totalQty',$totalQty[1]);
	}

	public function getDistrict($year,$district)
	{
=======

        $selPeriferia = "";
        //Convert routes into sections labels
        switch (Route::getCurrentRoute()->getPath()) {
            case '/':
                $selectedSectionLabel = 'Πίνακας Ελέγχου';
                break;
            case 'users':
                $selectedSectionLabel = 'Διαχείριση Χρηστών';
                break;
            case 'regions':
                $selectedSectionLabel = 'Περιφέρειες';
                if($district){
                    $selPeriferia = $this->_mitrwo->getPeriferiaName($district);
                    $selPeriferia = $selPeriferia[0]->DESCR;
                }else{
                    $selPeriferia = "Όλες";
                }
                break;
            default:
                $selectedSectionLabel = 'Πίνακας Ελέγχου';
        }
        $selectedSectionLink = Route::getCurrentRoute()->getPath();

        //$perifereies = $this->_mitrwo->getPerifereies();
        $totalQty = $this->_mitrwo->getTotalQty($year,$district,$clientId);
        $totalprd = $this->_mitrwo->getTotalProducers($year,$district,$clientId);
        $mainChartData = $this->_mitrwo->getMainChartData($year,$district,$clientId);
        $regionsSums = $this->_mitrwo->getPerifereies($year);
        $availableYears = $this->_mitrwo->getAvailableYears();
        $breadCrumbText = "Πίνακας Ελέγχου";

        
        
        return view('Dashboard')->with('chosenDistrict',$district)
            ->with('chosenYear',$year)
            ->with('perifereies',$regionsSums)
            ->with('totalprd',$totalprd)
            ->with('arrayData',$mainChartData)
            ->with('totalQty',$totalQty[1])
            ->with('sectionLabel',$selectedSectionLabel)
            ->with('sectionLink',$selectedSectionLink)
            ->with('selectedPerifereia',$selPeriferia)
            ->with('breadCrumbText',$breadCrumbText)
            ->with('breadCrumbIcon','gicon-menu-dashboard')
            ->with('availableYears',$availableYears)
            ->with('user',$this->_user);
    }

    public function getDistrict($year,$district){
>>>>>>> newGorilla
        $perifereies = $this->_mitrwo->getPerifereies();
        $totalQty = $this->_mitrwo->getTotalQty($year);
        $totalprd = $this->_mitrwo->getTotalProducers($year);
        $mainChartData = $this->_mitrwo->getMainChartData($year,$district);
        //return $perifereies;
        return view('Dashboard')->with('chosenYear',$year)
<<<<<<< HEAD
                                ->with('perifereies',$perifereies)
                                ->with('totalprd',$totalprd)
                                ->with('arrayData',$mainChartData)
                                ->with('totalQty',$totalQty[1]);
	}

	
=======
            ->with('perifereies',$perifereies)
            ->with('totalprd',$totalprd)
            ->with('arrayData',$mainChartData)
            ->with('totalQty',$totalQty[1]);
    }

    public function test(){
        
        return $this->_mitrwo->getMainChartData('last-12',0,1);
            
    }    
>>>>>>> newGorilla

}
