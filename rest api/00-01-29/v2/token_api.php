<?php
include 'config.php';
function generateToken($length = 10) {
    $characters = '0123456789abcdefghijk!@#$%^&*lmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
function response($status, $message, $token='')
{
    header('content-type:application/json');
    header("HTTP/1.1 $status");
    $res['status'] = $status;
    $res['message'] = $message;
    $res['access_token'] = $token;
    $res['token_type']='bearer';
    echo json_encode($res);
    exit;
}

$req = file_get_contents('php://input');
parse_str($req,$params); //********

$uname=$params['uname'];
$upass=$params['upass'];
$rows=[];

$sql="select * from tbl_users where uname='$uname' and upass='$upass'";
$result=mysqli_query($conn,$sql); //$conn daron file config vojod darad ke include shode
$user=mysqli_fetch_assoc($result);
if ($user) {
   $uid=$user['uid'];
   $access_token=generateToken(50);
   mysqli_query($conn,"update tbl_users set access_token='$access_token' where uid='$uid'");
   response('200','ok',$access_token);
}
else
    response('401','UserName or Password Is Not Valid');

