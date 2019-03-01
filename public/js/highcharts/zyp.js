$(function () {

    function calcPercentage(cur, total, general) {
        var rvalue = '';
        if (general == 1) {
            rvalue = Highcharts.numberFormat(parseFloat((cur * 100) / total), 1, ',', '.') + '%';
            //output percentage for css px 32.4% k oxi 32,4%
        } else if (general == 2) {
            rvalue = Highcharts.numberFormat(parseFloat((cur * 100) / total), 1, '.', '.') + '%';
        } else {
            rvalue = "(" + Highcharts.numberFormat(parseFloat((cur * 100) / total), 2, ',', '.') + "%)";
        }
        return rvalue;
    }


    while (data.ALL.length < 12) {
        data.xAxis.push(months[data.xAxis.length]);
        data.ALL.push(0);
    }
    
    var autoHeight = 400;
    if($(window).width()<=420){
        autoHeight = 200;
    }


    $('#stat-zyp').highcharts({
        credits: {
            enabled: false
        },
        chart: {
            plotBorderColor: '#fff',
            height: autoHeight
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
            formatter: function () {
                return data.xAxis;
            },
            categories: data.xAxis,
            labels: {
                style: {
                    color: '#242021',
                    'font-size': '12px',
                    'font-weight': '500'
                },
                autoRotation: [-90],
                autoRotationLimit: 80
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
        tooltip: {
            backgroundColor: '#fff',
            borderColor: '#C8C8C8',
            borderRadius: 8,
            borderWidth: 1,
            useHTML: true,
            formatter: function () {
                return '<table> <thead> <tr> <th>Σύνολο ΖΥΠ</th> <th>' + Highcharts.numberFormat(this.y, 2, ',', '.') + ' tn</th> </tr></thead> <tbody> <tr> <td>κατηγορία 1 ' + calcPercentage(data.category1[this.point.x], this.y) + '</td><td>' + Highcharts.numberFormat(data.category1[this.point.x], 2, ',', '.') + ' tn</td></tr><tr> <td>κατηγορία 2 ' + calcPercentage(data.category2[this.point.x], this.y) + '</td><td>' + Highcharts.numberFormat(data.category2[this.point.x], 2, ',', '.') + ' tn</td></tr><tr> <td>κατηγορία 3 ' + calcPercentage(data.category3[this.point.x], this.y) + '</td><td>' + Highcharts.numberFormat(data.category3[this.point.x], 2, ',', '.') + ' tn</td></tr><tr> <td>Λάσπη ' + calcPercentage(data.laspi[this.point.x], this.y) + '</td><td>' + Highcharts.numberFormat(data.laspi[this.point.x], 2, ',', '.') + ' tn</td></tr><tr> <td>Φυτικά ' + calcPercentage(data.fytika[this.point.x], this.y) + '</td><td>' + Highcharts.numberFormat(data.fytika[this.point.x], 2, ',', '.') + ' tn</td></tr></tbody></table>';
            }

        },
        plotOptions:{
            line:{
                cursor: 'pointer'
            },
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
    });
});