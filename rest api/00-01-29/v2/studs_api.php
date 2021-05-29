<?php

function index()
{
    global $conn;
    $res = mysqli_query($conn, 'select * from tbl_studs');
    $rows = [];
    if (mysqli_num_rows($res) > 0) {
        while ($row = mysqli_fetch_assoc($res))
            $rows[] = $row;
        response(200, 'ok', $rows);
    } else
        response(404, 'not found any record');
}

function delete($sid)
{
    global $conn;
    $res = mysqli_query($conn, "delete from tbl_studs where sid=$sid");
    if ($res)
        response(200, '1 record deleted');
    else
        response(400, 'DB ERROR');
}

function insert($data)
{
    global $conn;

    $name = $data->name;
    $avgr = $data->avgr;
    $fid  = $data->fid;

    $sql = "insert into tbl_studs(name,avgr,fid)values ('$name','$avgr','$fid')";
    $res = mysqli_query($conn, $sql);
    if ($res) {
        response(200, '1 record added');
    } else {
        response(400, "DB ERROR");
    }

}

function edit($sid)
{
    global $conn;
    $sql = "select * from tbl_studs where sid=$sid";
    $row = mysqli_query($conn, $sql);
    if ($row) {
        $row = mysqli_fetch_assoc($row);
        response(200, 'record founded', $row);
    } else
        response(404, 'DB Error Edit');
}

function update($data)
{
    $sid = $data->sid;
    $name = $data->name;
    $avgr = $data->avgr;
    $fid = $data->fid;
    global $conn;
    $sql = "update tbl_studs set name ='$name',avgr='$avgr',fid='$fid' where sid='$sid'";
    $res = mysqli_query($conn, $sql);
    if ($res) {
        response(200, 'record updated');
    } else {
        response(400, "DB ERROR Update");
    }

}

function search($keys)
{
    global $conn;
    $sql = "select * from tbl_studs where 1=1";
    if (isset($keys->sid))
        $sql .= " and sid=" . $keys->sid;
    if (isset($keys->fid))
        $sql .= " and fid=" . $keys->fid;
    if (isset($keys->name))
        $sql .= " and name like '%" . $keys->name . "%'";
    $res = mysqli_query($conn, $sql);
    $rows = [];
    while ($row = mysqli_fetch_assoc($res))
        $rows[] = $row;
    response(200, 'ok', $rows);

}

switch ($method) {
    case 'index':
        index();
        break;
    case 'delete':
        delete($data->sid);
        break;
    case 'insert':
        insert($data);
        break;
    case 'edit':
        edit($data->sid);
        break;
    case 'update':
        update($data);
        break;
    case 'search':
        search($data);
        break;
    default:
        response(400, 'method not found');
}
