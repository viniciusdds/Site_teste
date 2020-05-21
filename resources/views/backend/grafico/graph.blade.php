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




<script type="text/javascript">
    //var labels =  {{ json_encode($labels) }};
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
                text: 'Number of New Users'
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
</script>


// <script>
//     Highcharts.chart('container', {
//     chart: {
//         type: 'cylinder',
//         options3d: {
//             enabled: true,
//             alpha: 15,
//             beta: 10,
//             depth: 50,
//             viewDistance: 25
//         }
//     },
//     title: {
//         text: "Faturamento Semanal"
//     },
//     plotOptions: {
//         series: {
//             depth: 25,
//             colorByPoint: true
//         }
//     },
//     xAxis: {
//             //categories: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December']
//             categories: // <?php echo json_encode($labels) ?>
//     },
//     series: [{
//         //data: [29.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4, 194.1, 95.6, 54.4],
//         data: values,
//         name: // <?php echo json_encode($weeks1) ?>,
//         showInLegend: false
//     }]
// });
// </script>

@endsection
