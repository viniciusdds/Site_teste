@extends('backend.layouts.main')

@section('content')

<div id="container"></div>
</body>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/highcharts-3d.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>

<script type="text/javascript">
    $(function() {
      $('#container').highcharts({{json_encode($chartarray)}})
    });
</script>

<div id="container"></div>

{{-- {{json_encode($labels)}}
{{json_encode($values)}}
{{json_encode($weeks)}}

<script type="text/javascript">
    // var labels =  {{ json_encode($labels) }};
    var values =  {{ json_encode($values) }};
    // var weeks =  {{ json_encode($weeks) }};

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
            text: 'Faturamento da Semana, 2019'
        },
        subtitle: {
            text: 'Source: codechief.org'
        },
         xAxis: {
            categories: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December']
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
            name: 'Qtd vendida',
            data: values
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
</script> --}}
@endsection
