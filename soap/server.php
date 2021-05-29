<?php
function mohit($t,$a){
    $mohit=($t+$a)*2;
    return $mohit;
}
function masahat($t,$a){
    $masahat=($t*$a);
    return $masahat;
}
$options=['uri'=>'local'];
$server=new SoapServer(null,$options);
$server->addFunction('mohit');
$server->addFunction('masahat');
$server->handle();