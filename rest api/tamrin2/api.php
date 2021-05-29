<?php
$data=file_get_contents("php://input");
$data=json_decode($data);
$tool=$data->tool;
$arz=$data->arz;
$mas=$tool*$arz;
echo $mas;
