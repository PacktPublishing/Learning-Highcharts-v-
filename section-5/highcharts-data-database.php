<?php

$mysqli = new mysqli("localhost", "root", "", "weather");

if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}

$query = "SELECT * FROM london_daily ORDER BY date LIMIT 7";
$result = $mysqli->query($query);

while($row = $result->fetch_array(MYSQLI_ASSOC))
{
	$lowrows[] = $row['low'];
	$hirows[] = $row['hi'];
	$categ[] = $row['date'];
}

$lowtemp = json_encode($lowrows, JSON_NUMERIC_CHECK);
$hitemp = json_encode($hirows, JSON_NUMERIC_CHECK);
$categories = json_encode($categ, JSON_NUMERIC_CHECK);

$result->free();
$mysqli->close();
?>

<!DOCTYPE html>
<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Highcharts getting data from database</title>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
	<script src="http://code.highcharts.com/highcharts.js"></script>

	<script type='text/javascript'>
		$(function() {
			$('#container').highcharts({
				chart: {
					type: 'line'
				},
				title: {
					text: 'Weather in London'
				},
				xAxis: {
					categories: <?php echo $categories; ?>
				},
				yAxis: {
					title: {
						text: 'Temperature °F'
					},
                },
				tooltip: {
					valueSuffix: '°'
				},


				series: [{
					name: 'Low',
					data: <?php echo $lowtemp; ?>
					},
					{
					name: 'High',
					data: <?php echo $hitemp; ?>,
          color: '#bc360a'
					}
					]

			});
		});
	</script>
</head>

<body>

	<div id="container" style="width:100%; height:400px;"></div>

</body>

</html>
