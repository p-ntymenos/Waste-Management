@extends('app')

@section('content')

<?php
<<<<<<< HEAD

$selectYear = ['2014'=>2014,'2015'=>2015,'last-12'=>'Τελευταίοι 12 Μήνες']
?>

<!-- Left Side -->
<div id="rightSideHeight" class="col-lg-10 col-md-9 col-sm-8 col-xs-12">
    <div class="row">
        <div id="breadcrumb-select" class="col-md-12 col-lg-12">  
            <div id="breadcrumb" class="pull-left">
                <span>Πίνακας Ελέγχου</span>
                <span> > </span>
                <span><a href="#"><?php echo $chosenDistrict;?></a></span>
            </div>
            <div class="dropdown pull-right">
                <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                    <?php echo $selectYear[$chosenYear];?><span class="caret"></span>
                </button>
                <ul class="dropdown-menu" id="filterPeriodos" aria-labelledby="dropdownMenu1">
                    <li><a data-val="last-12" href="{{ url('/dashboard/year/last-12') }}">Τελευταίοι 12 Μήνες</a></li>
                    <li><a data-val="2015" href="{{ url('/dashboard?year=2015') }}">2015</a></li>
                    <li><a data-val="2014" href="{{ url('/dashboard?year=2014') }}">2014</a></li>
                </ul>
            </div>


        </div>
    </div>

    

    <div class="row">

        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12" style="padding-bottom:100px;">
            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:a="http://ns.adobe.com/AdobeSVGViewerExtensions/3.0/" x="0px" y="0px" width="40px" height="40px" xml:space="preserve" style="float: left;width: 35px;height: 35px;"><g class="shape" style="-webkit-transform: matrix(0.85714285714286, 0, 0, 0.85714285714286, 0, 0);-moz-transform: matrix(0.85714285714286, 0, 0, 0.85714285714286, 0, 0);transform: matrix(0.85714285714286, 0, 0, 0.85714285714286, 0, 0);"><defs></defs><rect fill="#a83333" display="none" width="28" height="28"></rect><rect fill="#a83333" id="_x3C_Slice_x3E__126_" display="none" width="28" height="28"></rect><path fill="#a83333" fill-rule="evenodd" clip-rule="evenodd" d="M0,10l2,13c0,0.437,0.565,1,1,1h22c0.437,0,1-0.563,1-1l2-13H0z M26,7 c0-0.435-0.563-1-1-1H15l-0.5-2c-0.07-0.429-0.562-1-1-1h-7c-0.435,0-0.93,0.571-1,1L5,6H3C2.565,6,2,6.565,2,7v1h24V7z"></path></g></svg>
            <p class="blockTitle">Ποσότητες ΖΥΠ ανά Περιγραφή Υλικού</p>
            <div id="mainBlock" class="row noPadding">

                <div id="mainchart"  class="col-lg-8 col-md-12 col-sm-12 col-xs-12"></div>
                <div id="rightWidget" class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                    <p style="font-size: 16px;" ><span style="color: rgb(197, 62, 62); font-weight: bold;">Σύνολο Ποσότητων ΖΥΠ</span></p>
                    <p style="font-size: 32px;" ><span style="font-weight: bold;"><span id="mTotalQTY"><?=$arrayData['totalQTY']?></span></span></p>
                    <p style="font-size: 16px;" ><span style="color: rgb(163, 163, 163);">Σύνολο Παραγωγών ΖΥΠ</span></p>
                    <p style="font-size: 32px;" ><span style="font-weight: bold;" id="mTotalProducers"><?=$arrayData['totalProducers']?></span></p>
                    <hr> 
                    
                    <?php if(!empty($arrayData['categoriesSUM'][0])):?>
                    <p id="mSumKat1"><span class="labelC"><?=$arrayData['categoriesSUM'][0]->descr;?></span><span class="resultC"><?=number_format($arrayData['categoriesSUM'][0]->sum/1000,2,",",".");?> tn</span></p>
                    <?php endif;?>
                    <?php if(!empty($arrayData['categoriesSUM'][1])):?>
                    <p id="mSumKat2"><span class="labelC"><?=$arrayData['categoriesSUM'][1]->descr;?></span><span class="resultC"><?=number_format($arrayData['categoriesSUM'][1]->sum/1000,2,",",".");?> tn</span></p>
                    <?php endif;?>
                    <?php if(!empty($arrayData['categoriesSUM'][2])):?>
                    <p id="mSumKat3"><span class="labelC"><?=$arrayData['categoriesSUM'][2]->descr;?></span><span class="resultC"><?=number_format($arrayData['categoriesSUM'][2]->sum/1000,2,",",".");?> tn</span></p>
                    <?php endif;?>
                    <?php if(!empty($arrayData['categoriesSUM'][3])):?>
                    <p id="mSumKat4"><span class="labelC"><?=$arrayData['categoriesSUM'][3]->descr;?></span><span class="resultC"><?=number_format($arrayData['categoriesSUM'][3]->sum/1000,2,",",".");?> tn</span></p>
                    <?php endif;?>
                    <?php if(!empty($arrayData['categoriesSUM'][4])):?>
                    <p id="mSumKat5"><span class="labelC"><?=$arrayData['categoriesSUM'][4]->descr;?></span><span class="resultC"><?=number_format($arrayData['categoriesSUM'][4]->sum/1000,2,",",".");?> tn</span></p>
                    <?php endif;?>
                    
                </div>    
            </div>


            <div class="row mt50">

                <div id="thermokrasia-paralavis" class="col-lg-6 col-md-12 col-sm-12 col-xs-12">

                    <div class="row">

                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <svg  class="titleIcon" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:a="http://ns.adobe.com/AdobeSVGViewerExtensions/3.0/" x="0px" y="0px" width="100%" height="100%" xml:space="preserve"><g class="shape" style="-webkit-transform: matrix(0.92307692307692, 0, 0, 0.92307692307692, 0, 0);-moz-transform: matrix(0.92307692307692, 0, 0, 0.92307692307692, 0, 0);transform: matrix(0.92307692307692, 0, 0, 0.92307692307692, 0, 0);"><defs></defs><rect fill="#a83333" display="none" width="26" height="26"></rect><rect fill="#a83333" id="_x3C_Slice_x3E__81_" display="none" width="26" height="26"></rect><path fill="#a83333" fill-rule="evenodd" clip-rule="evenodd" d="M15,16.555V10h-4v6.555C9.81,17.248,9,18.523,9,20c0,2.209,1.791,4,4,4 s4-1.791,4-4C17,18.523,16.19,17.248,15,16.555z M17,15.537V4c0-2.209-1.791-4-4-4S9,1.791,9,4v11.537C7.775,16.636,7,18.226,7,20 c0,3.313,2.687,6,6,6s6-2.687,6-6C19,18.226,18.225,16.636,17,15.537z M13,25c-2.762,0-5-2.238-5-5c0-1.634,0.787-3.081,2-3.993V4 c0-1.657,1.343-3,3-3s3,1.343,3,3v12.007c1.213,0.912,2,2.359,2,3.993C18,22.762,15.762,25,13,25z"></path></g></svg>
                            <p class="blockTitle">Θερμοκρασία Παραλαβής</p>
                        </div>
                    </div>
                    <div class="row noPadding">
                        <div id="mainBarChart1" class="col-lg-12 col-md-12 col-sm-12 col-xs-12"></div>
                    </div>
                </div>

                <div id="eidos-ilikou" class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                    <div class="row">

                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <svg class="titleIcon" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:a="http://ns.adobe.com/AdobeSVGViewerExtensions/3.0/" x="0px" y="0px" width="100%" height="100%" xml:space="preserve"><g class="shape" style="-webkit-transform: matrix(0.83333333333333, 0, 0, 1, 0, 0);-moz-transform: matrix(0.83333333333333, 0, 0, 1, 0, 0);transform: matrix(0.83333333333333, 0, 0, 1, 0, 0);"><defs></defs><rect fill="#a83333" display="none" width="24" height="24"></rect><rect fill="#a83333" id="_x3C_Slice_x3E__109_" display="none" width="24" height="24"></rect><path fill="#a83333" fill-rule="evenodd" clip-rule="evenodd" d="M2,22c0,1.104,0.896,2,2,2h16c1.104,0,2-0.896,2-2V9H2V22z M17,12h2v9h-2V12z M11,12h2v9h-2V12z M5,12h2v9H5V12z M23,4h-6V2c0-1.104-0.896-2-2-2H9C7.896,0,7,0.896,7,2v2H1C0.447,4,0,4.447,0,5v1 c0,0.553,0.447,1,1,1h22c0.553,0,1-0.447,1-1V5C24,4.447,23.553,4,23,4z M15,4H9V2h6V4z"></path></g></svg>   
                            <p class="blockTitle">Είδος Υλικού</p>
                        </div>
                    </div>
                    <div class="row noPadding">
                        <div id="mainBarChart2" class="col-lg-12 col-md-12 col-sm-12 col-xs-12"></div>
=======
    $selectYear = ['2014'=>2014,'2015'=>2015,'2016'=>2016,'last-12'=>'Τελευταίοι 12 Μήνες'];
?>

<!-- =========================== MAIN CONTENT =========================== -->
<div class="section">
    <h4 class="sec-head"><i class="icon gicon-d-folder"></i>ΠΟΣΟΤΗΤΕΣ ΖΥΠ ΑΝΑ ΠΕΡΙΓΡΑΦΗ ΥΛΙΚΟΥ</h4>

    <div class="row">
        <div class="col-lg-9 col-sm-12 col-xs-12">
            <div class="stats">
                <!-- ==== HIGHCHART ZYP ==== -->
                <!--<img src="img/deleteme/zyp.png" alt="">-->
                <div id="stat-zyp"></div>
                <!--<script src="js/highcharts/zyp.js"></script>-->
                <!-- ==== /HIGHCHART ZYP ==== -->
            </div>
        </div>
        <div class="col-lg-3 col-sm-12 col-xs-12">
            <div class="memorandum">
                <div class="mem-header">
                    <p class="mem-header-text">Σύνολο Ποσοτήτων ΖΥΠ</p>
                    <p class="mem-header-num"><?=$arrayData['totalQTY']?> tn</p>
                </div>
                <div class="mem-text">
                    <p class="mem-category mem-black"><?=$arrayData['categoriesSUM'][0]->descr;?> (<?=$arrayData['categoriesSUM'][0]->perc;?>)<span class="pull-right"><b><?=number_format($arrayData['categoriesSUM'][0]->sum/1000,2,",",".");?> tn</b></span></p>
                    <p class="mem-category mem-yellow"><?=$arrayData['categoriesSUM'][1]->descr;?> (<?=$arrayData['categoriesSUM'][1]->perc;?>)<span class="pull-right"><b><?=number_format($arrayData['categoriesSUM'][1]->sum/1000,2,",",".");?> tn</b></span></p>
                    <p class="mem-category mem-green"><?=$arrayData['categoriesSUM'][2]->descr;?> (<?=$arrayData['categoriesSUM'][2]->perc;?>)<span class="pull-right"><b><?=number_format($arrayData['categoriesSUM'][2]->sum/1000,2,",",".");?> tn</b></span></p>
                    <p class="mem-category"><?=$arrayData['categoriesSUM'][3]->descr;?> (<?=$arrayData['categoriesSUM'][3]->perc;?>) <span class="pull-right"><b><?=number_format($arrayData['categoriesSUM'][3]->sum/1000,2,",",".");?> tn</b></span></p>
                    <p class="mem-category"><?=$arrayData['categoriesSUM'][4]->descr;?> (<?=$arrayData['categoriesSUM'][4]->perc;?>) <span class="pull-right"><b><?=number_format($arrayData['categoriesSUM'][4]->sum/1000,2,",",".");?> tn</b></span></p>
                </div>
            </div>
            <!--<a class="details pull-right" href="#">ΑΝΑΛΥΤΙΚΑ</a>-->
        </div>
    </div>

    <div class="row counters">
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6 no-padding">
            <div class="counter bg-grey-light">
                <p class="count-number"><?=$arrayData['totalProducers']?></p>
                <p class="count-text">ΣΥΝΟΛΟ
                    <br/>ΠΑΡΑΓΩΓΩΝ ΖΥΠ</p>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6 no-padding">
            <div class="counter bg-grey-light2">
                <p class="count-number"><?=$arrayData['totalDromologia'];?></p>
                <p class="count-text">ΣΥΝΟΛΟ
                    <br/>ΔΡΟΜΟΛΟΓΙΩΝ</p>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6 no-padding">
            <div class="counter bg-grey-light">
                <p class="count-number"><?=$arrayData['totalMonades']?></p>
                <p class="count-text">ΜΟΝΑΔΕΣ
                    <br/>ΔΙΑΧΕΙΡΙΣΗΣ</p>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6 no-padding">
            <div class="counter bg-grey-light2">
                <p class="count-number"><?=$arrayData['totalForthga']?></p>
                <p class="count-text">ΣΥΝΟΛΟ
                    <br/>ΦΟΡΤΗΓΩΝ</p>
            </div>
        </div>
    </div>
</div>


<div class="section">
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
            <h4 class="sec-head"><i class="icon gicon-d-thermometer"></i>ΘΕΡΜΟΚΡΑΣΙΑ ΠΑΡΑΛΑΒΗΣ</h4>

            <!-- ==== HIGHCHART TEMPERATURE ==== -->
            <!--                                <img src="img/deleteme/temperature.png" width="100%">-->
            <div id="stat-temperature"></div>

            <!-- ==== /HIGHCHART TEMPERATURE ==== -->

            <!--<a class="details pull-right" href="#">ΑΝΑΛΥΤΙΚΑ</a>-->
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
            <h4 class="sec-head"><i class="icon gicon-d-trash-can"></i>ΕΙΔΟΣ ΥΛΙΚΟΥ</h4>

            <!-- ==== HIGHCHART MATERIAL ==== -->
            <!--                                <img src="img/deleteme/material.png" width="100%">-->
            <div id="stat-material"></div>

            <!-- ==== HIGHCHART MATERIAL ==== -->

            <!--<a class="details pull-right" href="#">ΑΝΑΛΥΤΙΚΑ</a>-->
        </div>
    </div>
</div>

<!-- =========================== PROGRESS BARS =========================== -->
<div class="section" id="progress-bars">
    <div class="row">

      
       
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="progress-wrapper bg-grey">
                <h4 class="sec-head"><i class="icon gicon-d-warning"></i>ΚΑΤΑΣΧΕΣΗ <span class="green">(Πολύ Χαμηλός Κίνδυνος) <i class="icon small-icon gicon-plants-check-mark"></i></span></h4>
                <div class="progress bg-petrol-light">
                    <div class="progress-bar bg-petrol" role="progressbar" aria-valuenow="<?php echo $arrayData['confiscation'][0]->percCss;?>" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $arrayData['confiscation'][0]->percCss;?>%"></div>
                </div>
                <div class="pro-values">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 no-padding">
                        <p class="big-text petrol"><?php echo $arrayData['confiscation'][0]->perc;?><span>%</span></p>
                        <p class="small-text light-grey"><?php echo $arrayData['confiscation'][0]->type;?></p>
                        <p class="small-text light-grey"><?php echo number_format($arrayData['confiscation'][0]->sum/1000,2,",",".");?> tn</p>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 no-padding text-right">
                        <p class="big-text petrol-light"><?php echo $arrayData['confiscation'][1]->perc;?><span>%</span></p>
                        <p class="small-text light-grey"><?php echo $arrayData['confiscation'][1]->type;?></p>
                        <p class="small-text light-grey"><?php echo number_format($arrayData['confiscation'][1]->sum/1000,2,",",".");?> tn</p>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <!--<a class="details" href="#">ΑΝΑΛΥΤΙΚΑ</a>-->
            </div>
        </div>

        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="progress-wrapper bg-grey">
                <h4 class="sec-head"><i class="icon gicon-d-box"></i>ΣΥΣΚΕΥΑΣΙΑ</h4>
                <div class="progress bg-blue-light">
                    <div class="progress-bar bg-blue-elec" role="progressbar" aria-valuenow="<?php echo $arrayData['packaging'][0]->percCss;?>" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $arrayData['packaging'][0]->percCss;?>%"></div>
                </div>
                <div class="pro-values">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 no-padding">
                        <p class="big-text blue-elec"><?php echo $arrayData['packaging'][0]->perc;?><span>%</span></p>
                        <p class="small-text light-grey"><?php echo $arrayData['packaging'][0]->type;?></p>
                        <p class="small-text light-grey"><?php echo number_format($arrayData['packaging'][0]->sum,2,",",".");?> tn</p>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 no-padding text-right">
                        <p class="big-text blue-light"><?php echo $arrayData['packaging'][1]->perc;?><span>%</span></p>
                        <p class="small-text light-grey"><?php echo $arrayData['packaging'][1]->type;?></p>
                        <p class="small-text light-grey"><?php echo number_format($arrayData['packaging'][1]->sum,2,",",".");?> tn</p>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <!--<a class="details" href="#">ΑΝΑΛΥΤΙΚΑ</a>-->
            </div>
        </div>
    </div>
</div>

@if(Auth::user()->hasRole('admin') || Auth::user()->hasRole('gov') )
<!-- =========================== TABS =========================== -->
<div class="section">
    <div class="row">
        
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="table-full-wrapper">
                <ul id="tab-areas" class="nav nav-tabs">
                    <li class="active"><a href="#regions" data-toggle="tab">ΠΕΡΙΦΕΡΕΙΕΣ</a></li>
                    <li class=""><a href="#reg-areas" data-toggle="tab">ΠΕΡΙΦΕΡΕΙΑΚΕΣ ΕΝΟΤΗΤΕΣ</a></li>
                    <li class=""><a href="#municipalities" data-toggle="tab">ΔΗΜΟΙ</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade in active" id="regions" ng-controller="gorillaRegionsCtrl">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Περιφέρεια</th>
                                    <th>Ποσότητα (tn)</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr ng-repeat="region in regions | startFrom:currentPage*pageSize | limitTo:pageSize">
                                    <td>{!region.name!}</td>
                                    <td>{!region.qty !} tn</td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="tab-pagination pull-left">
                            <a ng-click="setPage($index)" href="javascript:void(0);" ng-repeat="page in numberOfPagesBtns"  class="tab-bullet {!currentPage | pIf :$index : 'active' : '' !}"></a>
                        </div>
                        <!--<a class="more pull-right" href="#">Περισσότερα</a>-->
                        <div class="clearfix"></div>
                    </div>
                    <div class="tab-pane fade in" id="reg-areas" ng-controller="gorillaSubRegionsCtrl">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Περιφερειακή ενότητα</th>
                                    <th>Ποσότητα (tn)</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr ng-repeat="region in regions | startFrom:currentPage*pageSize | limitTo:pageSize">
                                    <td>{!region.name!}</td>
                                    <td>{!region.qty !} tn</td>
                                </tr>
                            </tbody>
                        </table>

                        <div class="tab-pagination pull-left">
                            <a ng-click="setPage($index)" href="javascript:void(0);" ng-repeat="page in numberOfPagesBtns"  class="tab-bullet {!currentPage | pIf :$index : 'active' : '' !}"></a>
                        </div>
                        <!--<a class="more pull-right" href="#">Περισσότερα</a>-->
                        <div class="clearfix"></div>
                    </div>
                    <div class="tab-pane fade in" id="municipalities" ng-controller="gorillamunicipalitiesCtrl">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Δήμος</th>
                                    <th>Ποσότητα (tn)</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr ng-repeat="region in regions | startFrom:currentPage*pageSize | limitTo:pageSize">
                                    <td>{!region.name!}</td>
                                    <td>{!region.qty !} tn</td>
                                </tr>
                            </tbody>
                        </table>

                        <div class="tab-pagination pull-left">
                            <a ng-click="setPage($index)" href="javascript:void(0);" ng-repeat="page in numberOfPagesBtns"  class="tab-bullet {!currentPage | pIf :$index : 'active' : '' !}"></a>
                        </div>
                        <!--<a class="more pull-right" href="#">Περισσότερα</a>-->
                        <div class="clearfix"></div>
>>>>>>> newGorilla
                    </div>

                </div>

            </div>
<<<<<<< HEAD

            <div class="row mt50">
                <div id="katasxesi" class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <svg class="titleIcon" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:a="http://ns.adobe.com/AdobeSVGViewerExtensions/3.0/" x="0px" y="0px" width="100%" height="100%" xml:space="preserve">
                                <g class="shape" style="-webkit-transform: matrix(1, 0, 0, 1, 0, 0);-moz-transform: matrix(1, 0, 0, 1, 0, 0);transform: matrix(1, 0, 0, 1, 0, 0);">
                                    <defs></defs>
                                    <rect fill="#a83333" x="0.089" display="none" width="24" height="24"></rect>
                                    <rect fill="#a83333" id="_x3C_Slice_x3E__109_" x="0.089" display="none" width="24" height="24"></rect>
                                    <path fill="#a83333" fill-rule="evenodd" clip-rule="evenodd" d="M23.589,18.5l-9-15.5c-1.5-2.5-3.5-2.5-5,0l-9,15.5c-1.5,2.5,0,4.5,3,4.5h17 C23.589,23,25.089,21,23.589,18.5z M14.089,21h-4v-4h4V21z M14.089,15h-4V6h4V15z"></path>
                                </g>
                            </svg>
                            <p class="blockTitle">Κατάσχεση</p>
                        </div>
                    </div>
                    <div class="noPadding floatL">
                        <div class="mprogress katasxesi col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div rel="tooltip" data-toggle="tooltip" data-trigger="click" data-html="true" title="katasxemena a" class="reverse mprogressa"></div>
                            <div rel="tooltip" data-toggle="tooltip" data-trigger="click" data-html="true" class="reverse mprogressb" title="mh katasxemena a"></div>
                            <div class="clear"></div>

                            <div class="row mt20 pt20 btThin">
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 brThin">
                                    <div class="row">
                                        <div class="col-lg-7 col-md-12 col-sm-12 col-xs-12">
                                            <span class="mprogressatnFL">Μη κατασχεμένα</span><br>
                                            <span class="mprogressatnL"> 43.099,73 tn </span>
                                        </div>
                                        <div class="col-lg-5 col-md-12 col-sm-12 col-xs-12 mprogressatnPL fs32">99%</div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <div class="row red">
                                        <div class="col-lg-7 col-md-12 col-sm-12 col-xs-12">
                                            <span class="mprogressatnFR">Κατασχεμένα</span><br>
                                            <span class="mprogressatnR"> 43.099,73 tn </span>
                                        </div>
                                        <div class="col-lg-5 col-md-12 col-sm-12 col-xs-12 mprogressatnPR fs32">99%</div>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>


                <div id="siskevasia" class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <svg class="titleIcon" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:a="http://ns.adobe.com/AdobeSVGViewerExtensions/3.0/" x="0px" y="0px" width="100%" height="100%" xml:space="preserve">
                                <g class="shape" style="-webkit-transform: matrix(0.92307692307692, 0, 0, 0.92307692307692, 0, 0);-moz-transform: matrix(0.92307692307692, 0, 0, 0.92307692307692, 0, 0);transform: matrix(0.92307692307692, 0, 0, 0.92307692307692, 0, 0);">
                                    <defs></defs>
                                    <rect fill="#a83333" display="none" width="26" height="26"></rect>
                                    <rect fill="#a83333" id="_x3C_Slice_x3E__109_" display="none" width="26" height="26"></rect>
                                    <path fill="#a83333" fill-rule="evenodd" clip-rule="evenodd" d="M14,26l10-5l1-15L14,9V26z M2,21l10,5V9L1,6L2,21z M13,1L1,4l12,3l12-3L13,1z"></path>
                                </g>
                            </svg>
                            <p class="blockTitle">Συσκευασμένα</p>
                        </div>
                    </div>
                    <div class="noPadding floatL">
                        <div class="mprogress syskevasia col-lg-12 col-md-12 col-sm-12 col-xs-12">

                            <div rel="tooltip" data-toggle="tooltip" data-trigger="click" data-html="true" class="mprogressb" title="mh katasxemena a"></div>
                            <div rel="tooltip" data-toggle="tooltip" data-trigger="click" data-html="true" title="katasxemena a" class="mprogressa"></div>
                            <div class="clear"></div>

                            <div class="row mt20 pt20 btThin">

                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 brThin">
                                    <div class="row">
                                        <div class="col-lg-7 col-md-12 col-sm-12 col-xs-12">
                                            <span class="mprogressatnFL">Συσκευασμένα</span><br>
                                            <span class="mprogressatnL"> 43.099,73 tn </span>
                                        </div>
                                        <div class="col-lg-5 col-md-12 col-sm-12 col-xs-12 mprogressatnPL fs32">99%</div>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <div class="row">
                                        <div class="col-lg-7 col-md-12 col-sm-12 col-xs-12">
                                            <span class="mprogressatnFR">Μη Συσκευασμένα</span><br>
                                            <span class="mprogressatnR"> 43.099,73 tn </span>
                                        </div>
                                        <div class="col-lg-5 col-md-12 col-sm-12 col-xs-12 mprogressatnPR fs32">99%</div>
                                    </div>
                                </div>



                            </div>
                        </div>
                    </div>
                </div>


            </div>



            <div ng-app="tabsAreas" style="margin-top: 30px;" class="col-lg-12">
                <div class="row" ng-controller="TabsController">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="active">
                            <a href="#periferies" role="tab" data-toggle="tab">
                                <icon class="fa fa-home"></icon> Περιφέρειες
                            </a>
                        </li>
                        <li><a href="#perif-enot" role="tab" data-toggle="tab">
                                <i class="fa fa-user"></i> Περιφεριακές ενότητες
                            </a>
                        </li>
                        <li>
                            <a href="#dimo" role="tab" data-toggle="tab">
                                <i class="fa fa-envelope"></i> Δήμοι
                            </a>
                        </li>
                        <li>
                            <a href="#dratiriotites" role="tab" data-toggle="tab">
                                <i class="fa fa-envelope"></i> Δραστηριότητα Παραγωγών
                            </a>
                        </li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div class="tab-pane fade active in" id="periferies"  compile="periferies">

                        </div>
                        <div class="tab-pane fade" id="perif-enot" compile="periferiakesEnotites">

                        </div>
                        <div class="tab-pane fade" id="dimo" compile="dimoi">

                        </div>
                        <div class="tab-pane fade" id="dratiriotites" compile="drastiriotites">

                        </div>
                    </div>
                </div>
            </div>



        </div> 
    </div>
</div>


=======
        </div>
        
        
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="table-full-wrapper">
                <ul id="tab-producers" class="nav nav-tabs">
                    <li class="active"><a href="#activity" data-toggle="tab">ΔΡΑΣΤΗΡΙΟΤΗΤΑ ΠΑΡΑΓΩΓΩΝ</a></li>
                    <li class=""><a href="#producers" data-toggle="tab">ΠΑΡΑΓΩΓΟΙ</a></li>
                </ul>

                <div class="tab-content">

                    <div class="tab-pane fade in active" id="activity" ng-controller="gorillaProducersActivityCtrl">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Δραστηριότητα</th>
                                    <th>Ποσότητα (tn)</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr ng-repeat="region in regions | startFrom:currentPage*pageSize | limitTo:pageSize">
                                    <td>{!region.name!}</td>
                                    <td>{!region.qty !} tn</td>
                                </tr>
                            </tbody>
                        </table>

                        <div class="tab-pagination pull-left">
                            <a ng-click="setPage($index)" href="javascript:void(0);" ng-repeat="page in numberOfPagesBtns"  class="tab-bullet {!currentPage | pIf :$index : 'active' : '' !}"></a>
                        </div>
                        <!--<a class="more pull-right" href="#">Περισσότερα</a>-->
                        <div class="clearfix"></div>
                    </div>

                    <div class="tab-pane fade in" id="producers" ng-controller="gorillaProducersCtrl">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Επωνυμία</th>
                                    <th>Ποσότητα (tn)</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr ng-repeat="region in regions | startFrom:currentPage*pageSize | limitTo:pageSize">
                                    <td>{!region.name!}</td>
                                    <td>{!region.qty !} tn</td>
                                </tr>
                            </tbody>
                        </table>

                        <div class="tab-pagination pull-left">
                            <a ng-click="setPage($index)" href="javascript:void(0);" ng-repeat="page in numberOfPagesBtns"  class="tab-bullet {!currentPage | pIf :$index : 'active' : '' !}"></a>
                        </div>
                        <!--<a class="more pull-right" href="#">Περισσότερα</a>-->
                        <div class="clearfix"></div>
                    </div>

                </div>
            </div>
        </div>

    </div>
</div>

@endif

<div class="section">
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <h4 class="sec-head"><i class="icon gicon-d-industry"></i>ΜΟΝΑΔΕΣ ΔΙΑΧΕΙΡΙΣΗΣ</h4>

            <div class="flow-units top30">
                <div class="row">

                    <div class="col-xs-6">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="flow-head">
                                    <h3 class="blue"><?php echo $arrayData['mex']->count;?></h3>
                                    <p>Μονάδες Ενδιάμεσου
                                        <br/>Χειρισμού</p>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xs-12">
                                <i class="icon gicon-routes-infographic-warehouse grey"></i>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xs-12">
                                <div class="flow-footer">
                                    <h3 class="blue"><?php echo $arrayData['mex']->sum;?> tn</h3>
<!--                                    <p class="blue">(5.000,00 tn)</p>-->
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="vertical-border"></div>

                    <div class="col-xs-6">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="flow-head">
                                    <h3 class="blue"><?php echo $arrayData['finalUnit']->count;?></h3>
                                    <p>Μονάδες Τελικής
                                    <br/>Διάθεσης</p>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xs-12">
                                <i class="icon gicon-routes-infographic-factory grey"></i>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xs-12">
                                <div class="flow-footer">
                                    <h3 class="blue"><?php echo $arrayData['finalUnit']->sum;?> tn</h3>
<!--                                    <p class="blue">(5.000,00 tn)</p>-->
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <!--<a class="details pull-right" href="#">ΑΝΑΛΥΤΙΚΑ</a>-->
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <h4 class="sec-head"><i class="icon gicon-d-gears"></i>ΕΠΕΞΕΡΓΑΣΙΑ</h4>
            <!-- ==== HIGHCHART MATERIAL ==== -->
            <!--                                <img src="img/deleteme/material.png" width="100%">-->
            <div id="stat-material2" class="top30"></div>
            <!--<script src="js/highcharts/material2.js"></script>-->
            <!-- ==== HIGHCHART MATERIAL ==== -->
            <!--<a class="details pull-right" href="#">ΑΝΑΛΥΤΙΚΑ</a>-->
        </div>
    </div>
</div>

>>>>>>> newGorilla
<script>
    $(document).ready(function(){
        globalData = <?php echo(json_encode($arrayData));?>;
        buildMainChart(<?php echo(json_encode($arrayData));?>);
        buildBarChart(<?php echo(json_encode($arrayData));?>);
        buildPieChart(<?php echo(json_encode($arrayData));?>);
<<<<<<< HEAD
        getConfiscation(globalData);
        getPackaging(data);
=======
        buildPieChartProcess(<?php echo(json_encode($arrayData));?>);
        //getConfiscation(globalData);
        //getPackaging(data);
>>>>>>> newGorilla
    })
</script>
@endsection

<<<<<<< HEAD
@section('javascript')
    <script type="text/javascript" src="{{ asset('/js/angular.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/js/tabsAreas.js') }}"></script>
@endsection
=======
>>>>>>> newGorilla
