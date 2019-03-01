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