<?php
//$tool=$_POST['tool'];
//$arz=$_POST['arz'];
$query=file_get_contents('php://input');
$data_json=json_decode($query);
$tool=$data_json->tool;
$arz=$data_json->arz;
$mohit=2*($tool+$arz);
echo $mohit;