@extends('app')

@section('content')

<?php
$selectYear = ['2014'=>2014,'2015'=>2015,'2016'=>2016,'last-12'=>'Τελευταίοι 12 Μήνες'];
?>


<!-- =========================== FILTER SECTION =========================== -->
<div class="row filter">

    <div class="panel panel-default">

        <h4 class="sec-head filter-head">
            <a data-toggle="collapse" href="#filters">
                <i class="icon gicon-abp-reports-filters"></i>ΦΙΛΤΡΑ ΕΞΑΤΟΜΙΚΕΥΜΕΝΗΣ ΑΝΑΖΗΤΗΣΗΣ
            </a>
        </h4>
        <div id="filters" class="panel-collapse collapse in">
            <!--<div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 top40">
                    <label for="date" class="filter-label">Ημερομηνία</label>
                    <select id="date">
                        <option value="12">Τελευταίους 12 μήνες</option>
                        <option value="act-1">Διάστημα 1</option>
                        <option value="act-2">Διάστημα 2</option>
                        <option value="act-3">Διάστημα 3</option>
                    </select>
                    <input type="text" name="date-from" value="01/10/2014">
                    <input type="text" name="date-to" value="01/10/2015">
                </div>

                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 top30">
                    <label for="category" class="filter-label">Κατηγορία</label>
                    <select id="category">
                        <option value="12">Όλες οι κατηγορίες</option>
                        <option value="rep-cat">Κατηγορίες ΖΥΠ</option>
                        <option value="rep-mater">Είδος </option>
                        <option value="rep-temp">Θερμοκρασία</option>
                        <option value="rep-pack">Συσκευασία</option>
                        <option value="rep-conf">Κατάσχεση</option>
                        <option value="rep-proc">Επεξεργασία</option>
                        <option value="rep-prod">Παραγωγοί</option>
                        <option value="rep-routes">Δρομολόγια</option>
                    </select>
                </div>

                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 top30">
                    <label for="filter" class="filter-label">Φίλτρο</label>
                    <select id="filter">
                        <option value="12">Περιφέρειες</option>
                        <option value="act-1">Παραγωγοί</option>
                    </select>
                </div>

                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 top30">
                    <label for="search" class="filter-label">Αναζήτηση ανά</label>
                    <div class="radio">
                        <input type="radio" name="search" id="filtby-periferies" value="periferies">
                        <label for="filtby-periferies"><span></span>Περιφέρειες</label>
                    </div>
                    <div class="radio">
                        <input type="radio" name="search" id="filtby-enotites" value="enotites">
                        <label for="filtby-enotites"><span></span>Περιφερειακές Ενότητες</label>
                    </div>
                    <div class="radio">
                        <input type="radio" name="search" id="filtby-dimoi" value="dimoi" checked>
                        <label for="filtby-dimoi"><span></span>Δήμους</label>
                    </div>
                </div>

                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 top30">
                    <label for="search" class="filter-label"></label>
                    <div class="open-dropdowns">
                        <select id="per">
                            <option value="act-0">Όλες οι Περιφέρειες</option>
                            <option value="act-1">Ανατολική Μακεδονία και Θράκη</option>
                            <option value="act-2">Αττική</option>
                            <option value="act-3">Βόρειο Αιγαίο</option>
                            <option value="act-4">Δυτική Ελλάδα</option>
                        </select>
                        <select id="eno">
                            <option value="act-0">Όλες οι Περιφερειακές Ενότητες</option>
                            <option value="act-1">Ανατολική Μακεδονία και Θράκη</option>
                            <option value="act-2">Αττική</option>
                            <option value="act-3">Βόρειο Αιγαίο</option>
                            <option value="act-4">Δυτική Ελλάδα</option>
                        </select>
                        <select id="dim">
                            <option value="act-0">Όλοι οι δήμοι</option>
                            <option value="act-1">Ανατολική Μακεδονία και Θράκη</option>
                            <option value="act-2">Αττική</option>
                            <option value="act-3">Βόρειο Αιγαίο</option>
                            <option value="act-4">Δυτική Ελλάδα</option>
                        </select>
                    </div>
                </div>

                <div class="filter-buttons">
                    <div class="col-sm-2 col-xs-6">
                        <input type="submit" value="ΕΚΤΕΛΕΣΗ" class="run">
                    </div>
                    <div class="col-sm-2 col-xs-6">
                        <input type="submit" value="ΑΚΥΡΩΣΗ" class="cancel">
                    </div>
                </div>

            </div>-->
            @include('reports.partials.form')
        </div>
    </div>

</div>
<!-- =========================== /FILTER SECTION =========================== -->

<!-- =========================== MAIN SECTION =========================== -->
<div class="section">
    <h4 class="sec-head"><i class="icon gicon-d-folder"></i>ΠΟΣΟΤΗΤΕΣ ΖΥΠ ΑΝΑ ΠΕΡΙΓΡΑΦΗ ΥΛΙΚΟΥ</h4>

    <div class="row chart-wrapper top30">
        <div class="col-lg-9 col-sm-12 col-xs-12">
            <div class="stats">

                <!-- ==== HIGHCHART ZYP ==== -->
                <!-- <img src="img/deleteme/zyp.png" alt="">-->
                <div id="stat-zyp"></div>
<!--                <script src="js/highcharts/zyp.js"></script>-->
                <!-- ==== /HIGHCHART ZYP ==== -->

            </div>
        </div>
        <div class="col-lg-3 col-lg-offset-0 col-sm-6 col-sm-offset-3 col-xs-12">
            @include('layouts.generic.sumTopRight')
            <a class="details pull-right" href="#">ΑΝΑΛΥΤΙΚΑ</a>
        </div>
    </div>
        @include('layouts.generic.sumsBottom')
</div>
<!-- =========================== /MAIN SECTION =========================== -->

<div class="section">
    <div class="row">

        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

            <div class="table-full-wrapper table-border">

                <div class="table-full-header">
                    <div class="row">
                        <div class="col-xs-12">
                            <h4 class="sec-head">ΠΑΡΑΓΟΜΕΝΕΣ ΠΟΣΟΤΗΤΕΣ ΖΥΠ</h4>
                            <select class="border-bold">
                                <option value="act-all">Αριθμητική αξία</option>
                                <option value="act-1">Ποσοστά</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="filters">
                    <div class="row">
                        <div class="col-sm-6 col-xs-12">
                            <div class="perpage">
                                <select>
                                    <option value="20">20</option>
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
                                    <input type="text" placeholder="Αναζήτηση">
                                    <input type="submit" value="">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="content">


                    <div class="tab-pane fade in active" id="regions">
                        <div class="table-responsive">

                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th><a href="#">Περιφέρειες<i class="icon gicon-sort-by"></i></a></th>
                                        <th class="tab-number"><a href="#">Ποσότητα ΖΥΠ (tn)<i class="icon gicon-sort-by"></i></a></th>
                                        <th class="tab-category tab-black tab-number"><a href="#">Κατηγορία 1<i class="icon gicon-sort-by"></i></a></th>
                                        <th class="tab-category tab-yellow tab-number"><a href="#">Κατηγορία 2<i class="icon gicon-sort-by"></i></a></th>
                                        <th class="tab-category tab-green tab-number"><a href="#">Κατηγορία 3<i class="icon gicon-sort-by"></i></a></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Ανατολική Μακεδονία και Θράκη</td>
                                        <td class="tab-number">100 tn</td>
                                        <td class="tab-number">100 tn</td>
                                        <td class="tab-number">100 tn</td>
                                        <td class="tab-number">100 tn</td>
                                    </tr>
                                    <tr>
                                        <td>Αττική</td>
                                        <td class="tab-number">100 tn</td>
                                        <td class="tab-number">100 tn</td>
                                        <td class="tab-number">100 tn</td>
                                        <td class="tab-number">100 tn</td>
                                    </tr>
                                    <tr>
                                        <td>Βόρειο Αιγαίο</td>
                                        <td class="tab-number">100 tn</td>
                                        <td class="tab-number">100 tn</td>
                                        <td class="tab-number">100 tn</td>
                                        <td class="tab-number">100 tn</td>
                                    </tr>
                                    <tr>
                                        <td>Δυτική Ελλάδα</td>
                                        <td class="tab-number">100 tn</td>
                                        <td class="tab-number">100 tn</td>
                                        <td class="tab-number">100 tn</td>
                                        <td class="tab-number">100 tn</td>
                                    </tr>
                                    <tr>
                                        <td>Δυτική Μακεδονία</td>
                                        <td class="tab-number">100 tn</td>
                                        <td class="tab-number">100 tn</td>
                                        <td class="tab-number">100 tn</td>
                                        <td class="tab-number">100 tn</td>
                                    </tr>
                                    <tr>
                                        <td>Ήπειρος</td>
                                        <td class="tab-number">100 tn</td>
                                        <td class="tab-number">100 tn</td>
                                        <td class="tab-number">100 tn</td>
                                        <td class="tab-number">100 tn</td>
                                    </tr>
                                    <tr>
                                        <td>Θεσσαλία</td>
                                        <td class="tab-number">100 tn</td>
                                        <td class="tab-number">100 tn</td>
                                        <td class="tab-number">100 tn</td>
                                        <td class="tab-number">100 tn</td>
                                    </tr>
                                    <tr>
                                        <td>Ιόνιοι Νήσοι</td>
                                        <td class="tab-number">100 tn</td>
                                        <td class="tab-number">100 tn</td>
                                        <td class="tab-number">100 tn</td>
                                        <td class="tab-number">100 tn</td>
                                    </tr>
                                    <tr>
                                        <td>Κεντρική Μακεδονία</td>
                                        <td class="tab-number">100 tn</td>
                                        <td class="tab-number">100 tn</td>
                                        <td class="tab-number">100 tn</td>
                                        <td class="tab-number">100 tn</td>
                                    </tr>
                                    <tr>
                                        <td>Κρήτη</td>
                                        <td class="tab-number">100 tn</td>
                                        <td class="tab-number">100 tn</td>
                                        <td class="tab-number">100 tn</td>
                                        <td class="tab-number">100 tn</td>
                                    </tr>
                                    <tr>
                                        <td>Νότιο Αιγαίο</td>
                                        <td class="tab-number">100 tn</td>
                                        <td class="tab-number">100 tn</td>
                                        <td class="tab-number">100 tn</td>
                                        <td class="tab-number">100 tn</td>
                                    </tr>
                                    <tr>
                                        <td>Πελοπόννησος</td>
                                        <td class="tab-number">100 tn</td>
                                        <td class="tab-number">100 tn</td>
                                        <td class="tab-number">100 tn</td>
                                        <td class="tab-number">100 tn</td>
                                    </tr>
                                    <tr>
                                        <td>Στερεά Ελλάδα</td>
                                        <td class="tab-number">100 tn</td>
                                        <td class="tab-number">100 tn</td>
                                        <td class="tab-number">100 tn</td>
                                        <td class="tab-number">100 tn</td>
                                    </tr>
                                    <tr>
                                        <td><b>Σύνολο</b></td>
                                        <td class="tab-number">100 tn</td>
                                        <td class="tab-number">100 tn</td>
                                        <td class="tab-number">100 tn</td>
                                        <td class="tab-number">100 tn</td>
                                    </tr>

                                </tbody>
                            </table>


                        </div>
                        <div class="clearfix"></div>

                    </div>

                </div>

                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 " style="margin-top:40px;padding: 0px!important;">
                    <div class="buttons pull-right">
                        <div class="btn-orange"><a href="#"><i class="icon gicon-print"></i>ΕΚΤΥΠΩΣΗ</a></div>
                        <div class="btn-red"><a href="#"><i class="icon gicon-export"></i>ΕΞΑΓΩΓΗ</a></div>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>
<!-- =========================== /SIMPLE SECTION =========================== -->




<script>
    $(document).ready(function(){
        buildMainChart(<?php echo(json_encode($arrayData));?>);
    })
</script>
@endsection