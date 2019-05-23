<?php

//convert chart title to machine-friendly name (unnecessary, nice to have feature)
function toAscii($str) {
	$clean = preg_replace("/[^a-zA-Z0-9\/_|+ -]/", '', $str);
	$clean = strtolower(trim($clean, '-'));
	$clean = preg_replace("/[\/_|+ -]+/", '-', $clean);
	
	return $clean;
}

//get post variables
$options = stripslashes($_POST["options"]);
$type = $_POST['type'];
$title = $_POST['title'];

// allow no other than predefined types
if ($type == 'image/png') {
	$ext = 'png';
	
} elseif ($type == 'image/jpeg') {
	$ext = 'jpg';
	
} elseif ($type == 'application/pdf') {
	$ext = 'pdf';
	
} elseif ($type == 'image/svg+xml') {
	$ext = 'svg';
	
} else { 
	$ext = 'txt';
}

//prepare the options json file for phantomjs command line
file_put_contents("tmp/options.json", $options);

$chartfilename = toAscii($title);

//do the command line convert
if(!exec('phantomjs highcharts-convert.js -infile tmp/options.json -outfile chart-images/'.$chartfilename.'.'.$ext.' -scale 1 -width 1200  -constr Chart') ){
	//handling error
	header("content-type:application/json");
	echo 'Error while converting';
} else {
	//if everything's finesend back the chart image filename
	header('Content-Type: application/json');	
	echo json_encode(array(
	'chartname' => 'exporter/chart-images/'.$chartfilename.'.'.$ext)
	);	
}

?>