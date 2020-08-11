@extends('backend.layouts.main')

@section('content')

<div id="container"></div>
</body>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/highcharts-3d.js"></script>
<script src="https://code.highcharts.com/modules/cylinder.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<script src="https://code.highcharts.com/modules/funnel3d.js"></script>
<script src="https://code.highcharts.com/modules/pyramid3d.js"></script>


<script type="text/javascript">
//     var labels =  {{ json_encode($labels) }};
    var values1 =  {{ json_encode($values1) }};
    var values2 =  {{ json_encode($values2) }};

    Highcharts.chart('container', {
        chart: {
            type: 'column',
            options3d: {
                enabled: true,
                alpha: 15,
                beta: 355,
                viewDistance: 25,
                depth: 95
            }
        },
        title: {
            text: 'Faturamento da Semanal'
        },
        subtitle: {
            text: 'Ano 2020'
        },
         xAxis: {
            //categories: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December']
            categories:  <?php echo json_encode($labels) ?>
        },
        yAxis: {
            title: {
                text: 'Quantidades de Vendas'
            }
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle'
        },
        plotOptions: {
            series: {
                allowPointSelect: true
            }
        },
        series: [{
            name: <?php echo json_encode($weeks1) ?>,
            data: values1
        },
        {
            name: <?php echo json_encode($weeks2) ?>,
            data: values2
        }],
        responsive: {
            rules: [{
                condition: {
                    maxWidth: 500
                },
                chartOptions: {
                    legend: {
                        layout: 'horizontal',
                        align: 'center',
                        verticalAlign: 'bottom'
                    }
                }
            }]
        }
});

// var values1 =  {{ json_encode($values1) }};
// var values2 =  {{ json_encode($values2) }};

// Highcharts.chart('container', {
//     chart: {
//         type: 'cylinder',
//         options3d: {
//             enabled: true,
//             alpha: 15,
//             beta: 15,
//             viewDistance: 25,
//             depth: 40
//         }
//     },

//     title: {
//         text: 'Total fruit consumption, grouped by gender'
//     },

//     xAxis: {
//         categories: <?php echo json_encode($labels) ?>,
//         labels: {
//             skew3d: true,
//             style: {
//                 fontSize: '16px'
//             }
//         }
//     },

//     yAxis: {
//         allowDecimals: false,
//         min: 0,
//         title: {
//             text: 'Number of fruits',
//             skew3d: true
//         }
//     },

//     tooltip: {
//         headerFormat: '<b>{point.key}</b><br>',
//         pointFormat: '<span style="color:{series.color}">\u25CF</span> {series.name}: {point.y} / {point.stackTotal}'
//     },

//     plotOptions: {
//         column: {
//             stacking: 'normal',
//             depth: 40
//         }
//     },

//     series: [{
//         name: <?php echo json_encode($weeks1) ?>,
//         data: values1,
//         stack: 'male'
//     }, {
//         name: <?php echo json_encode($weeks2) ?>,
//         data: values2,
//         stack: 'male'
//     }]
// });


</script>

@endsection
