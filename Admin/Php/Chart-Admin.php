<?php

$dataPoints = array(
	array("label" => "Paid Expenses",  "y" => 1500),
	array("label" => "Paid Dues", "y" => 500),
	array("label" => "Total Revenue", "isIntermediateSum" => true),
	array("label" => "Expenses", "y" => -1300),
	array("label" => "Net Income",  "isCumulativeSum" => true)
);

?>
<!DOCTYPE HTML>
<html>

<head>
	<script>
		window.onload = function() {

			var chart = new CanvasJS.Chart("chartContainer", {
				animationEnabled: true,
				title: {
					text: "Monthly Revenue and Expenses"
				},
				axisY: {
					title: "Amount (in USD)",
					prefix: "$",
					gridThickness: 0
				},
				data: [{
					type: "waterfall",
					risingColor: "#428CFF",
					fallingColor: "#FF8C8C",
					indexLabel: "{y}",
					indexLabelFontColor: "#292B2C",
					indexLabelFontWeight: "bolder",
					indexLabelPlacement: "inside",
					yValueFormatString: "$#,##0",
					dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
				}],
				options: {
					responsive: true,
					maintainAspectRatio: true
				}
			});
			chart.render();

		}
	</script>
</head>

<body>
	<div id="chartContainer" style="height: 370px; width: 100%;"></div>
	<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>

</html>