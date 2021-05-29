<?php
$request = file_get_contents('php://input');
$request = json_decode($request);
$method  = $request->method;
$section = $request->section;
$data    = $request->data;
$tool    = $data->tool;
$arz     = $data->arz;
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

function mohit($tool, $arz)
{
    $result = 2 * ($tool + $arz);
    response(200, 'ok', $result);
}

function masahat($tool, $arz)
{
    $result = $tool * $arz;
    response(200, 'ok', $result);
}

switch ($method) {
    case 'mohit':
        mohit($tool, $arz);
        break;
    case 'masahat':
        masahat($tool, $arz);
        break;
    default:
        response(400, 'method not found');
}
