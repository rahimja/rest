<?php
session_start();
function request($section,$method,$data=[])
{
    $url = 'http://127.0.0.1/mabahes_tamrin/rest%20api/00-01-29/v2/api.php';

    $access_token=$_SESSION['access_token'];   //********
    $header=['Content-Type:application/json',
             "Authorization:bearer $access_token"];
    $req['section'] =$section;
    $req['method'] = $method;
    $req['data'] = $data;
    $json_req = json_encode($req);
    $client = curl_init($url);
    curl_setopt($client, CURLOPT_HTTPHEADER, $header);  //***********
    curl_setopt($client, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($client, CURLOPT_POST, 1);
    curl_setopt($client, CURLOPT_POSTFIELDS, $json_req);
    $result = curl_exec($client);
    curl_close($client);
    $result=json_decode($result);
    return $result;
}
function getToken($username,$password)
{
    $url = 'http://127.0.0.1/mabahes_tamrin/rest%20api/00-01-29/v2/token_api.php';
    $req['grant_type']="password"; //***-
    $req['uname'] =$username;
    $req['upass'] = $password;
    $query=http_build_query($req); //***
    $client = curl_init($url);
    curl_setopt($client, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($client, CURLOPT_POST, 1);
    curl_setopt($client, CURLOPT_POSTFIELDS, $query);
    $result = curl_exec($client);
    curl_close($client);
    $result=json_decode($result);
    return $result;
}
