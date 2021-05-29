<?php
$url='http://127.0.0.1/mabahes_tamrin/rest%20api/00-01-22/tamrin/api.php';
$params=['method'=>'masahatd','tool'=>2,'arz'=>3];
$query=http_build_query($params);
$client=curl_init($url);
curl_setopt($client,CURLOPT_RETURNTRANSFER,1);
curl_setopt($client,CURLOPT_POST,1);
curl_setopt($client,CURLOPT_POSTFIELDS,$query);
$res=curl_exec($client);
$res=json_decode($res);
if ($res->status==200)
    echo $res->data;
else
    echo $res->message;