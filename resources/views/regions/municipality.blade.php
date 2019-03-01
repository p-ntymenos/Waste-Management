@extends('app')

@section('content')

<?php $selectYear = ['2014'=>2014,'2015'=>2015,'2016'=>2016,'last-12'=>'Τελευταίοι 12 Μήνες']; ?>

<div class="section">
   
    <h4 class="sec-head"><i class="icon gicon-menu-regions"></i>ΠΟΣΟΤΗΤΕΣ ΖΥΠ ΑΝΑ ΠΕΡΙΦΕΡΕΙΑ</h4>

    @include('regions.graphs.chart')

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
<!-- =========================== /MAIN SECTION =========================== -->

<!-- =========================== TABS =========================== -->
<div class="section">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="table-full-wrapper angularTabs" >
                <ul class="nav nav-tabs">

                    {{--@if(Auth::user()->hasRole('admin') || Auth::user()->hasRole('gov') ||  Auth::user()->hasRole('reg')   )--}}
<!--                    <li class="active"><a href="#regions" data-toggle="tab">ΠΕΡΙΦΕΡΕΙΕΣ</a></li>-->
                    {{--@endif--}}

                    {{--@if(Auth::user()->hasRole('admin') || Auth::user()->hasRole('gov') ||  Auth::user()->hasRole('reg') ||  Auth::user()->hasRole('subreg')  )--}}
<!--                    <li class="active <?=(Auth::user()->hasRole('subreg'))?'active':''; ?>" ><a href="#reg-areas" data-toggle="tab">ΠΕΡΙΦΕΡΕΙΑΚΕΣ ΕΝΟΤΗΤΕΣ</a></li>-->
                    {{--@endif--}}

                    @if(Auth::user()->hasRole('admin') || Auth::user()->hasRole('gov') ||  Auth::user()->hasRole('reg') ||  Auth::user()->hasRole('subreg') ||  Auth::user()->hasRole('mnc') )
                    <li class="active <?=(Auth::user()->hasRole('mnc'))?'active':''; ?>"><a href="#municipalities" data-toggle="tab">ΔΗΜΟΙ</a></li>
                    @endif
                </ul>

                <div class="tab-content" >
                    {{--@if(Auth::user()->hasRole('admin') || Auth::user()->hasRole('gov') ||  Auth::user()->hasRole('reg') )--}}
                    <!--<div class="tab-pane fade in active" id="regions" ng-controller="gorillaRegionsSumsCtr">
                        <div class="filters">
                            <div class="col-sm-6 col-xs-12">
                                <div class="perpage">
                                    <select ng-change="pageSizeChange()" ng-model="queryPages">
                                        <option selected value="5">5</option>
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
                                        <input type="text" placeholder="Αναζήτηση" ng-model="query.perifereia">
                                        <input type="submit" value="" >
                                    </form>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="table-responsive ">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th><a ng-click="changeOrder('perifereia');" href="javascript:void(0);">Περιφέρειες<i class="icon gicon-sort-by"></i></a></th>
                                        <th ng-click="changeOrder('qty');" class="tab-category tab-number"><a href="javascript:void(0);">Ποσότητα ΖΥΠ (tn)<i class="icon gicon-sort-by"></i></a></th>
                                        <th ng-click="changeOrder('category1');" class="tab-category tab-black tab-number"><a href="javascript:void(0);">Κατηγορία 1<i class="icon gicon-sort-by"></i></a></th>
                                        <th ng-click="changeOrder('category2');" class="tab-category tab-yellow tab-number"><a href="javascript:void(0);">Κατηγορία 2<i class="icon gicon-sort-by"></i></a></th>
                                        <th ng-click="changeOrder('category3');" class="tab-category tab-green tab-number"><a href="javascript:void(0);">Κατηγορία 3<i class="icon gicon-sort-by"></i></a></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr ng-repeat = "region in regions | filter:query | orderBy:order_:orderDir | startFrom:currentPage*pageSize | limitTo:pageSize "> 
                                        <td><a href="subregions/{!region.id!}">{!region.perifereia!}</a></td>
                                        <td class="tab-number">{!region.qty | number:2!} tn</td>
                                        <td class="tab-number">{!region.category1 | number : 2!} tn</td>
                                        <td class="tab-number">{!region.category2/1000 | number : 2!} tn</td>
                                        <td class="tab-number">{!region.category3/1000 | number : 2!} tn</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="tab-pagination pull-left" ng-show="numberOfPages()>1">
                            <a href="javascript:void(0);" ng-click="setPage(false)" class="tab-arrow-left"><i class="icon gicon-arrow-down"></i></a>
                            <span>{!currentPage+1!}/{!numberOfPages()!}</span>
                            <a href="javascript:void(0);" ng-click="setPage(true)" class="tab-arrow-right"><i class="icon gicon-arrow-down"></i></a>
                        </div>
                        <div class="buttons pull-right">
                            <div class="btn-orange"><a href="#"><i class="icon gicon-print"></i>ΕΚΤΥΠΩΣΗ</a></div>
                            <div class="btn-red"><a href="#"><i class="icon gicon-export"></i>ΕΞΑΓΩΓΗ</a></div>
                        </div>
                        <div class="clearfix"></div>

                    </div>-->
                    {{--@endif--}}

                    {{--@if(Auth::user()->hasRole('admin') || Auth::user()->hasRole('gov') ||  Auth::user()->hasRole('reg') ||  Auth::user()->hasRole('subreg') )--}}
                    <!--<div class="tab-pane fade in active <?=(Auth::user()->hasRole('subreg'))?'active':''; ?>" id="reg-areas" ng-controller="gorillaSubRegionsSumsCtr">
                        <div class="filters">
                            <div class="col-sm-6 col-xs-12">
                                <div class="perpage">
                                    <select ng-change="pageSizeChange()" ng-model="queryPages">
                                        <option selected value="5">5</option>
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
                                        <input type="text" placeholder="Αναζήτηση" ng-model="query.name">
                                        <input type="submit" value="" >
                                    </form>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="table-responsive ">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th><a ng-click="changeOrder('perifereia');" href="javascript:void(0);">Περιφερειακές Ενότητες<i class="icon gicon-sort-by"></i></a></th>
                                        <th ng-click="changeOrder('qty');" class="tab-category tab-number"><a href="javascript:void(0);">Ποσότητα ΖΥΠ (tn)<i class="icon gicon-sort-by"></i></a></th>
                                        <th ng-click="changeOrder('category1');" class="tab-category tab-black tab-number"><a href="javascript:void(0);">Κατηγορία 1<i class="icon gicon-sort-by"></i></a></th>
                                        <th ng-click="changeOrder('category2');" class="tab-category tab-yellow tab-number"><a href="javascript:void(0);">Κατηγορία 2<i class="icon gicon-sort-by"></i></a></th>
                                        <th ng-click="changeOrder('category3');" class="tab-category tab-green tab-number"><a href="javascript:void(0);">Κατηγορία 3<i class="icon gicon-sort-by"></i></a></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr ng-repeat = "row in rows | filter:query | orderBy:order_:orderDir | startFrom:currentPage*pageSize | limitTo:pageSize "> 
                                        <td><a href="{{url('municipalities')}}/{!row.id!}">{!row.name!}</a></td>
                                        <td class="tab-number">{!row.qty | number:2!} tn</td>
                                        <td class="tab-number">{!row.category1 | number : 2!} tn</td>
                                        <td class="tab-number">{!row.category2/1000 | number : 2!} tn</td>
                                        <td class="tab-number">{!row.category3/1000 | number : 2!} tn</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="tab-pagination pull-left" ng-show="numberOfPages()>0">
                            <a href="javascript:void(0);" ng-click="setPage(false)" class="tab-arrow-left"><i class="icon gicon-arrow-down"></i></a>
                            <span>{!currentPage+1!}/{!numberOfPages()!}</span>
                            <a href="javascript:void(0);" ng-click="setPage(true)" class="tab-arrow-right"><i class="icon gicon-arrow-down"></i></a>
                        </div>
                        <div class="buttons pull-right">
                            <div class="btn-orange"><a href="#"><i class="icon gicon-print"></i>ΕΚΤΥΠΩΣΗ</a></div>
                            <div class="btn-red"><a href="#"><i class="icon gicon-export"></i>ΕΞΑΓΩΓΗ</a></div>
                        </div>
                        <div class="clearfix"></div>

                    </div>-->
                    {{--@endif--}}

                    {{--@if(Auth::user()->hasRole('admin') || Auth::user()->hasRole('gov') ||  Auth::user()->hasRole('reg') ||  Auth::user()->hasRole('subreg') ||  Auth::user()->hasRole('mnc') )--}}
                    <div class="tab-pane fade in active <?=(Auth::user()->hasRole('mnc'))?'active':''; ?>" id="municipalities" ng-controller="gorillaMunicipalitiesCtr">
                        <div class="filters">
                            <div class="col-sm-6 col-xs-12">
                                <div class="perpage">
                                    <select ng-change="pageSizeChange()" ng-model="queryPages">
                                        <option selected value="5">5</option>
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
                                        <input type="text" placeholder="Αναζήτηση" ng-model="query.name">
                                        <input type="submit" value="" >
                                    </form>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="table-responsive ">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th><a ng-click="changeOrder('perifereia');" href="javascript:void(0);">Περιφερειακές Ενότητες<i class="icon gicon-sort-by"></i></a></th>
                                        <th ng-click="changeOrder('qty');" class="tab-category tab-number"><a href="javascript:void(0);">Ποσότητα ΖΥΠ (tn)<i class="icon gicon-sort-by"></i></a></th>
                                        <th ng-click="changeOrder('category1');" class="tab-category tab-black tab-number"><a href="javascript:void(0);">Κατηγορία 1<i class="icon gicon-sort-by"></i></a></th>
                                        <th ng-click="changeOrder('category2');" class="tab-category tab-yellow tab-number"><a href="javascript:void(0);">Κατηγορία 2<i class="icon gicon-sort-by"></i></a></th>
                                        <th ng-click="changeOrder('category3');" class="tab-category tab-green tab-number"><a href="javascript:void(0);">Κατηγορία 3<i class="icon gicon-sort-by"></i></a></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr ng-repeat = "row in rows | filter:query | orderBy:order_:orderDir | startFrom:currentPage*pageSize | limitTo:pageSize "> 
                                        <td><a href="#">{!row.name!}</a></td>
                                        <td class="tab-number">{!row.qty | number:2!} tn</td>
                                        <td class="tab-number">{!row.category1 | number : 2!} tn</td>
                                        <td class="tab-number">{!row.category2/1000 | number : 2!} tn</td>
                                        <td class="tab-number">{!row.category3/1000 | number : 2!} tn</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="tab-pagination pull-left" ng-show="numberOfPages()>1">
                            <a href="javascript:void(0);" ng-click="setPage(false)" class="tab-arrow-left"><i class="icon gicon-arrow-down"></i></a>
                            <span>{!currentPage+1!}/{!numberOfPages()!}</span>
                            <a href="javascript:void(0);" ng-click="setPage(true)" class="tab-arrow-right"><i class="icon gicon-arrow-down"></i></a>
                        </div>
                        <div class="buttons pull-right">
<!--                            <div class="btn-orange"><a href="#"><i class="icon gicon-print"></i>ΕΚΤΥΠΩΣΗ</a></div>-->
                            <div class="btn-red"><a href="#"><i class="icon gicon-export"></i>ΕΞΑΓΩΓΗ</a></div>
                        </div>
                        <div class="clearfix"></div>

                    </div>
                    {{--@endif--}}
                </div>
            </div>
        </div>
    </div>
</div>
<!-- =========================== /TABS =========================== -->
<input type="hidden" id="rId" value="<?php if(!empty($rId)){echo $rId;}?>">
<input type="hidden" id="perrId" value="<?php if(!empty($rId)){echo $rId;}?>">


<script>
    $(document).ready(function(){
        //        globalData = <?php //echo(json_encode($arrayData));?>;
                buildMainChart(<?php echo(json_encode($arrayData));?>);
        //        buildBarChart(<?php //echo(json_encode($arrayData));?>);
        //        buildPieChart(<?php //echo(json_encode($arrayData));?>);
        //        buildPieChartProcess(<?php //echo(json_encode($arrayData));?>);
        regionsData = <?php echo json_encode($regionsData);?>;
        //getRegionsMapChart();
        

    })
</script>
@endsection
