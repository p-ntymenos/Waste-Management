$(function () {
    
    var autoAlign = 'right';
    var autoVAlign = 'middle';
    if($(window).width()<=420){
        autoAlign = 'center';
        autoVAlign = 'bottom';
    }
    
    $('#stat-material').highcharts({
        colors: ['#54c6db', '#3eacc0', '#3eacc0', '#1b8ea3', '#217f8c'],
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie',
            height: 400
        },
        credits: {
            enabled: false
        },
        title: {
            text: ''
        },
        tooltip: {
            backgroundColor: '#fff',
            borderColor: '#C8C8C8',
            borderRadius: 8,
            borderWidth: 1,
            followPointer: false,
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
            },
            series: {
                stickyTracking: false
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
            symbolHeight: 15,
            itemHoverStyle:{
//                cursor: "default"
            }
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
                name: "Λάσπη (56%)",
                y: 56.33
            }, {
                name: "Γαλακτοκομικά (19%)",
                y: 24.03
            }, {
                name: "Τρόφιμα (11%)",
                y: 10.38
            }, {
                name: "Νεκρά Ζώα (6%)",
                y: 4.97
            }, {
                name: "Λοιπές (9%)",
                y: 0.91
            }]
        }]
    });
});