<?php
 
$dataPoints = array( 
	array("label"=>"Expenses", "symbol" => "Expenses","y"=>46.6),
	array("label"=>"Dues", "symbol" => "Dues","y"=>27.7),
	array("label"=>"Paid Dues", "symbol" => "Paid Dues","y"=>13.9),
	array("label"=>"Paid Expenses", "symbol" => "Paid Expenses","y"=>5),
)
 
?>
<!DOCTYPE HTML>
<html>
<head>
<script>
window.onload = function() {
 
var chart = new CanvasJS.Chart("chartContainer", {
	theme: "light2",
	animationEnabled: true,
	title: {
		text: "Monthly Income Statement"
	},
	data: [{
		type: "doughnut",
		indexLabel: "{symbol} - {y}",
		yValueFormatString: "#,##0.0\" TL\"",
		showInLegend: true,
		legendText: "{label} : {y}",
		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
	}]
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