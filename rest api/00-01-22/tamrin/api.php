<?php
$request=file_get_contents("php://input");
parse_str($request,$params);
$method=$params['method'];
$tool  =$params['tool'];
$arz   =$params['arz'];

function response($status,$message,$data=[]){
    header('content-type:application/json');
    header("HTTP/1.1 $status");
    $res['status']=$status;
    $res['message']=$message;
    $res['data']=$data;
    $res=json_encode($res);
    echo $res;
    exit;
}
function mohit($t,$a){
    $result=($t+$a)*2;
    response(200,'ok',$result);
}
function masahat($t,$a){
    $result=$t*$a;
    response(200,'ok',$result);
}
switch ($method){
    case 'mohit':
        mohit($tool,$arz);
        break;
    case 'masahat':
        masahat($tool,$arz);
        break;
    default:
        response(400,'Method Not Found');
}