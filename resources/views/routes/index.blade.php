@extends('app')

@section('content')

<?php
$selectYear = ['2014'=>2014,'2015'=>2015,'2016'=>2016,'last-12'=>'Τελευταίοι 12 Μήνες'];
?>

<!-- =========================== MAIN SECTION =========================== -->
<div class="section">
    <div class="row">
        <div class="col-sm-7 col-xs-12">
            <h4 class="sec-head"><i class="icon gicon-routes-bar-chart-2"></i>ΠΟΣΟΤΗΤΕΣ ΖΥΠ ΑΝΑ ΔΡΟΜΟΛΟΓΙΟ</h4>
        </div>
        <div class="col-sm-5 col-xs-12">
            <div class="btn-orange pull-right emporiko">
                <!--<a href="#"><i class="icon gicon-pdf-file"></i>ΕΜΠΟΡΙΚΟ ΕΓΓΡΑΦΟ</a>-->
            </div>
        </div>
    </div>
    <?php



    ?>
    <div class="row chart-wrapper top15">
        <div class="col-lg-9 col-sm-12 col-xs-12 flow-column">
            <div class="flow">
                <div class="station">
                    <h4 class="blue">Παραγωγοί<br>ΖΥΠ</h4>
                    <i class="icon gicon-routes-infographic-building grey"></i>
                    <h3 class="grey">45.099,73 tn</h3>
                </div>
                <div class="route">
                    <i class="icon arrow gicon-routes-infographic-arrow"></i>
                    <i class="icon gicon-r-truck grey"></i>
                    <h3 class="grey"><?php echo $arrayData['routesProdToMex'];?></h3>
                </div>
                <div class="station">
                    <h4 class="blue">Μονάδες Ενδιάμεσου<br>Χειρισμού</h4>
                    <i class="icon gicon-routes-infographic-warehouse grey"></i>
                    <h3 class="grey">45.099,73 tn</h3>
                    <p>(5.000,00 tn)</p>
                </div>
                <div class="route">
                    <i class="icon arrow gicon-routes-infographic-arrow"></i>
                    <i class="icon gicon-r-truck grey"></i>
                    <h3 class="grey"><?php echo $arrayData['routesMexToFinal'];?></h3>
                </div>
                <div class="station">
                    <h4 class="blue">
                        Μονάδες Τελικής<br>Διάθεσης
                    </h4>
                    <i class="icon gicon-routes-infographic-factory grey"></i>
                    <h3 class="grey">
                        45.099,73 tn
                    </h3>
                    <p>
                        (5.000,00 tn)
                    </p>
                </div>
                <div class="clearfix"></div>
                <div class="bottom-arrow">
                    <i class="icon gicon-r-truck grey"></i>
                    <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="100%" height="100%" viewBox="0 0 619.25 62.488" enable-background="new 0 0 619.25 62.488" xml:space="preserve">
                        <polygon fill="#73a8cb" points="616.504,0.407 613.758,8.443 616.004,8.443 616.004,61.488 1,61.488 1,0 0,0 0,62.488 0.118,62.488 
                                                        1,62.488 616.004,62.488 616.663,62.488 617.004,62.488 617.004,8.443 619.25,8.443 " />
                    </svg>
                    <p><?php echo $arrayData['routesProdToFinal'];?></p>
                </div>
                <div class="legend">
                    <p class="v1">Εμπορικό Έγγραφο V1</p>
                    <p class="v2">Εμπορικό Έγγραφο V2</p>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-lg-offset-0 col-sm-6 col-sm-offset-3 col-xs-12">
            @include('layouts.generic.sumTopRight')
            <!--<a class="details pull-right" href="#">ΑΝΑΛΥΤΙΚΑ</a>-->
        </div>
    </div>

    @include('layouts.generic.sumsBottom')

</div>
<!-- =========================== /MAIN SECTION =========================== -->

<!-- =========================== TABS =========================== -->

<div class="section">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="table-full-wrapper table-border" ng-controller="gorillaRoutesCtr">

                <div class="table-full-header">
                    <div class="row">
                        <div class="col-md-6 col-xs-12">
                            <h4 class="sec-head">ΔΡΟΜΟΛΟΓΙΑ</h4>
                            <select class="border-bold" ng-model="query.trucks">
                                <option value="">Όλα τα φορτηγά</option>
                                @foreach($arrayData['ForthgaDetails'] as $row)
                                <option value="{{$row->trucks}}">{{$row->trucks}}</option>
                                @endforeach

                            </select>
                        </div>
                        <div class="col-md-6 col-xs-12">
                            <div class="table-info">

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
                                    <option ng-selected="20 == pageSize"  value="20">20</option>
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
                                    <input type="text" placeholder="Αναζήτηση" ng-model="query">
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
                                        <th><a ng-click="changeOrder('id');" href="javascript:void(0);">ID<i class="icon gicon-sort-by"></i></a></th>
                                        <th><a ng-click="changeOrder('ftrdate');" href="javascript:void(0);">Ημερομηνία<i class="icon gicon-sort-by"></i></a></th>
                                        <th><a ng-click="changeOrder('customer');" href="javascript:void(0);">Πελάτης<i class="icon gicon-sort-by"></i></a></th>
                                        <th><a ng-click="changeOrder('egrisi');" href="javascript:void(0);">Αρ. Έγκρισης<i class="icon gicon-sort-by"></i></a></th>
                                        <th class="tab-category tab-number"><a ng-click="changeOrder('qty');" href="javascript:void(0);">Ποσ. ΖΥΠ (tn)<i class="icon gicon-sort-by"></i></a></th>
                                        <th><a ng-click="changeOrder('mex');" href="javascript:void(0);">ΜΕΧ<i class="icon gicon-sort-by"></i></a></th>
                                        <th><a ng-click="changeOrder('finalunit');" href="javascript:void(0);">Μονάδα Τελ. Διάθεσης<i class="icon gicon-sort-by"></i></a></th>


                                    </tr>
                                </thead>
                                <tbody>
                                    <tr ng-repeat="row in filtered =( rows | filter:query | orderBy:order_:orderDir | startFrom:currentPage*pageSize | limitTo:pageSize )" >
                                        <td><i class="icon "></i><a href="{{url('routes')}}/{!row.id!}">{!row.id!}</a></td>
                                        <td class="tab-number">{!row.ftrdate !}</td>
                                        <td>{!row.customer !}</td>
                                        <td>{!row.egrisi !}</td>
                                        <td class="tab-number">{!row.qty !}</td>
                                        <td class="tab-number">{!row.mex !}</td>
                                        <td class="tab-number">{!row.finalunit !}</td>
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

<!-- =========================== /TABS =========================== -->


<script>
    $(document).ready(function(){

    })
</script>
@endsection