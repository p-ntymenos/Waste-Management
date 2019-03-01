@extends('app')

@section('content')

<?php
$selectYear = ['2014'=>2014,'2015'=>2015,'2016'=>2016,'last-12'=>'Τελευταίοι 12 Μήνες'];
?>




<div class="section">
    <h4 class="sec-head"><i class="icon gicon-regions-bar-chart"></i>ΠΟΣΟΤΗΤΕΣ ΖΥΠ ΑΝΑ ΔΡΑΣΤΗΡΙΟΤΗΤΑ ΠΑΡΑΓΩΓΩΝ</h4>

    <div class="row chart-wrapper top35">
        <div class="col-lg-9 col-sm-12 col-xs-12">
            <div class="stats">
                <!--                                    <img src="img/deleteme/paragwgoi.png" width="100%">-->
                <div id="stat-paragogoi"></div>
                <!--<script src="js/highcharts/paragogoi.js"></script>-->
            </div>
        </div>
        <div class="col-lg-3 col-lg-offset-0 col-sm-6 col-sm-offset-3 col-xs-12">
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
            <a class="details pull-right" href="#">ΑΝΑΛΥΤΙΚΑ</a>
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
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
             <div class="table-full-wrapper table-border" ng-controller="gorillaProducersActivityCtr">

                <div class="table-full-header">
                    <div class="row">
                        <div class="col-md-6 col-xs-12">
                            <h4 class="sec-head">ΔΡΑΣΤΗΡΙΟΤΗΤΑ ΠΑΡΑΓΩΓΩΝ</h4>
                            <select class="border-bold" ng-model="query.occupation">
                                <option value="">Όλες οι δραστηριότητες</option>
                                @foreach($arrayData['occupations'] as $row)
                                <option value="{{$row->occupation}}">{{$row->occupation}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 col-xs-12">
                            <div class="table-info">
                                <p><b><?=$arrayData['countSingle'][0]->customerCount;?></b> <i class="icon gicon-faq-home"></i> Μεμονωμένα Καταστήματα</p>
                                <p><b><?=$arrayData['countNetwork'][0]->customerCount;?></b> <i class="icon gicon-producers-store-network"></i> Δίκτυα</p>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>

                <div class="filters">
                    <div class="row">
                        <div class="col-sm-6 col-xs-12">
                            <div class="perpage">
                                <select ng-change="pageSizeChange()" ng-model="queryPages">
                                    <option value="5">5</option>
                                    <option selected value="20">20</option>
                                    <option value="30">30</option>
                                    <option value="40">40</option>
                                    <option value="50">50</option>
                                </select>
                                <span>Καταχωρήσεις</span>
                            </div>
                        </div>
                        <div class="col-sm-6 col-xs-12">
                            <div class="search">
                                <form action="#">
                                    <input type="text" placeholder="Αναζήτηση" ng-model="query.customer">
                                    <input type="submit" value="" >
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>

                <div class="content">


                    <div class="tab-pane fade in active">
                        <div class="table-responsive">
                            <table class="table table-hover table-icon">
                                <thead>
                                    <tr>
                                        <th><a ng-click="changeOrder('perifereia');" href="javascript:void(0);">Παραγωγός<i class="icon gicon-sort-by"></i></a></th>
                                        <th class="tab-number tab-category"><a ng-click="changeOrder('occupation');" href="javascript:void(0);">Δραστηριότητα<i class="icon gicon-sort-by"></i></a></th>
                                        <th class="tab-number tab-category"><a ng-click="changeOrder('sum');" href="javascript:void(0);">Ποσότητα ΖΥΠ (tn)<i class="icon gicon-sort-by"></i></a></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr ng-repeat="row in filtered =( rows | filter:query | orderBy:order_:orderDir | startFrom:currentPage*pageSize | limitTo:pageSize )" >
                                        <td><i class="icon {!row.diktyoIcon!}"></i>{!row.customer!} </td>
                                        <td class="tab-number">{!row.occupation !}</td>
                                        <td class="tab-number">{!row.sum | number:2!} tn</td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>

                        <div class="tab-pagination pull-left">
                            <a href="javascript:void(0);" ng-click="setPage(false)" class="tab-arrow-left"><i class="icon gicon-arrow-down"></i></a>
                            <span>{!currentPage+1!}/{!numberOfPages()!}</span>
                            <a href="javascript:void(0);" ng-click="setPage(true)" class="tab-arrow-right"><i class="icon gicon-arrow-down"></i></a>
                        </div>
                        <div class="buttons pull-right">
<!--                            <div class="btn-orange"><a href="#"><i class="icon gicon-print"></i>ΕΚΤΥΠΩΣΗ</a></div>-->
                            <div class="btn-red"><a href="{{url('ajax/producersActivityExport/'.$chosenYear)}}"><i class="icon gicon-export"></i>ΕΞΑΓΩΓΗ</a></div>
                        </div>
                        <div class="clearfix"></div>
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>



<script>
    $(document).ready(function(){

        getMainPieChart(<?=json_encode($pieData);?>);

    })
</script>
@endsection