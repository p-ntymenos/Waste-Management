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
    $('#stat-map').highcharts('Map',

        {
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
                    return '<table> <thead> <tr> <th>' + this.point.name + '</th> <th></th> </tr></thead> <thead> <tr> <th>Σύνολο ΖΥΠ</th><th>2.699,56 tn</th></tr></thead> <tbody> <tr> <td>κατηγορία 1 (1,82%)</td><td>49,13 tn</td></tr><tr> <td>κατηγορία 2 (4,62%)</td><td>124,82 tn</td></tr><tr> <td>κατηγορία 3 (25,21%)</td><td>680,61 tn</td></tr><tr> <td>Λάσπη (67,17%)</td><td>1.813,28 tn</td></tr><tr> <td>Φυτικά (1,17%)</td><td>31,72 tn</td></tr></tbody></table>'
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
                    stickyTracking: false,
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
});