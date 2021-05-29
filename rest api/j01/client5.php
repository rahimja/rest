<?php
$url = 'http://127.0.0.1/mabahes_tamrin/rest%20api/j01/api5.php';
$params=['tool'=>2,'arz'=>6];
$query=http_build_query($params);
$client = curl_init($url);
curl_setopt($client, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($client, CURLOPT_POST, 1);
curl_setopt($client, CURLOPT_POSTFIELDS, $query);
$result = curl_exec($client);
curl_close($client);
echo $result;