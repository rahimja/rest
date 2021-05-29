<?php
$url = 'http://127.0.0.1/mabahes_tamrin/rest%20api/00-01-22/v3/api.php';
$data=['tool'=>2,'arz'=>9];
$request['section']='rect';
$request['method']='masahat';
$request['data']=$data;
$json_request=json_encode($request);
$client = curl_init($url);
curl_setopt($client, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($client, CURLOPT_POST, 1);
curl_setopt($client, CURLOPT_POSTFIELDS, $json_request);
$result = curl_exec($client);
curl_close($client);
$res=json_decode($result);
if ($res->status==200)
    echo $res->data;
else
    echo $res->message;
