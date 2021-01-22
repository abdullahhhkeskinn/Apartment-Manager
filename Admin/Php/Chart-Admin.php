<?php

$dataPoints = array(
    array("label" => "Industrial", "y" => 51.7),
    array("label" => "Transportation", "y" => 26.6),
    array("label" => "Residential", "y" => 13.9),
    array("label" => "Commercial", "y" => 7.8)
)

?>
<!DOCTYPE HTML>
<html>

<head>
    <script>
        window.onload = function() {
            var chart = new CanvasJS.Chart("chartContainer", {
                theme: "light1",
                animationEnabled: true,
                title: {
                    text: "World Energy Consumption by Sector - 2012"
                },
                data: [{
                    type: "pie",
                    indexLabel: "{y}",
                    yValueFormatString: "#,##0.00\"%\"",
                    indexLabelPlacement: "center",
                    indexLabelFontColor: "black",
                    indexLabelFontSize: 15,
                    indexLabelFontWeight: "bolder",
                    showInLegend: true,
                    legendText: "{label}",
                    segmentShowStroke: true,
                    dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
                }]
            });
            chart.render(
            );
        }
    </script>
</head>

<body>
    <div id="chartContainer" style="height: 370px; width: 50%;"></div>
    <script src="../../Js/canvasjs.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/1.0.2/Chart.js"></script>
</body>

</html>