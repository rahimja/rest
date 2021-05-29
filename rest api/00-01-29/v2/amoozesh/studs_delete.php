<?php
include 'client.php';
$sid = $_GET['sid'];
$data['sid']=$sid;
$res = request('studs', 'delete', $data);
if ($res->status == 200)
    header('location:studs_index.php');
else
    echo "<h2>$res->message</h2>";
