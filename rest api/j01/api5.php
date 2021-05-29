<?php
//$tool=$_POST['tool'];
//$arz=$_POST['arz'];
$query=file_get_contents('php://input');
parse_str($query,$data);
$tool=$data['tool'];
$arz=$data['arz'];
$mohit=2*($tool+$arz);
echo $mohit;