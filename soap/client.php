<?php
$options=[
    'uri'=>'local',
    'location'=>'http://127.0.0.1/mabahes_tamrin/soap/server.php'
];
$client=new SoapClient(null,$options);
$masahat=$client->__call('masahat',[2,3]);
$mohit=$client->__call('mohit',[2,3]);
echo "mohit=$mohit<br>";
echo "masahat=$masahat";