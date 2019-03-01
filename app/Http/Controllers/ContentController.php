<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ContentController extends Controller
{


    public function apointment(){
        return view('contentPages.apointmentForm')->with('breadCrumbText','Κλείστε Ραντεβού')->with('breadCrumbIcon','gicon-menu-dashboard')->with('chosenYear',0);
    }
    
    public function legal(){
        return view('contentPages.legal')->with('breadCrumbText','Νομοθεσία')->with('breadCrumbIcon','gicon-menu-dashboard')->with('chosenYear',0);
    }
    
    public function faq(){
        return view('contentPages.faq')->with('breadCrumbText','')->with('breadCrumbIcon','')->with('chosenYear',0);
    }

    
}
