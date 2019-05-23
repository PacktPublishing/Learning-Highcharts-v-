<?php 
for($i = 0; $i <= 180; $i++) {
	$randvaule = rand(100,187);
//$unixTimestamp = strtotime('2014-08-'.$i);
$unixTimestamp = $unixTimestamp *1000;
echo '['.$i.','.$randvaule.'],';
}

?>