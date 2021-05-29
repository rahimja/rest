<?php
$request = file_get_contents('php://input');
parse_str($request, $params);
$method = $params['method'];
$tool = $params['tool'];
$arz = $params['arz'];

function mohit($tool,$arz)
{
    $result = 2 * ($tool + $arz);
    return $result;
}
function masahat($tool,$arz)
{
    $result = $tool*$arz;
    return $result;
}
switch ($method){
    case 'mohit':
        $res=mohit($tool,$arz);
        break;
    case 'masahat':
        $res=masahat($tool,$arz);
        break;
}
// استفاده از کدر
header('content-type:application/json');
header('HTTP/1.1 200');
header('x-author:rahim jafari');
echo $res;