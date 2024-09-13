<script>

$(function() {
    "use strict";
// chart 1
    var options = {
        series: [{
            name: "Total Orders",
            data: [<?= chartData(6, 'setdate', 'orders') ?>]
        }],
        chart: {
            type: "line",
            //width: 100%,
            height: 40,
            toolbar: {
                show: !1
            },
            zoom: {
                enabled: !1
            },
            dropShadow: {
                enabled: 0,
                top: 3,
                left: 14,
                blur: 4,
                opacity: .12,
                color: "#e72e7a"
            },
            sparkline: {
                enabled: !0
            }
        },
        markers: {
            size: 0,
            colors: ["#e72e7a"],
            strokeColors: "#fff",
            strokeWidth: 2,
            hover: {
                size: 7
            }
        },
        plotOptions: {
            bar: {
                horizontal: !1,
                columnWidth: "35%",
                endingShape: "rounded"
            }
        },
        dataLabels: {
            enabled: !1
        },
        stroke: {
            show: !0,
            width: 2.5,
            curve: "smooth"
        },
        colors: ["#e72e7a"],
        xaxis: {
            categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"]
        },
        fill: {
            opacity: 1
        },
        tooltip: {
            theme: "dark",
            fixed: {
                enabled: !1
            },
            x: {
                show: !1
            },
            y: {
                title: {
                    formatter: function(e) {
                        return ""
                    }
                }
            },
            marker: {
                show: !1
            }
        }
    };

    var chart = new ApexCharts(document.querySelector("#chart1"), options);
    chart.render();



// chart 2
    var options = {
        series: [{
            name: "Total Views",
            data: [400, 555, 257, 640, 460, 671, 350]
        }],
        chart: {
            type: "bar",
            //width: 100%,
            height: 40,
            toolbar: {
                show: !1
            },
            zoom: {
                enabled: !1
            },
            dropShadow: {
                enabled: 0,
                top: 3,
                left: 14,
                blur: 4,
                opacity: .12,
                color: "#3461ff"
            },
            sparkline: {
                enabled: !0
            }
        },
        markers: {
            size: 0,
            colors: ["#3461ff"],
            strokeColors: "#fff",
            strokeWidth: 2,
            hover: {
                size: 7
            }
        },
        plotOptions: {
            bar: {
                horizontal: !1,
                columnWidth: "35%",
                endingShape: "rounded"
            }
        },
        dataLabels: {
            enabled: !1
        },
        stroke: {
            show: !0,
            width: 2.5,
            curve: "smooth"
        },
        colors: ["#3461ff"],
        xaxis: {
            categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"]
        },
        fill: {
            opacity: 1
        },
        tooltip: {
            theme: "dark",
            fixed: {
                enabled: !1
            },
            x: {
                show: !1
            },
            y: {
                title: {
                    formatter: function(e) {
                        return ""
                    }
                }
            },
            marker: {
                show: !1
            }
        }
    };

    var chart = new ApexCharts(document.querySelector("#chart2"), options);
    chart.render();



// chart 3
    var options = {
        series: [{
            name: "Revenue",
            data: [<?= chartData(6, 'date', 'products') ?>]
        }],
        chart: {
            type: "line",
            //width: 100%,
            height: 40,
            toolbar: {
                show: !1
            },
            zoom: {
                enabled: !1
            },
            dropShadow: {
                enabled: 0,
                top: 3,
                left: 14,
                blur: 4,
                opacity: .12,
                color: "#12bf24"
            },
            sparkline: {
                enabled: !0
            }
        },
        markers: {
            size: 0,
            colors: ["#12bf24"],
            strokeColors: "#fff",
            strokeWidth: 2,
            hover: {
                size: 7
            }
        },
        plotOptions: {
            bar: {
                horizontal: !1,
                columnWidth: "35%",
                endingShape: "rounded"
            }
        },
        dataLabels: {
            enabled: !1
        },
        stroke: {
            show: !0,
            width: 2.5,
            curve: "smooth"
        },
        colors: ["#12bf24"],
        xaxis: {
            categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"]
        },
        fill: {
            opacity: 1
        },
        tooltip: {
            theme: "dark",
            fixed: {
                enabled: !1
            },
            x: {
                show: !1
            },
            y: {
                title: {
                    formatter: function(e) {
                        return ""
                    }
                }
            },
            marker: {
                show: !1
            }
        }
    };

    var chart = new ApexCharts(document.querySelector("#chart3"), options);
    chart.render();



// chart 4
    var options = {
        series: [{
            name: "Customers",
            data: [<?= chartData(6, 'setdate', 'members') ?>]
        }],
        chart: {
            type: "bar",
            //width: 100%,
            height: 30,
            toolbar: {
                show: !1
            },
            zoom: {
                enabled: !1
            },
            dropShadow: {
                enabled: 0,
                bottom: 0,
                left: 0,
                blur: 4,
                opacity: .12,
                color: "#ff6632"
            },
            sparkline: {
                enabled: !0
            }
        },
        markers: {
            size: 0,
            colors: ["#ff6632"],
            strokeColors: "#fff",
            strokeWidth: 2,
            hover: {
                size: 7
            }
        },
        plotOptions: {
            bar: {
                horizontal: !1,
                columnWidth: "40%",
                endingShape: "rounded"
            }
        },
        dataLabels: {
            enabled: !1
        },
        stroke: {
            show: !0,
            width: 2.5,
            curve: "smooth"
        },
        colors: ["#ff6632"],
        xaxis: {
            categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"]
        },
        fill: {
            opacity: 1
        },
        tooltip: {
            theme: "dark",
            fixed: {
                enabled: !1
            },
            x: {
                show: !1
            },
            y: {
                title: {
                    formatter: function(e) {
                        return ""
                    }
                }
            },
            marker: {
                show: !1
            }
        }
    };

    var chart = new ApexCharts(document.querySelector("#chart4"), options);
    chart.render();



// chart 5

    var options = {
        series: [{
            name: "درآمد",
            data: [240, 460, 171, 657, 160, 471, 340, 230, 458, 98]
        }],
        chart: {
            type: "area",
            // width: 130,
            stacked: true,
            height: 280,
            toolbar: {
                show: !1
            },
            zoom: {
                enabled: !1
            },
            dropShadow: {
                enabled: 0,
                top: 3,
                left: 14,
                blur: 4,
                opacity: .12,
                color: "#3461ff"
            },
            sparkline: {
                enabled: !1
            }
        },
        markers: {
            size: 0,
            colors: ["#3461ff"],
            strokeColors: "#fff",
            strokeWidth: 2,
            hover: {
                size: 7
            }
        },
        plotOptions: {
            bar: {
                horizontal: !1,
                columnWidth: "25%",
                //endingShape: "rounded"
            }
        },
        dataLabels: {
            enabled: !1
        },
        stroke: {
            show: !0,
            width: [2.5],
            //colors: ["#3461ff"],
            curve: "smooth"
        },
        fill: {
            type: 'gradient',
            gradient: {
                shade: 'light',
                type: 'vertical',
                shadeIntensity: 0.5,
                gradientToColors: ['#3361ff'],
                inverseColors: false,
                opacityFrom: 0.7,
                opacityTo: 0.1,
                // stops: [0, 100]
            }
        },
        colors: ["#3361ff"],
        xaxis: {
            categories: ["فروردین", "اردیبهشت", "خرداد", "تیر", "مرداد", "شهریور", "مهر", "آبان", "آذر", "دی", "بهمن", "اسفند"]
        },
        grid:{
            show: true,
            borderColor: 'rgba(66, 59, 116, 0.15)',
        },
        responsive: [
            {
                breakpoint: 1000,
                options: {
                    chart: {
                        type: "area",
                        // width: 130,
                        stacked: true,
                    }
                }
            }
        ],
        legend: {
            show: false
        },
        tooltip: {
            theme: "dark"
        }
    };

    var chart = new ApexCharts(document.querySelector("#chart5"), options);
    chart.render();



    <?php 

$star5 = $db->where('rate', 5)
->getValue('comment', 'COUNT(*)');
$star4 = $db->where('rate', 4)
->getValue('comment', 'COUNT(*)');
$star3 = $db->where('rate', 3)
->getValue('comment', 'COUNT(*)');
$star2 = $db->where('rate', 2)
->getValue('comment', 'COUNT(*)');
$star1 = $db->where('rate', 1)
->getValue('comment', 'COUNT(*)');
$totalRates = $star1 + $star2 + $star3 + $star4 + $star5;
$max = max($star1, $star2, $star3, $star4, $star5);
$res = intval(($max / $totalRates) * 100);

?>

// chart6

    var chart = new Chart(document.getElementById('chart6'), {
        type: 'doughnut',
        data: {
            labels: ["امتیاز 1", "امتیاز 2", "امتیاز 3", "امتیاز 4", "امتیاز 5"],
            datasets: [{
                label: "Device Users",
                backgroundColor: ["#e72e2e", "#ffcb32", "#e72e7a", "#12bf24", "#3461ff"],
                data: [<?= $star1.",". $star2.",". $star3.",". $star4.",". $star5 ?>]
            }]
        },
        options: {
            maintainAspectRatio: false,
            cutoutPercentage: 85,
            responsive: true,
            legend: {
                display: false
            }
        }
    });

    







// chart 8

    var options = {
        series: [{
            name: "Messages",
            data: [<?= chartData(12, 'setdate', 'contacts') ?>]
        }],
        chart: {
            type: "area",
            //width: 130,
            height: 55,
            toolbar: {
                show: !1
            },
            zoom: {
                enabled: !1
            },
            dropShadow: {
                enabled: 0,
                top: 3,
                left: 14,
                blur: 4,
                opacity: .12,
                color: "#e72e2e"
            },
            sparkline: {
                enabled: !0
            }
        },
        markers: {
            size: 0,
            colors: ["#e72e7a"],
            strokeColors: "#fff",
            strokeWidth: 2,
            hover: {
                size: 7
            }
        },
        plotOptions: {
            bar: {
                horizontal: !1,
                columnWidth: "35%",
                endingShape: "rounded"
            }
        },
        dataLabels: {
            enabled: !1
        },
        stroke: {
            show: !0,
            width: 2.5,
            curve: "smooth"
        },
        fill: {
            type: 'gradient',
            gradient: {
                shade: 'light',
                type: 'vertical',
                shadeIntensity: 0.5,
                gradientToColors: ['#e72e7a'],
                inverseColors: false,
                opacityFrom: 0.6,
                opacityTo: 0.1,
                //stops: [0, 100]
            }
        },
        colors: ["#e72e7a"],
        xaxis: {
            categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"]
        },
        grid:{
            show: false,
            borderColor: 'rgba(66, 59, 116, 0.15)',
        },
        tooltip: {
            theme: "dark",
            fixed: {
                enabled: !1
            },
            x: {
                show: !1
            },
            y: {
                title: {
                    formatter: function(e) {
                        return ""
                    }
                }
            },
            marker: {
                show: !1
            }
        }
    };

    var chart = new ApexCharts(document.querySelector("#chart8"), options);
    chart.render();



// chart 9

    var options = {
        series: [{
            name: "Posts",
            data: [<?= chartData(12, 'setdate', 'blogs') ?>]
        }],
        chart: {
            type: "area",
            //width: 130,
            height: 55,
            toolbar: {
                show: !1
            },
            zoom: {
                enabled: !1
            },
            dropShadow: {
                enabled: 0,
                top: 3,
                left: 14,
                blur: 4,
                opacity: .12,
                color: "#12bf24"
            },
            sparkline: {
                enabled: !0
            }
        },
        markers: {
            size: 0,
            colors: ["#3461ff"],
            strokeColors: "#fff",
            strokeWidth: 2,
            hover: {
                size: 7
            }
        },
        plotOptions: {
            bar: {
                horizontal: !1,
                columnWidth: "35%",
                endingShape: "rounded"
            }
        },
        dataLabels: {
            enabled: !1
        },
        stroke: {
            show: !0,
            width: 2.5,
            curve: "smooth"
        },
        fill: {
            type: 'gradient',
            gradient: {
                shade: 'light',
                type: 'vertical',
                shadeIntensity: 0.5,
                gradientToColors: ['#12bf24'],
                inverseColors: false,
                opacityFrom: 0.6,
                opacityTo: 0.1,
                //stops: [0, 100]
            }
        },
        colors: ["#12bf24"],
        xaxis: {
            categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"]
        },
        tooltip: {
            theme: "dark",
            fixed: {
                enabled: !1
            },
            x: {
                show: !1
            },
            y: {
                title: {
                    formatter: function(e) {
                        return ""
                    }
                }
            },
            marker: {
                show: !1
            }
        }
    };

    var chart = new ApexCharts(document.querySelector("#chart9"), options);
    chart.render();




// chart 10

    var options = {
        series: [{
            name: "Tasks",
            data: [<?= chartData(12, 'paydate', 'payments') ?>]
        }],
        chart: {
            type: "area",
            //width: 130,
            height: 55,
            toolbar: {
                show: !1
            },
            zoom: {
                enabled: !1
            },
            dropShadow: {
                enabled: 0,
                top: 3,
                left: 14,
                blur: 4,
                opacity: .12,
                color: "#32bfff"
            },
            sparkline: {
                enabled: !0
            }
        },
        markers: {
            size: 0,
            colors: ["#32bfff"],
            strokeColors: "#fff",
            strokeWidth: 2,
            hover: {
                size: 7
            }
        },
        plotOptions: {
            bar: {
                horizontal: !1,
                columnWidth: "35%",
                endingShape: "rounded"
            }
        },
        dataLabels: {
            enabled: !1
        },
        stroke: {
            show: !0,
            width: 2.5,
            curve: "smooth"
        },
        fill: {
            type: 'gradient',
            gradient: {
                shade: 'light',
                type: 'vertical',
                shadeIntensity: 0.5,
                gradientToColors: ['#32bfff'],
                inverseColors: false,
                opacityFrom: 0.6,
                opacityTo: 0.1,
                //stops: [0, 100]
            }
        },
        colors: ["#32bfff"],
        xaxis: {
            categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"]
        },
        tooltip: {
            theme: "dark",
            fixed: {
                enabled: !1
            },
            x: {
                show: !1
            },
            y: {
                title: {
                    formatter: function(e) {
                        return ""
                    }
                }
            },
            marker: {
                show: !1
            }
        }
    };

    var chart = new ApexCharts(document.querySelector("#chart10"), options);
    chart.render();



// chart 11
<?php

$today = strtotime("today"); 
$days = [];
$data = [];
for($i = 6; $i >= 0; $i--){
    $last_week = strtotime("-$i day",$today);
    $day = "'".jdate('l', $last_week)."'";
    $date = date("Y/m/d",$last_week);
    $res = $db->where("setdate LIKE '%$date%'")
    ->getValue('members', 'COUNT(*)');
    $days[] = $day;
    $data[] = $res;
}
$data = implode(', ', $data);
$days = implode(', ', $days);

?>

    var options = {
        series: [{
            name: "New Visitors",
            data: [<?= $data ?>]
        }],
        chart: {
            foreColor: '#9a9797',
            type: "bar",
            //width: 130,
            stacked: true,
            height: 280,
            toolbar: {
                show: !1
            },
            zoom: {
                enabled: !1
            },
            dropShadow: {
                enabled: 0,
                top: 3,
                left: 15,
                blur: 4,
                opacity: .12,
                color: "#3461ff"
            },
            sparkline: {
                enabled: !1
            }
        },
        markers: {
            size: 0,
            colors: ["#3461ff", "#c1cfff"],
            strokeColors: "#fff",
            strokeWidth: 2,
            hover: {
                size: 7
            }
        },
        plotOptions: {
            bar: {
                horizontal: !1,
                columnWidth: "35%",
                //endingShape: "rounded"
            }
        },
        dataLabels: {
            enabled: !1
        },
        legend: {
            show: false,
        },
        stroke: {
            show: !0,
            width: 0,
            curve: "smooth"
        },
        colors: ["#3461ff", "#c1cfff"],
        xaxis: {
            categories: [<?= $days ?>]
        },
        grid:{
            show: true,
            borderColor: 'rgba(66, 59, 116, 0.15)',
        },
        tooltip: {
            theme: "dark",
            fixed: {
                enabled: !1
            },
            x: {
                show: !1
            },
            y: {
                title: {
                    formatter: function(e) {
                        return ""
                    }
                }
            },
            marker: {
                show: !1
            }
        }
    };

    var chart = new ApexCharts(document.querySelector("#chart11"), options);
    chart.render();




// worl map

    jQuery('#geographic-map').vectorMap(
        {
            map: 'world_mill_en',
            backgroundColor: 'transparent',
            borderColor: '#818181',
            borderOpacity: 0.25,
            borderWidth: 1,
            zoomOnScroll: false,
            color: '#009efb',
            regionStyle : {
                initial : {
                    fill : '#3461ff'
                }
            },
            markerStyle: {
                initial: {
                    r: 9,
                    'fill': '#fff',
                    'fill-opacity':1,
                    'stroke': '#000',
                    'stroke-width' : 5,
                    'stroke-opacity': 0.4
                },
            },
            enableZoom: true,
            hoverColor: '#009efb',
            markers : [{
                latLng : [21.00, 78.00],
                name : 'Lorem Ipsum Dollar'

            }],
            hoverOpacity: null,
            normalizeFunction: 'linear',
            scaleColors: ['#b6d6ff', '#005ace'],
            selectedColor: '#c9dfaf',
            selectedRegions: [],
            showTooltip: true,
        });






});

</script>