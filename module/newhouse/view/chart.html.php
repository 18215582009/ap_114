<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<title>买新房，找众房</title>

<!-- Bootstrap Core CSS -->
<link href="/theme/bootstrap.min.css" rel="stylesheet">

<!-- Custom Fonts -->
<link href="/theme/mtek_font-awesome.min.css" rel="stylesheet" type="text/css">
<link href="/theme/fonts/font-lineicons.css" rel="stylesheet" type="text/css">
<link href="/theme/bootstrap-multilevelmenu.css" rel="stylesheet" type="text/css">

<!-- Theme CSS -->
<link href="/theme/agency/css/agency.css" rel="stylesheet">

<script src="/js/chartjs/Chart.js"></script>
</head>

<body id="page-top">
<canvas id="canvas" height="450" width="600"></canvas>
<script>

    var lineChartData = {
        labels : ["January","February","March","April","May","June","July"],
        datasets : [
            {
                fillColor : "rgba(220,220,220,0.5)",
                strokeColor : "rgba(220,220,220,1)",
                pointColor : "rgba(220,220,220,1)",
                pointStrokeColor : "#fff",
                data : [65,59,90,81,56,55,40]
            },
            {
                fillColor : "rgba(151,187,205,0.5)",
                strokeColor : "rgba(151,187,205,1)",
                pointColor : "rgba(151,187,205,1)",
                pointStrokeColor : "#fff",
                data : [28,48,40,19,96,27,100]
            }
        ]

    }

    var myLine = new Chart(document.getElementById("canvas").getContext("2d")).Line(lineChartData);

</script>
</body>
</html>