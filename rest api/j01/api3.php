<?php
$books=[['bname'=>'php programing','price'=>1365],
        ['bname'=>'c#','price'=>19658],
        ['bname'=>'visual basic','price'=>963565]];
$books_json=json_encode($books);
echo $books_json;
