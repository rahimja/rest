<?php
$url='http://127.0.0.1/mabahes_tamrin/rest%20api/tamrin2/api.php';

$data=['tool'=>15,'arz'=>20];
$query=json_encode($data);
$client=curl_init($url);
curl_setopt($client,CURLOPT_RETURNTRANSFER,1);
curl_setopt($client,CURLOPT_POST,1);
curl_setopt($client,CURLOPT_POSTFIELDS,$query);
$res=curl_exec($client);
curl_close($client);
echo $res;