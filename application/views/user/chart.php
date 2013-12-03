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
                    type: 'area'
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
					name: 'Asia',
					data: [502, 635, 809, 947, 1402, 3634, 5268]
				}, {
					name: 'Africa',
					data: [106, 107, 111, 133, 221, 767, 1766]
				}, {
					name: 'Europe',
					data: [163, 203, 276, 408, 547, 729, 628]
				}, {
					name: 'America',
					data: [18, 31, 54, 156, 339, 818, 1201]
				}, {
					name: 'Oceania',
					data: [2, 2, 2, 6, 13, 30, 46]
				}]
            });
    });
       
    </script>
</head>

<body>
    <div id="container" style="height: 500px; min-width: 500px"></div>
</body>

</html>
