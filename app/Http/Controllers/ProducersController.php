<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\ProducersModel;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Route;

class ProducersController extends Controller
{
    private $_mitrwo;
    private $_user;

    public function __construct(ProducersModel $producersModel){
        parent::__construct();
        $this->_producersModel = $producersModel;
        $this->middleware('auth');
        $this->_user = Auth::user();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){

        $year = Input::get('year',2014);
        $availableYears = $this->_producersModel->getAvailableYears();
        $arrayData = $this->_producersModel->getMainChartData($year);
        $pieData = $this->_producersModel->getMainChart($year);
        return view('producers.producers')
            ->with('arrayData',$arrayData)
            ->with('pieData',$pieData)
            ->with('breadCrumbText','Παραγωγοί')
            ->with('breadCrumbIcon','gicon-menu-producers')
            ->with('chosenYear',$year)
            ->with('availableYears',$availableYears);
    }

    public function array_to_csv_download($array, $filename = "export.csv", $delimiter=";") {

        //        header('Content-Type: application/octet-stream');
        //        header('Content-type: text/csv; charset=UTF-8');
        //        header("Content-Disposition: attachment;filename=\"$filename\"" );
        //        header('Content-Transfer-Encoding: binary');
        //        header('Cache-Control: must-revalidate');
        //        header('Expires: 0');

        header('Content-Encoding: ISO-8859-7');
        header('Content-Type: text/csv; charset=utf-8' );
        header(sprintf( 'Content-Disposition: attachment; filename=my-csv-%s.csv', date( 'dmY-His' ) ) );
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Pragma: public');

        $fp = fopen('php://output', 'w');

        
        
        fputcsv($fp, array(iconv("UTF-8", "ISO-8859-7",'Πελάτης'),iconv("UTF-8", "ISO-8859-7",'Ποσότητα')), ';', '"');

        foreach ($array as $fields) 
        {

            //fputcsv($fp, get_object_vars($fields), ';', '"');
            fputcsv($fp, array(iconv("UTF-8", "ISO-8859-7",$fields->customer),$fields->sum), ';', '"');

        }

        fclose($fp);
        exit();

    }

    public function getMainChart($year){
        
        return $this->_producersModel->getMainChart($year);
    }

    public function getMainTable($year){
        //$year = Input::get('year',2014);
        
        return $this->_producersModel->getMainTable($year);
    }

    public function exportMainTable(){

        $year = Input::get('year',2014);
        $array =  $this->_producersModel->getMainTable($year);
        return $this->array_to_csv_download($array);


    }
}
