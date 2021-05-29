<?php
$url='http://127.0.0.1/mabahes_tamrin/rest%20api/j01/api2.php';
$client=curl_init($url);
curl_setopt($client,CURLOPT_RETURNTRANSFER,1);
$result=curl_exec($client);
curl_close($client);
$book=json_decode($result);
echo $book->bname;
echo "<br>";
echo $book->price;
