$(function () {
    
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
            data: [{
                name: "Ίδρυσης, Οργάνωσης, Διαχείρισης & Λειτουργίας ΒΙ.ΠΕ (56%) ",
                y: 56
            }, {
                name: "Μεγάλες Αλυσίδες Supermarkets (9%)",
                y: 9
            }, {
                name: "Εμπορία Λιπασμάτων (11%)",
                y: 11
            }, {
                name: "Εμπορική & Βιομηχανική Εταιρεία Γάλακτος (6%)",
                y: 6
            }, {
                name: "Λοιπές (9%)",
                y: 9
            }]
        }]
    });
});