var labelsArray = Array();
var valuesArray = Array();
$.each(data.temperature, function (i, v) {
    labelsArray[i] = v.type;
    valuesArray[i] = parseInt(v.sum / 1000);
});



$(function () {
    var autoHeight = 400;
    if($(window).width()<=420){
        autoHeight = 200;
    }
    $('#stat-temperature').highcharts({
        chart: {
            type: 'column',
            height: autoHeight
        },
        plotOptions: {
            column: {
                colorByPoint: true,
                colors: ["#85cbcf", "#3984b6", "#2c41a8"],
                cursor: "pointer"
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
                return '<table> <thead> <tr> <th>' + this.x  + ' (50%)</th> </tr></thead> <tbody> <tr> <td>' + this.y + ' tn</td></tr></tbody></table>';
            }
        },
        series: [{
            showInLegend: false,
            name: 'Ποσότητα',
            data: valuesArray
        }]
    });
});