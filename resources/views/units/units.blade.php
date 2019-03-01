@extends('app')

@section('content')

<?php
$selectYear = ['2014'=>2014,'2015'=>2015,'2016'=>2016,'last-12'=>'Τελευταίοι 12 Μήνες'];
?>


<div class="section">
    <h4 class="sec-head"><i class="icon gicon-plants-bar-chart"></i>ΠΟΣΟΤΗΤΕΣ ΖΥΠ ΑΝΑ ΜΕΘΟΔΟ ΕΠΕΞΕΡΓΑΣΙΑΣ</h4>

    <div class="row chart-wrapper top35">
        <div class="col-lg-9 col-sm-12 col-xs-12">
            <div class="stats">
                <!--                                    <img src="img/deleteme/monades.png" width="100%">-->
                <div id="stat-zyp2"></div>
                <script src="js/highcharts/zyp2.js"></script>
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
<!-- =========================== /MAIN SECTION =========================== -->

<!-- =========================== TABS =========================== -->
<div class="section">
    <div class="row">

        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

            <div class="table-full-wrapper table-border">

                <div class="table-full-header">
                    <div class="row">
                        <div class="col-md-6 col-xs-12">
                            <h4 class="sec-head">ΜΕΘΟΔΟΣ ΕΠΕΞΕΡΓΑΣΙΑΣ</h4>
                            <select class="border-bold">
                                <option value="act-all">Όλες οι Μέθοδοι Επεξεργασίας</option>
                                <option value="act-1">Μέθοδος 1</option>
                                <option value="act-2">Μέθοδος 2</option>
                                <option value="act-3">Μέθοδος 3</option>
                            </select>
                        </div>
                        <div class="col-md-6 col-xs-12">
                            <div class="table-info">
                                <p><b>13</b> <i class="icon gicon-plants-mex"></i> ΜΕΧ</p>
                                <p><b>7</b> <i class="icon gicon-d-industry"></i> Μονάδα Τελικής Διάθεσης</p>
                            </div>
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


                    <div class="tab-pane fade in active" id="units-table">
                        <div class="table-responsive">
                            <table class="table table-hover table-icon">
                                <thead>
                                    <tr>
                                        <th><a href="#">Μονάδα<i class="icon gicon-sort-by"></i></a></th>
                                        <th><a href="#">Επεξεργασία<i class="icon gicon-sort-by"></i></a></th>
                                        <th><a href="#">Λάσπες</a></th>
                                        <th><a href="#">Φυτικά</a></th>
                                        <th class="mem-category mem-black"><a href="#">Κατ. 1</a></th>
                                        <th class="mem-category mem-yellow"><a href="#">Κατ. 2</a></th>
                                        <th class="mem-category mem-green"><a href="#">Κατ. 3</a></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><i class="icon gicon-producers-store-network"></i>ELPEN AE</td>
                                        <td>Μεταποίηση</td>
                                        <td><i class="icon gicon-plants-check-mark"></i></td>
                                        <td><i class="icon gicon-plants-check-mark"></i></td>
                                        <td></td>
                                        <td></td>
                                        <td><i class="icon gicon-plants-check-mark"></i></td>
                                    </tr>
                                    <tr>
                                        <td><i class="icon gicon-faq-home"></i>MEAT FAMILY IKE/ΗΛΙΟΥΠΟΛΗ</td>
                                        <td>Αποτέφρωση</td>
                                        <td><i class="icon gicon-plants-check-mark"></i></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td><i class="icon gicon-plants-check-mark"></i></td>
                                    </tr>
                                    <tr>
                                        <td><i class="icon gicon-producers-store-network"></i>ELPEN AE</td>
                                        <td>Λιπασματοποίηση</td>
                                        <td><i class="icon gicon-plants-check-mark"></i></td>
                                        <td><i class="icon gicon-plants-check-mark"></i></td>
                                        <td></td>
                                        <td></td>
                                        <td><i class="icon gicon-plants-check-mark"></i></td>
                                    </tr>
                                    <tr>
                                        <td><i class="icon gicon-faq-home"></i>MEAT FAMILY IKE/ΗΛΙΟΥΠΟΛΗ</td>
                                        <td>Μεταποίηση</td>
                                        <td></td>
                                        <td><i class="icon gicon-plants-check-mark"></i></td>
                                        <td></td>
                                        <td><i class="icon gicon-plants-check-mark"></i></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td><i class="icon gicon-producers-store-network"></i>ELPEN AE</td>
                                        <td>Αποτέφρωση</td>
                                        <td><i class="icon gicon-plants-check-mark"></i></td>
                                        <td></td>
                                        <td><i class="icon gicon-plants-check-mark"></i></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td><i class="icon gicon-faq-home"></i>MEAT FAMILY IKE/ΗΛΙΟΥΠΟΛΗ</td>
                                        <td>Λιπασματοποίηση</td>
                                        <td><i class="icon gicon-plants-check-mark"></i></td>
                                        <td></td>
                                        <td></td>
                                        <td><i class="icon gicon-plants-check-mark"></i></td>
                                        <td><i class="icon gicon-plants-check-mark"></i></td>
                                    </tr>
                                    <tr>
                                        <td><i class="icon gicon-producers-store-network"></i>ELPEN AE</td>
                                        <td>Αποτέφρωση</td>
                                        <td></td>
                                        <td></td>
                                        <td><i class="icon gicon-plants-check-mark"></i></td>
                                        <td></td>
                                        <td><i class="icon gicon-plants-check-mark"></i></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="tab-pagination pull-left">
                            <a href="#" class="tab-arrow-left"><i class="icon gicon-arrow-down"></i></a>
                            <span>1/18</span>
                            <a href="#" class="tab-arrow-right"><i class="icon gicon-arrow-down"></i></a>
                        </div>
                        <div class="buttons pull-right">
                            <div class="btn-orange"><a href="#"><i class="icon gicon-print"></i>ΕΚΤΥΠΩΣΗ</a></div>
                            <div class="btn-red"><a href="#"><i class="icon gicon-export"></i>ΕΞΑΓΩΓΗ</a></div>
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

    })
</script>
@endsection