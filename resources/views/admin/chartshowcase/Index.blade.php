@include('./../../layouts/sidebar');


<!-- main container -->
<div class="content">

    <div class="container-fluid">
        <div id="pad-wrapper">
            <!-- morris stacked chart -->
            <div class="row-fluid">
                <h4 class="title">Morris.js stacked</h4>
                <div class="span12">
                    <h5>Quarterly Apple iOS device unit sales</h5>
                    <br />
                    <div id="hero-area" style="height: 250px;"></div>
                </div>
            </div>

            <!-- morris graph chart -->
            <div class="row-fluid section">
                <h4 class="title">Morris.js <small>Monthly growth</small></h4>
                <div class="span12 chart">
                    <div id="hero-graph" style="height: 230px;"></div>
                </div>
            </div>

            <!-- jQuery flot chart -->
            <div class="row-fluid section">
                <h4 class="title">
                    jQuery Flot <small>Monthly growth</small>
                    <div class="btn-group pull-right">
                        <button class="glow left">DAY</button>
                        <button class="glow middle active">MONTH</button>
                        <button class="glow right">YEAR</button>
                    </div>
                </h4>
                <div class="span12">
                    <div id="statsChart"></div>
                </div>
            </div>

            <!-- morris bar & donut charts -->
            <div class="row-fluid section">
                <h4 class="title">
                    Morris.js
                </h4>
                <div class="span6 chart">
                    <h5>Devices sold</h5>
                    <div id="hero-bar" style="height: 250px;"></div>
                </div>
                <div class="span5 chart">
                    <h5>Month traffic</h5>
                    <div id="hero-donut" style="height: 250px;"></div>
                </div>
            </div>

            <!-- jQuery knobs -->
            <div class="row-fluid section">
                <h4 class="title">jQuery Knob</h4>
                <div class="row-fluid">
                    <div class="span3">
                        <input type="text" value="50" class="knob second" data-thickness=".3" data-inputcolor="#333" data-fgcolor="#30a1ec" data-bgcolor="#d4ecfd" data-width="140" />
                    </div>
                    <div class="span3">
                        <input type="text" value="75" class="knob second" data-thickness=".3" data-inputcolor="#333" data-fgcolor="#8ac368" data-bgcolor="#c4e9aa" data-width="140" />
                    </div>
                    <div class="span3">
                        <input type="text" value="35" class="knob second" data-thickness=".3" data-inputcolor="#333" data-fgcolor="#5ba0a3" data-bgcolor="#cef3f5" data-width="140" />
                    </div>
                    <div class="span3">
                        <input type="text" value="85" class="knob second" data-thickness=".3" data-inputcolor="#333" data-fgcolor="#b85e80" data-bgcolor="#f8d2e0" data-width="140" />
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- end main container -->


<!-- scripts for this page -->
<script src="js/jquery-latest.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery-ui-1.10.2.custom.min.js"></script>
<!-- knob -->
<script src="js/jquery.knob.js"></script>
<!-- flot charts -->
<script src="js/jquery.flot.js"></script>
<script src="js/jquery.flot.stack.js"></script>
<script src="js/jquery.flot.resize.js"></script>
<!-- morrisjs -->
<script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="js/morris.min.js"></script>
<!-- call all plugins -->
<script src="js/theme.js"></script>

<!-- build the charts -->
<script type="text/javascript">

    // Morris Bar Chart
    Morris.Bar({
        element: 'hero-bar',
        data: [
            {device: '1', sells: 136},
            {device: '3G', sells: 1037},
            {device: '3GS', sells: 275},
            {device: '4', sells: 380},
            {device: '4S', sells: 655},
            {device: '5', sells: 1571}
        ],
        xkey: 'device',
        ykeys: ['sells'],
        labels: ['Sells'],
        barRatio: 0.4,
        xLabelMargin: 10,
        hideHover: 'auto',
        barColors: ["#3d88ba"]
    });


    // Morris Donut Chart
    Morris.Donut({
        element: 'hero-donut',
        data: [
            {label: 'Direct', value: 25 },
            {label: 'Referrals', value: 40 },
            {label: 'Search engines', value: 25 },
            {label: 'Unique visitors', value: 10 }
        ],
        colors: ["#30a1ec", "#76bdee", "#c4dafe"],
        formatter: function (y) { return y + "%" }
    });


    // Morris Line Chart
    var tax_data = [
        {"period": "2014-04", "visits": 2407, "signups": 660},
        {"period": "2014-03", "visits": 3351, "signups": 729},
        {"period": "2014-02", "visits": 2469, "signups": 1318},
        {"period": "2014-01", "visits": 2246, "signups": 461},
        {"period": "2012-12", "visits": 3171, "signups": 1676},
        {"period": "2012-11", "visits": 2155, "signups": 681},
        {"period": "2012-10", "visits": 1226, "signups": 620},
        {"period": "2012-09", "visits": 2245, "signups": 500}
    ];
    Morris.Line({
        element: 'hero-graph',
        data: tax_data,
        xkey: 'period',
        xLabels: "month",
        ykeys: ['visits', 'signups'],
        labels: ['Visits', 'User signups']
    });



    // Morris Area Chart
    Morris.Area({
        element: 'hero-area',
        data: [
            {period: '2010 Q1', iphone: 2666, ipad: null, itouch: 2647},
            {period: '2010 Q2', iphone: 2778, ipad: 2294, itouch: 2441},
            {period: '2010 Q3', iphone: 4912, ipad: 1969, itouch: 2501},
            {period: '2010 Q4', iphone: 3767, ipad: 3597, itouch: 5689},
            {period: '2011 Q1', iphone: 6810, ipad: 1914, itouch: 2293},
            {period: '2011 Q2', iphone: 5670, ipad: 4293, itouch: 1881},
            {period: '2011 Q3', iphone: 4820, ipad: 3795, itouch: 1588},
            {period: '2011 Q4', iphone: 15073, ipad: 5967, itouch: 5175},
            {period: '2012 Q1', iphone: 10687, ipad: 4460, itouch: 2028},
            {period: '2012 Q2', iphone: 8432, ipad: 5713, itouch: 1791}
        ],
        xkey: 'period',
        ykeys: ['iphone', 'ipad', 'itouch'],
        labels: ['iPhone', 'iPad', 'iPod Touch'],
        lineWidth: 2,
        hideHover: 'auto',
        lineColors: ["#81d5d9", "#a6e182", "#67bdf8"]
    });



    // Build jQuery Knobs
    $(".knob").knob();



    //  jQuery Flot Chart
    var visits = [[1, 50], [2, 40], [3, 45], [4, 23],[5, 55],[6, 65],[7, 61],[8, 70],[9, 65],[10, 75],[11, 57],[12, 59]];
    var visitors = [[1, 25], [2, 50], [3, 23], [4, 48],[5, 38],[6, 40],[7, 47],[8, 55],[9, 43],[10,50],[11,47],[12, 39]];

    var plot = $.plot($("#statsChart"),
        [ { data: visits, label: "Signups"},
            { data: visitors, label: "Visits" }], {
            series: {
                lines: { show: true,
                    lineWidth: 1,
                    fill: true,
                    fillColor: { colors: [ { opacity: 0.05 }, { opacity: 0.09 } ] }
                },
                points: { show: true,
                    lineWidth: 2,
                    radius: 3
                },
                shadowSize: 0,
                stack: true
            },
            grid: { hoverable: true,
                clickable: true,
                tickColor: "#f9f9f9",
                borderWidth: 0
            },
            legend: {
                // show: false
                labelBoxBorderColor: "#fff"
            },
            colors: ["#a7b5c5", "#30a0eb"],
            xaxis: {
                ticks: [[1, "JAN"], [2, "FEB"], [3, "MAR"], [4,"APR"], [5,"MAY"], [6,"JUN"],
                    [7,"JUL"], [8,"AUG"], [9,"SEP"], [10,"OCT"], [11,"NOV"], [12,"DEC"]],
                font: {
                    size: 12,
                    family: "Open Sans, Arial",
                    variant: "small-caps",
                    color: "#9da3a9"
                }
            },
            yaxis: {
                ticks:3,
                tickDecimals: 0,
                font: {size:12, color: "#9da3a9"}
            }
        });

    function showTooltip(x, y, contents) {
        $('<div id="tooltip">' + contents + '</div>').css( {
            position: 'absolute',
            display: 'none',
            top: y - 30,
            left: x - 50,
            color: "#fff",
            padding: '2px 5px',
            'border-radius': '6px',
            'background-color': '#000',
            opacity: 0.80
        }).appendTo("body").fadeIn(200);
    }

    var previousPoint = null;
    $("#statsChart").bind("plothover", function (event, pos, item) {
        if (item) {
            if (previousPoint != item.dataIndex) {
                previousPoint = item.dataIndex;

                $("#tooltip").remove();
                var x = item.datapoint[0].toFixed(0),
                    y = item.datapoint[1].toFixed(0);

                var month = item.series.xaxis.ticks[item.dataIndex].label;

                showTooltip(item.pageX, item.pageY,
                    item.series.label + " of " + month + ": " + y);
            }
        }
        else {
            $("#tooltip").remove();
            previousPoint = null;
        }
    });
</script>

</body>
</html>