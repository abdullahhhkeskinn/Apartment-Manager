<?php

$paid_dues = 0;
$paid_expenses = 0;
$unpaid_expenses = 0;
$unpaid_dues = 0;

$paid_dues_sql = "SELECT fee FROM due_user_flat INNER JOIN dues USING (dueId) WHERE is_paid = 1 AND MONTH(pay_date) = MONTH(CURRENT_DATE()) AND YEAR(pay_date) = YEAR(CURRENT_DATE()) ";
$paid_expenses_sql = "SELECT fee FROM expense_user_flat INNER JOIN expenses USING (expenseId) WHERE is_paid = 1 AND MONTH(pay_date) = MONTH(CURRENT_DATE()) AND YEAR(pay_date) = YEAR(CURRENT_DATE()) ";
$unpaid_expense_fee_sql = "SELECT * FROM expense_user_flat  INNER JOIN expenses USING (expenseId) WHERE is_paid = 0 AND MONTH(expenseDate) = MONTH(CURRENT_DATE()) AND YEAR(expenseDate) = YEAR(CURRENT_DATE())";
$unpaid_due_fee_sql = "SELECT * FROM due_user_flat  INNER JOIN dues USING (dueId) WHERE is_paid = 0 AND MONTH(dueDate) = MONTH(CURRENT_DATE()) AND YEAR(dueDate) = YEAR(CURRENT_DATE())";

$sql_return = mysqli_query($conn, $paid_dues_sql);
if (mysqli_num_rows($sql_return) > 0) {
	while ($result = mysqli_fetch_array($sql_return)) {
		$paid_dues += $result['fee'];
	}
}

$sql_return = mysqli_query($conn, $paid_expenses_sql);
if (mysqli_num_rows($sql_return) > 0) {
	while ($result = mysqli_fetch_array($sql_return)) {
		$paid_expenses += $result['fee'];
	}
}

$sql_return = mysqli_query($conn, $unpaid_expense_fee_sql);
if (mysqli_num_rows($sql_return) > 0) {
	while ($result = mysqli_fetch_array($sql_return)) {
	$unpaid_expenses += $result['fee'];
	}
}

$sql_return = mysqli_query($conn, $unpaid_due_fee_sql);
if (mysqli_num_rows($sql_return) > 0) {
	while ($result = mysqli_fetch_array($sql_return)) {
	$unpaid_dues += $result['fee'];
	}
}

$dataPoints = array(
	array("label" => "Paid Expenses",  "y" => $paid_expenses),
	array("label" => "Remaining Expenses", "y" => -$unpaid_expenses),	
	array("label" => "Paid Dues", "y" => $paid_dues),
	array("label" => "Remaining Dues", "y" => -$unpaid_dues),
	array("label" => "Total Monthly Income", "y" => $paid_expenses + $paid_dues - ($unpaid_expenses + $unpaid_dues))
);

?>
<?php

$sname = "localhost";
$uname = "root";
$password = "";
$db_name = "apartmentmanager";
$conn  = mysqli_connect($sname, $uname, $password, $db_name);
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