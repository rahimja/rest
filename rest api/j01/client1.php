<?php
 $url='http://127.0.0.1/mabahes_tamrin/rest%20api/j01/api1.php';
//$url='http://www.google.com';
 $client=curl_init($url);
 curl_setopt($client,CURLOPT_RETURNTRANSFER,1);
 $result=curl_exec($client);
 curl_close($client);
 echo $result;