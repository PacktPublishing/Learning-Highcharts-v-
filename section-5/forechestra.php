<?php

$mysqli = new mysqli("localhost", "root", "", "weather");

/* check connection */
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}

$query = "SELECT * FROM london_daily";
$result = $mysqli->query($query);

while($row = $result->fetch_array(MYSQLI_ASSOC))
{
	$rows[] = $row;
}

//print_r($rows);

print json_encode($rows, JSON_NUMERIC_CHECK);

/* free result set */
$result->free();

/* close connection */
$mysqli->close();
?>
