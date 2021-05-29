<?php
$query=file_get_contents('php://input');
$data_json=json_decode($query);
$tool=$data_json->tool;
$arz=$data_json->arz;
$mohit=2*($tool+$arz);
// استفاده از کدر
header('content-type:application/json');
header('HTTP/1.1 200');
header('x-author:rahim jafari');

echo $mohit;