<?php
$url = 'http://127.0.0.1/mabahes_tamrin/rest%20api/00-01-22/v1/api.php';
$params=['tool'=>2,'arz'=>9];

$data_json=json_encode($params);
$client = curl_init($url);
curl_setopt($client, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($client, CURLOPT_POST, 1);
curl_setopt($client, CURLOPT_POSTFIELDS, $data_json);

$result = curl_exec($client);
curl_close($client);

echo $result;