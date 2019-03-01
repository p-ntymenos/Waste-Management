<<<<<<< HEAD
=======
function getUrlParameter(sParam) {
    var sPageURL = decodeURIComponent(window.location.search.substring(1)),
        sURLVariables = sPageURL.split('&'),
        sParameterName,
        i;

    for (i = 0; i < sURLVariables.length; i++) {
        sParameterName = sURLVariables[i].split('=');

        if (sParameterName[0] === sParam) {
            return sParameterName[1] === undefined ? true : sParameterName[1];
        }
    }
};


>>>>>>> newGorilla
function calcPercentage(cur,total,general){
    var rvalue = '';
    if(general == 1){
        rvalue = Highcharts.numberFormat(parseFloat((cur*100)/total),1,',','.')+'%';
        //output percentage for css px 32.4% k oxi 32,4%
    }else if(general == 2){
        rvalue = Highcharts.numberFormat(parseFloat((cur*100)/total),1,'.','.')+'%';
    }else{
        rvalue = "("+Highcharts.numberFormat(parseFloat((cur*100)/total), 2, ',','.')+"%)";
    }
    return rvalue;
}
<<<<<<< HEAD
var basePath = "http://localhost/gorillaApp/public/"
=======
var basePath = "/gorillaApp/public/"
>>>>>>> newGorilla
/**
*   function Main Chart
*   params @year = the year to filter data
*   Get All Data for main chart via Ajax request and then call the apropriate chart function
**/
function getAndBuildMainChart(year,district){
    $.getJSON(basePath+'getdata/mainChartData/'+year, function( dataArray ) {
        buildMainChart(dataArray);

        $('#mTotalQTY').text(dataArray.totalQTY);
        $('#mTotalProducers').text(dataArray.totalProducers);
        //get sum qty per category
        $('#mSumKat1 .labelC').text(dataArray.categoriesSUM[0].descr);
        $('#mSumKat2 .labelC').text(dataArray.categoriesSUM[1].descr);
        $('#mSumKat3 .labelC').text(dataArray.categoriesSUM[2].descr);
        $('#mSumKat4 .labelC').text(dataArray.categoriesSUM[3].descr);
        $('#mSumKat5 .labelC').text(dataArray.categoriesSUM[4].descr);

        $('#mSumKat1 .resultC').text(dataArray.categoriesSUM[0].sum);
        $('#mSumKat2 .resultC').text(dataArray.categoriesSUM[1].sum);
        $('#mSumKat3 .resultC').text(dataArray.categoriesSUM[2].sum);
        $('#mSumKat4 .resultC').text(dataArray.categoriesSUM[3].sum);
        $('#mSumKat5 .resultC').text(dataArray.categoriesSUM[4].sum);
    })



}
var months = ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec']
/**
*   function Build Main Chart
*   params @dataArray = all the requested data
*
**/
function buildMainChart(dataArray){
<<<<<<< HEAD
    lala=dataArray.xAxis;
    while(dataArray.ALL.length<12){
        dataArray.xAxis.push(months[dataArray.xAxis.length]);
        dataArray.ALL.push(0);
    }
    $('#mainchart').highcharts({
        chart:{backgroundColor:'none'},
=======
    var data = dataArray;
    latestAvailMonth = data.xAxis[data.xAxis.length-1];
    k=1;i=0;
    while (data.ALL.length < 12) {


        console.log(k);
        //data.xAxis.push(months[data.xAxis.length]);
        var year = parseInt(latestAvailMonth.split('<br>')[1]);

        if(months.indexOf(latestAvailMonth.split('<br>')[0])+k<12){

            data.xAxis.push(months[months.indexOf(latestAvailMonth.split('<br>')[0])+k]+"<br>"+year);
            k++;    
        }else{

            year ++; 
            data.xAxis.push(months[i]+"<br>"+year);
            i++;
        }


        data.ALL.push(0);
    }


    $('#stat-zyp').highcharts({
        credits: {
            enabled: false
        },
        chart: {
            plotBorderColor: '#fff'
        },
        title: {
            text: '',
            x: -20 //center
        },
        subtitle: {
            text: '',
            x: -20
        },
        xAxis: {
            categories: data.xAxis,
            labels: {
                style: {
                    color: '#242021',
                    'font-size': '12px',
                    'font-weight': '500'
                }
            },
            gridLineWidth: 1
        },
        yAxis: {
            title: {
                text: ''
            },
            labels: {
                formatter: function () {
                    return this.value / 1000 + ' K';
                },
                style: {
                    color: '#242021',
                    'font-size': '12px',
                    'font-weight': '500'
                }
            }
        },
>>>>>>> newGorilla
        tooltip: {
            backgroundColor: '#fff',
            borderColor: '#C8C8C8',
            borderRadius: 8,
            borderWidth: 1,
            useHTML: true,
            formatter: function () {
                cur = this;
<<<<<<< HEAD
                return  '<table style="width:255px;"><tr><td ><p style="font-size: 16px;" class="uxp-align-right wysiwyg-font-type-arial"><span style="color: rgb(197, 62, 62);">Σύνολο ΖΥΠ</span></p></t><td align="right"><p style="font-size: 16px;" class="wysiwyg-font-type-arial"><span style="font-weight: bold;">'+Highcharts.numberFormat(this.y, 2, ',','.')+' tn</span></p></td></tr></table>'
                    +'<table  cellpadding="20" style="width:255px;" >'
                    +'<tr><td width="50%" align="right">κατηγορία 1 '+calcPercentage(dataArray.category1[this.point.x],this.y)+'</td><td align="left" width="50%"><b>'+Highcharts.numberFormat(dataArray.category1[this.point.x], 2, ',','.')+' tn</b></td></tr>'
                    +'<tr><td width="50%" align="right">κατηγορία 2 '+calcPercentage(dataArray.category2[this.point.x],this.y)+'</td><td align="left" width="50%"><b>'+Highcharts.numberFormat(dataArray.category2[this.point.x], 2, ',','.')+' tn</b></td></tr>'
                    +'<tr><td width="50%" align="right">κατηγορία 3 '+calcPercentage(dataArray.category3[this.point.x],this.y)+'</td><td align="left" width="50%"><b>'+Highcharts.numberFormat(dataArray.category3[this.point.x], 2, ',','.')+' tn</b></td></tr>'
                    +'<tr><td width="50%" align="right">Λάσπη '+calcPercentage(dataArray.laspi[this.point.x],this.y)+'</td><td align="left" width="50%"><b>'+Highcharts.numberFormat(dataArray.laspi[this.point.x], 2, ',','.')+' tn</b></td></tr>'
                    +'<tr><td width="50%" align="right">Φυτικά '+calcPercentage(dataArray.fytika[this.point.x],this.y)+'</td><td align="left" width="50%"><b>'+Highcharts.numberFormat(dataArray.fytika[this.point.x], 2, ',','.')+' tn</b></td></tr>'
                    +'</table>';
            }
        },
        xAxis: {categories: dataArray.xAxis},
        series: [{showInLegend:false,name:'Συνολικό ΖΥΠ',marker:{radius:4},color: '#a83333',data: dataArray.ALL}]
=======
                return '<table> <thead> <tr> <th>Σύνολο ΖΥΠ</th> <th>' + Highcharts.numberFormat(this.y, 2, ',', '.') + ' tn</th> </tr></thead> <tbody> <tr> <td>κατηγορία 1 ' + calcPercentage(data.category1[this.point.x], this.y) + '</td><td>' + Highcharts.numberFormat(data.category1[this.point.x], 2, ',', '.') + ' tn</td></tr><tr> <td>κατηγορία 2 ' + calcPercentage(data.category2[this.point.x], this.y) + '</td><td>' + Highcharts.numberFormat(data.category2[this.point.x], 2, ',', '.') + ' tn</td></tr><tr> <td>κατηγορία 3 ' + calcPercentage(data.category3[this.point.x], this.y) + '</td><td>' + Highcharts.numberFormat(data.category3[this.point.x], 2, ',', '.') + ' tn</td></tr><tr> <td>Λάσπη ' + calcPercentage(data.laspi[this.point.x], this.y) + '</td><td>' + Highcharts.numberFormat(data.laspi[this.point.x], 2, ',', '.') + ' tn</td></tr><tr> <td>Φυτικά ' + calcPercentage(data.fytika[this.point.x], this.y) + '</td><td>' + Highcharts.numberFormat(data.fytika[this.point.x], 2, ',', '.') + ' tn</td></tr></tbody></table>';
            }

        },
        colors: ['#5287ac'],
        legend: {
            enabled: false,
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle',
            borderWidth: 0
        },
        series: [{
            type: 'line',
            dashStyle: 'Solid', //Solid, ShortDash, ShortDot, ShortDashDot, ShortDashDotDot, Dot, Dash, LongDash, DashDot, LongDashDot, LongDashDotDot
            marker: {
                fillColor: '#fff',
                lineWidth: 2,
                lineColor: '#5287ac',
                radius: 4,
                radiusPlus: 0,
                states: {
                    hover: {
                        fillColor: '#5287ac'
                    }
                }
            },
            name: 'Ποσότητα',
            data: data.ALL
        }]
>>>>>>> newGorilla
    });
}

//Bar - chart
function buildBarChart(dataArray){
    var labelsArray = Array();
    var valuesArray = Array();
<<<<<<< HEAD
    $.each(dataArray.temperature,function(i,v){
        labelsArray[i] = v.type;
        valuesArray[i] = parseInt(v.sum/1000);
    });
    $('#mainBarChart1').highcharts({
        colors: ['#D57373','#E09797'],
        chart: {
            type: 'column'
        },
        title: {
            text: 'Column chart with negative values'
        },
        xAxis: {
            categories: labelsArray
        },
=======
    $.each(dataArray.temperature, function (i, v) {
        labelsArray[i] = v.type;
        valuesArray[i] = parseInt(v.sum / 1000);
    });

    $('#stat-temperature').highcharts({
        chart: {
            type: 'column'
        },
        plotOptions: {
            column: {
                colorByPoint: true,
                colors: ["#85cbcf", "#3984b6", "#2c41a8"]
            }
        },
        title: {
            text: ''
        },
        xAxis: {
            title: {
                text: ''
            },
            labels: {
                style: {
                    color: '#242021',
                    'font-size': '12px',
                    'font-weight': '500'
                }
            },
            categories: labelsArray
        },
        yAxis: {
            title: {
                text: ''
            },
            labels: {
                formatter: function () {
                    return this.value / 1000 + ' K';
                },
                style: {
                    color: '#242021',
                    'font-size': '12px',
                    'font-weight': '500'
                },
            }
        },
>>>>>>> newGorilla
        credits: {
            enabled: false
        },
        tooltip: {
            backgroundColor: '#fff',
            borderColor: '#C8C8C8',
            borderRadius: 8,
            borderWidth: 1,
            useHTML: true,
            formatter: function () {
<<<<<<< HEAD
                cur = this;
                return  '<table style="width:100px;"><tr><td align="center"><p style="font-size: 14px;" class="uxp-align-center wysiwyg-font-type-arial">'+this.x+'</p></td></tr></table>'
                        +'<table  cellpadding="20" style="width:100px;" >'
                        +'<tr><td align="center" ><p style="font-size: 20px;" class="uxp-align-center wysiwyg-font-type-arial"><span style="font-weight: bold;">'+this.y+' tn</span></p></td></tr>'
                        +'</table>';
            }
        }
        ,
        series: [{
            showInLegend:false,
=======
                return '<table> <thead> <tr> <th>' + this.x + '</th> </tr></thead> <tbody> <tr> <td>' + this.y + ' tn</td></tr></tbody></table>';
            }
        },
        series: [{
            showInLegend: false,
>>>>>>> newGorilla
            name: 'Ποσότητα',
            data: valuesArray
        }]
    });

}
<<<<<<< HEAD
//pie chart
function buildPieChart(){
    $('#mainBarChart2')
        .highcharts({
        colors: ['#CDCCCC', '#CDCCCC', '#F2F1F1'],
=======

//pie chart
function buildPieChart(dataGlob){
    $('#stat-material').highcharts({
        colors: ['#54c6db', '#3eacc0', '#3eacc0', '#1b8ea3', '#217f8c'],
>>>>>>> newGorilla
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
<<<<<<< HEAD
        title: {
            text: 'Browser market shares January, 2015 to May, 2015'
=======
        credits: {
            enabled: false
        },
        title: {
            text: ''
>>>>>>> newGorilla
        },
        tooltip: {
            backgroundColor: '#fff',
            borderColor: '#C8C8C8',
            borderRadius: 8,
            borderWidth: 1,
            useHTML: true,
            formatter: function () {
                cur = this;
<<<<<<< HEAD
                return  '<table style="width:100px;"><tr><td align="center"><p style="font-size: 14px;" class="uxp-align-center wysiwyg-font-type-arial">'+this.key+'</p></td></tr></table>'
                        +'<table  cellpadding="20" style="width:100px;" >'
                        +'<tr><td align="center" ><p style="font-size: 20px;" class="uxp-align-center wysiwyg-font-type-arial"><span style="font-weight: bold;">'+this.y+' tn</span></p></td></tr>'
                        +'</table>';
            }
        }
        ,
=======
                return '<table><thead><tr><th>' + this.key + '</th></tr></thead><tbody><tr><td>' + this.y + ' %</td></tr></tbody></table>';
            }
        },
>>>>>>> newGorilla
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: false
                },
<<<<<<< HEAD
                showInLegend: true
            }
        },legend: {
            align: 'right',
            layout: 'vertical',
            verticalAlign: 'top',
            itemMarginBottom: 10,
            symbolRadius:10,
            symbolWidth:20,
            symbolHeight:20,
            verticalAlign:"top",
            x: 0,
            y: 100
=======
                showInLegend: true,
                startAngle: "-90",
                endAngle: "270"
            }
        },
        legend: {
            align: 'right',
            layout: 'vertical',
            verticalAlign: 'middle',
            itemMarginBottom: 15,
            itemStyle: {
                "font-size": "12px",
                "font-weight": "500"
            },
            symbolRadius: 0,
            symbolWidth: 15,
            symbolHeight: 15
>>>>>>> newGorilla
        },
        series: [{
            name: "Είδος Υλικού",
            colorByPoint: true,
<<<<<<< HEAD
            data: [{
                name: "Λάσπη ",
                y: 56.33
            }, {
                name: "Γαλακτοκομικά",
                y: 24.03,
                sliced: true,
                selected: true
            }, {
                name: "Τρόφιμα",
                y: 10.38
            }, {
                name: "Νεκρά Ζώα",
                y: 4.97
            }, {
                name: "Λοιπές",
=======
            data:dataGlob.material
            //            data: [{
            //                name: "Λάσπη ",
            //                y: 56.33
            //            }, {
            //                name: "Γαλακτοκομικά",
            //                y: 24.03
            //            }, {
            //                name: "Τρόφιμα",
            //                y: 10.38
            //            }, {
            //                name: "Νεκρά Ζώα",
            //                y: 4.97
            //            }, {
            //                name: "Λοιπές",
            //                y: 0.91
            //            }]
        }]
    });
}

function buildPieChartProcess(){

    var autoHeight = 310;
    var autoAlign = 'right';
    var autoVAlign = 'middle';
    if($(window).width()<=420){
        autoHeight = 400;
        autoAlign = 'center';
        autoVAlign = 'bottom';
    }

    $('#stat-material2').highcharts({
        colors: ['#54c6db', '#3eacc0', '#3eacc0', '#1b8ea3', '#217f8c'],
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie',
            height: autoHeight,
        },
        credits: {
            enabled: false
        },
        title: {
            text: ''
        },
        tooltip: {
            backgroundColor: '#fff',
            followPointer: false,
            borderColor: '#C8C8C8',
            borderRadius: 8,
            borderWidth: 1,
            useHTML: true,
            formatter: function () {
                cur = this;
                return '<table><thead><tr><th>' + this.key + '</th></tr></thead><tbody><tr><td>' + this.y + ' tn</td></tr></tbody></table>';
            }
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: false
                },
                showInLegend: true
            }
        },
        legend: {
            enabled: true,
            align: autoAlign,
            layout: 'vertical',
            verticalAlign: autoVAlign,
            itemMarginBottom: 15,
            itemStyle: {
                "font-size": "12px",
                "font-weight": "500"
            },
            symbolRadius: 0,
            symbolWidth: 15,
            symbolHeight: 15
        },
        series: [{
            point: {
                events: {
                    legendItemClick: function () {
                        return false; // <== returning false will cancel the default action
                    }
                }
            },
            name: "Είδος Υλικού",
            colorByPoint: true,
            data: [{
                name: "Αποτέφρωση (62%)",
                y: 56.33
            }, {
                name: "Θερμική Αδρ. (11%)",
                y: 24.03
            }, {
                name: "Συναποτέφρωση (19%)",
                y: 10.38
            }, {
                name: "Παρ. Ζωοτροφών (6%)",
                y: 4.97
            }, {
                name: "Λοιπές (9%)",
>>>>>>> newGorilla
                y: 0.91
            }]
        }]
    });

<<<<<<< HEAD

}



=======
}

>>>>>>> newGorilla
// Main navigation collapse
function mainNav(){
    var accordionsMenu = $('.cd-accordion-menu');
    if( accordionsMenu.length > 0 ) {
        accordionsMenu.each(function(){
            var accordion = $(this);
            //detect change in the input[type="checkbox"] value
            accordion.on('change', 'input[type="checkbox"]', function(){
                var checkbox = $(this);
                //console.log(checkbox.prop('checked'));
                (checkbox.prop('checked')) ? checkbox.siblings('ul')
                    .attr('style', 'display:none;')
                    .slideDown(300) : checkbox.siblings('ul')
                    .attr('style', 'display:block;')
                    .slideUp(300);
            });
        });
    }
}
// Get Height for right side and append it to left side
function getHeightForCols(){
    setTimeout(function(){
        var rightH = $('#rightSideHeight').height();
        if($(window).width() >= 768) {
            $('#leftSideHeight').css('min-height',rightH+'px');
        }
    },50);
}

$(window).load(function(){
    getHeightForCols();
});

<<<<<<< HEAD


//katasxesi kai syskeyasia
function getConfiscation(data){
        $('.katasxesi .mprogressa').attr({'data-original-title':'<p>'+data[1][0]+'<br/><span class="blockTitle">'+data[1][1]+' tn</span><br/>'+calcPercentage(data[1][1],data[2][1],0)+'</p>'});
        $('.katasxesi .mprogressb').attr({'data-original-title':'<p>'+data[0][0]+'<br/><span class="blockTitle">'+data[0][1]+' tn</span><br/>'+calcPercentage(data[0][1],data[2][1],0)+'</p>'});
        $('.katasxesi .mprogressa').css({'width':calcPercentage(data[1][1],data[2][1],2)});
        $('.katasxesi .mprogressb').css({'width':calcPercentage(data[0][1],data[2][1],2)});

        $('.katasxesi .mprogressatnFL').text(data[1][0]);
        $('.katasxesi .mprogressatnFR').text(data[0][0]);
        $('.katasxesi .mprogressatnL').text(data[1][1]+' tn');
        $('.katasxesi .mprogressatnPL').text(calcPercentage(data[1][1],data[2][1],1));
        $('.katasxesi .mprogressatnR').text(data[0][1]+' tn');
        $('.katasxesi .mprogressatnPR').text(calcPercentage(data[0][1],data[2][1],1));
=======
//katasxesi kai syskeyasia
function getConfiscation(data){
    $('.katasxesi .mprogressa').attr({'data-original-title':'<p>'+data[1][0]+'<br/><span class="blockTitle">'+data[1][1]+' tn</span><br/>'+calcPercentage(data[1][1],data[2][1],0)+'</p>'});
    $('.katasxesi .mprogressb').attr({'data-original-title':'<p>'+data[0][0]+'<br/><span class="blockTitle">'+data[0][1]+' tn</span><br/>'+calcPercentage(data[0][1],data[2][1],0)+'</p>'});
    $('.katasxesi .mprogressa').css({'width':calcPercentage(data[1][1],data[2][1],2)});
    $('.katasxesi .mprogressb').css({'width':calcPercentage(data[0][1],data[2][1],2)});

    $('.katasxesi .mprogressatnFL').text(data[1][0]);
    $('.katasxesi .mprogressatnFR').text(data[0][0]);
    $('.katasxesi .mprogressatnL').text(data[1][1]+' tn');
    $('.katasxesi .mprogressatnPL').text(calcPercentage(data[1][1],data[2][1],1));
    $('.katasxesi .mprogressatnR').text(data[0][1]+' tn');
    $('.katasxesi .mprogressatnPR').text(calcPercentage(data[0][1],data[2][1],1));
>>>>>>> newGorilla
}

function getPackaging(data){

<<<<<<< HEAD
        $('.syskevasia .mprogressa').attr({'data-original-title':'<p>'+data[0][0]+'<br/><span class="blockTitle">'+data[0][1]+' tn</span><br/>'+calcPercentage(data[0][1],data[2][1],0)+'</p>'});
        $('.syskevasia .mprogressb').attr({'data-original-title':'<p>'+data[1][0]+'<br/><span class="blockTitle">'+data[1][1]+' tn</span><br/>'+calcPercentage(data[1][1],data[2][1],0)+'</p>'});
        $('.syskevasia .mprogressa').css({'width':calcPercentage(data[0][1],data[2][1],2)});
        $('.syskevasia .mprogressb').css({'width':calcPercentage(data[1][1],data[2][1],2)});

        $('.syskevasia .mprogressatnFL').text(data[1][0]);
        $('.syskevasia .mprogressatnL').text(data[1][1]+' tn');
        $('.syskevasia .mprogressatnPL').text(calcPercentage(data[1][1],data[2][1],1));
        $('.syskevasia .mprogressatnFR').text(data[0][0]);
        $('.syskevasia .mprogressatnR').text(data[0][1]+' tn');
        $('.syskevasia .mprogressatnPR').text(calcPercentage(data[0][1],data[2][1],1));
    }

//on document ready fire event
$(document).ready(function () {


    //left navigation adjustment of height etc
    mainNav();


    //change year filter dropdown
    /* $('#filterPeriodos a').on('click',function(){
        getAndBuildMainChart($(this).data('val'));
        buildBarChart();
        buildPieChart();

        $('#dropdownMenu1').html($(this).text()+'<span class="caret"></span>');

    });*/


    /*
    $.getJSON('getdata/?action=3&year=2014',function(data){
        $('.katasxesi .mprogressa').attr({'data-original-title':'<p>'+data[1][0]+'<br/><span class="blockTitle">'+data[1][1]+' tn</span><br/>'+calcPercentage(data[1][1],data[2][1],0)+'</p>'});
        $('.katasxesi .mprogressb').attr({'data-original-title':'<p>'+data[0][0]+'<br/><span class="blockTitle">'+data[0][1]+' tn</span><br/>'+calcPercentage(data[0][1],data[2][1],0)+'</p>'});
        $('.katasxesi .mprogressa').css({'width':calcPercentage(data[1][1],data[2][1],2)});
        $('.katasxesi .mprogressb').css({'width':calcPercentage(data[0][1],data[2][1],2)});

        $('.katasxesi .mprogressatnFL').text(data[1][0]);
        $('.katasxesi .mprogressatnFR').text(data[0][0]);
        $('.katasxesi .mprogressatnL').text(data[1][1]+' tn');
        $('.katasxesi .mprogressatnPL').text(calcPercentage(data[1][1],data[2][1],1));
        $('.katasxesi .mprogressatnR').text(data[0][1]+' tn');
        $('.katasxesi .mprogressatnPR').text(calcPercentage(data[0][1],data[2][1],1));
    });

    $.getJSON('getdata/?action=4&year=2014',function(data){
        $('.syskevasia .mprogressa').attr({'data-original-title':'<p>'+data[0][0]+'<br/><span class="blockTitle">'+data[0][1]+' tn</span><br/>'+calcPercentage(data[0][1],data[2][1],0)+'</p>'});
        $('.syskevasia .mprogressb').attr({'data-original-title':'<p>'+data[1][0]+'<br/><span class="blockTitle">'+data[1][1]+' tn</span><br/>'+calcPercentage(data[1][1],data[2][1],0)+'</p>'});
        $('.syskevasia .mprogressa').css({'width':calcPercentage(data[0][1],data[2][1],2)});
        $('.syskevasia .mprogressb').css({'width':calcPercentage(data[1][1],data[2][1],2)});

        $('.syskevasia .mprogressatnFL').text(data[1][0]);
        $('.syskevasia .mprogressatnL').text(data[1][1]+' tn');
        $('.syskevasia .mprogressatnPL').text(calcPercentage(data[1][1],data[2][1],1));
        $('.syskevasia .mprogressatnFR').text(data[0][0]);
        $('.syskevasia .mprogressatnR').text(data[0][1]+' tn');
        $('.syskevasia .mprogressatnPR').text(calcPercentage(data[0][1],data[2][1],1));
    });
*/




    //insignificant functions to hide staftt
    //$('.highcharts-title').hide();
    //$('.highcharts-button').hide();
    //$('text[text-anchor="end"]:contains("Highcharts.com")').hide();


    /*
    months      = ['Ιαν', 'Φεβ', 'Μάρ', 'Απρ', 'Μαι', 'Ιουν', 'Ιουλ', 'Αυγ', 'Σεπ', 'Οκτ', 'Νοε', 'Δεκ'];
    katigories  =  [];*/

=======
    $('.syskevasia .mprogressa').attr({'data-original-title':'<p>'+data[0][0]+'<br/><span class="blockTitle">'+data[0][1]+' tn</span><br/>'+calcPercentage(data[0][1],data[2][1],0)+'</p>'});
    $('.syskevasia .mprogressb').attr({'data-original-title':'<p>'+data[1][0]+'<br/><span class="blockTitle">'+data[1][1]+' tn</span><br/>'+calcPercentage(data[1][1],data[2][1],0)+'</p>'});
    $('.syskevasia .mprogressa').css({'width':calcPercentage(data[0][1],data[2][1],2)});
    $('.syskevasia .mprogressb').css({'width':calcPercentage(data[1][1],data[2][1],2)});

    $('.syskevasia .mprogressatnFL').text(data[1][0]);
    $('.syskevasia .mprogressatnL').text(data[1][1]+' tn');
    $('.syskevasia .mprogressatnPL').text(calcPercentage(data[1][1],data[2][1],1));
    $('.syskevasia .mprogressatnFR').text(data[0][0]);
    $('.syskevasia .mprogressatnR').text(data[0][1]+' tn');
    $('.syskevasia .mprogressatnPR').text(calcPercentage(data[0][1],data[2][1],1));
}


function getMainPieChart(mdata){

    var autoHeight = 400;
    var autoAlign = 'right';
    var autoVAlign = 'middle';
    var autoFSize = '14px';
    var autoFWeight = '600';
    if($(window).width()<=670){
        autoHeight = 400;
        autoAlign = 'center';
        autoVAlign = 'bottom';
        autoFSize = '9px';
        autoFWeight = '500';
    }

    $('#stat-paragogoi').highcharts({
        colors: ['#54c6db', '#3eacc0', '#3eacc0', '#1b8ea3', '#217f8c'],
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie',
            height: autoHeight
        },
        credits: {
            enabled: false
        },
        title: {
            text: ''
        },
        tooltip: {
            backgroundColor: '#fff',
            followPointer: false,
            borderColor: '#C8C8C8',
            borderRadius: 8,
            borderWidth: 1,
            style:{
                width: "220px"
            },
            useHTML: true,
            formatter: function () {
                return '<table><thead><tr><th>' + this.key + '</th></tr></thead><tbody><tr><td>' + this.y + ' tn</td></tr></tbody></table>';
            }
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: false
                },
                showInLegend: true,
                startAngle: "-90",
                endAngle: "270"
            }
        },
        legend: {
            align: autoAlign,
            layout: 'vertical',
            verticalAlign: autoVAlign,
            itemMarginBottom: 15,
            itemStyle: {
                "font-size": autoFSize,
                "font-weight": autoFWeight
            },
            symbolRadius: 0,
            symbolWidth: 15,
            symbolHeight: 15
        },
        series: [{
            point: {
                events: {
                    legendItemClick: function () {
                        return false; // <== returning false will cancel the default action
                    }
                }
            },
            name: "Είδος Υλικού",
            colorByPoint: true,
            data: mdata
        }]
    });

}

function getRegionsMapChart(mdata){

    // Prepare demo data

    dataMapRegions = [
        {
            "hc-key": "gr-as","hckey": "gr-as"
        },
        {
            "hc-key": "gr-ii","hckey": "gr-ii"
        },
        {
            "hc-key": "gr-at","hckey": "gr-at"
        },
        {
            "hc-key": "gr-pp","hckey": "gr-pp"
        },
        {
            "hc-key": "gr-ts","hckey": "gr-ts"
        },
        {
            "hc-key": "gr-an","hckey": "gr-an"
        },
        {
            "hc-key": "gr-gc","hckey": "gr-gc"
        },
        {
            "hc-key": "gr-cr","hckey": "gr-cr"
        },
        {
            "hc-key": "gr-mc","hckey": "gr-mc"
        },
        {
            "hc-key": "gr-ma","hckey": "gr-ma"
        },
        {
            "hc-key": "gr-mt","hckey": "gr-mt"
        },
        {
            "hc-key": "gr-gw","hckey": "gr-gw"
        },
        {
            "hc-key": "gr-mw","hckey": "gr-mw"
        },
        {
            "hc-key": "gr-ep","hckey": "gr-ep"
        }
    ];

    // Initiate the chart
    mapChart = $('#stat-map').highcharts('Map',{

        title: {
            text: ''
        },
        credits: {
            enabled: false
        },
        mapNavigation: {
            enableButtons: false,
            enableDoubleClickZoomTo: false,
            enableMouseWheelZoom: false,
            enabled: false,
        },
        series: [{
            type: "map",
            borderColor: "#fff",
            color: "#c9d9e5",
            cursor: "pointer",
            data: dataMapRegions,
            enableMouseTracking: true,
            joinBy: 'hc-key',
            mapData: Highcharts.maps['countries/gr/gr-all'],
            shadow: false,
            states: {
                hover: {
                    color: '#5287ad'
                }
            },
            dataLabels: {
                enabled: false,
                format: '{point.name}'
            }
        }],
        tooltip: {
            enabled: false,
            followTouchMove: false,
            followPointer: false,
            backgroundColor: '#fff',
            borderColor: '#C8C8C8',
            borderRadius: 8,
            borderWidth: 1,
            useHTML: true,
            formatter: function () {

                var lp = this.point.hckey;

                console.log(this);

                thispoint = $.grep(regionsData, function(e){ return e.code == lp; });
                console.log(thispoint[0].perifereia);
                return '<table> <thead> <tr> <th>' + thispoint[0].perifereia + '</th> <th></th> </tr></thead> <thead> <tr> <th>Σύνολο ΖΥΠ </th><th>     '+thispoint[0].qty+' tn</th></tr></thead> <tbody> <tr> <td>Κατηγορία 1 </td><td>'+thispoint[0].category1+' tn</td></tr><tr> <td>Κατηγορία 2 </td><td>'+thispoint[0].category2+' tn</td></tr><tr> <td>Κατηγορία 3 </td><td>'+thispoint[0].category3+' tn</td></tr><tr> <td>Λάσπη</td><td>'+thispoint[0].laspi+' tn</td></tr><tr> <td>Φυτικά</td><td>'+thispoint[0].fytika+' tn</td></tr></tbody></table>'
            }
        },
        legend: {
            enabled: false
        },
        chart: {
            events: {
                load: function(){
                    this.myTooltip = new Highcharts.Tooltip(this, this.options.tooltip);                    


                }
            }
        },
        plotOptions: {
            series: {
                stickyTracking: true,
                events: {
                    click: function(evt) {
                        this.chart.myTooltip.refresh(evt.point, evt);
                    },
                    mouseOut: function() {
                        this.chart.myTooltip.hide();
                    }                       
                }           
            }
        }
    });

    //console.log($('#stat-map').attr('data-currentRegion'));

    if($('#stat-map').attr('data-currentRegion')){
        thisRegion = $.grep(mapChart.highcharts().series[0].data, function(e){ return e.hckey== $('#stat-map').attr('data-currentRegion'); });
        thisRegion[0].setState('hover');
    }

}

//on document ready fire event
$(document).ready(function () {

    //left navigation adjustment of height etc
    mainNav();
>>>>>>> newGorilla
    $('.mprogress>div').tooltip({html:true});

    /*
        hide highcharts labels for non compercial use
    */
    setTimeout(function(){$('text:contains("Highcharts")').hide()},1000);

});

<<<<<<< HEAD
=======


/*High maps demo*/

$(function () {

    // Prepare demo data
    var dataMapRegions = [
        {
            "hc-key": "gr-as"
        },
        {
            "hc-key": "gr-ii"
        },
        {
            "hc-key": "gr-at"
        },
        {
            "hc-key": "gr-pp"
        },
        {
            "hc-key": "gr-ts"
        },
        {
            "hc-key": "gr-an"
        },
        {
            "hc-key": "gr-gc"
        },
        {
            "hc-key": "gr-cr"
        },
        {
            "hc-key": "gr-mc"
        },
        {
            "hc-key": "gr-ma"
        },
        {
            "hc-key": "gr-mt"
        },
        {
            "hc-key": "gr-gw"
        },
        {
            "hc-key": "gr-mw"
        },
        {
            "hc-key": "gr-ep"
        }
    ];

    // Initiate the chart
    if($('#maincRegionsMap').length>0){
        $('#maincRegionsMap').highcharts('Map',{
            allAreas: false,
            mapNavigation: {
                enabled: false,
                buttonOptions: {
                    verticalAlign: 'bottom'
                }
            },
            colorAxis: {
                min: 0
            },
            legend: {
                enabled: false
            },
            series : [{
                color:"#ddd",
                data : dataMapRegions,
                mapData: Highcharts.maps['countries/gr/gr-all'],
                joinBy: 'hc-key',
                name: 'Random data',
                states: {
                    hover: {
                        color: '#a83333'
                    }
                },
                dataLabels: {
                    enabled: true,
                    format: '{point.name}'
                }
            }]

        });
    }
});
>>>>>>> newGorilla
