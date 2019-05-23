<?php 
for($i = 10; $i <= 20; $i++) {
	$randvaule = rand(150,180);
$unixTimestamp = strtotime('2014-08-'.$i);
$unixTimestamp = $unixTimestamp *1000;
echo '[2014-08-'.$i.', '.$randvaule.'],<br>';
}

?>