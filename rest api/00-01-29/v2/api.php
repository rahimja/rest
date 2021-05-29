<?php
include 'config.php';
//======================== read token ==========================//
$header = apache_request_headers();//خواندن هدر ها از درخواست ارسال شده
if (isset($header['Authorization'])) {
    $oAuth = $header['Authorization'];
    $temp  = explode(' ', $oAuth);                           //تجزیه رشته
    $token = $temp[1];

    $sql = "select * from tbl_users where access_token='$token'";
    $result = mysqli_query($conn, $sql); //$conn daron file config vojod darad ke include shode
    $user = mysqli_fetch_assoc($result);
    if (!$user) {
        response('401', 'Access Denied');
    }
} else
    response('401', 'Access Denied');
//=========================================//

$request = file_get_contents('php://input');
$request = json_decode($request);
$section = $request->section;
$method  = $request->method;
$data    = $request->data;

function response($status, $message, $data = [])
{
    header('content-type:application/json');
    header("HTTP/1.1 $status");
    $res['status'] = $status;
    $res['message'] = $message;
    $res['data'] = $data;
    echo json_encode($res);
    exit;
}

switch ($section) {
    case 'studs':
        include 'studs_api.php';
        break;
    default:
        response(400, 'section not found');
}
