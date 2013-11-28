<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Hospital | Health Records</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <script src="<?php echo base_url();?>assets/js/jquery-1.10.1.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/highstock.js"></script>
    <script src="<?php echo base_url();?>assets/js/exporting.js"></script>
    <script>
        $(function () {
            $('#container').highcharts({
                chart: {
                    type: 'areaspline'
                },
                title: {
                    text: 'IAP Chart on Weight for <strong> BOYS </strong> from 0-36 Months'
                },
                xAxis: {
                     title: {
                        text: 'Months'
                    },
                    tickmarkPlacement: 'on',
                    categories: ['1', '2', '3', '4', '5', '6', '7', '8','9','10','11','12','18','24','30','36']
                },
                yAxis: {
                    title: {
                        text: 'KG'
                    }
                },
                tooltip: {
                    shared: true,
                    crosshairs: true,
                    headerFormat: '<small>{point.key} Month(s)</small> <br/>',
                    valueSuffix: ' KG'
                },
                credits: {
                    enabled: false
                },
                plotOptions: {
                    areaspline: {
                        fillOpacity: 0.5
                    }
                },
                series: [{
                    name: 'John',
                    data: [0, 4, 3, 5, 4, 10, 20, 4, 3, 5, 4, 10, 20, 3, 4, 3]
                }, {
                    name: 'Jane',
                    data: [0, 3, 4, 3, 3, 5, 4, 1, 3, 4, 3, 4, 5, 4, 1, 3]
                }, {
                    name: 'Man',
                    data: [0, 7, 9, 9, 6, 5, 8, 6, 7, 9, 10, 6, 5, 4, 8, 9]
                }]
            });
    });
       
    </script>
</head>

<body>
    <div id="container" style="height: 500px; min-width: 500px"></div>
</body>

</html>
