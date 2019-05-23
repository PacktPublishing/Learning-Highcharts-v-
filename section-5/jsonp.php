<?php
header("content-type: application/json"); 

$array = array(52,54,50,57,56,54,57,59,54,50,53,56,54,57);

echo $_GET['callback']. '('. json_encode($array) . ')';   

?>