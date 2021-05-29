<?php
if(isset($_POST['name'])) {
    $data['sid'] = $_POST['sid'];
    $data['name'] = $_POST['name'];
    $data['avgr'] = $_POST['avgr'];
    $data['fid'] = $_POST['fid'];
    include 'client.php';
    $res = request('studs', 'update', $data);
    if ($res->status == 200)
        header('location:studs_index.php');
    else
        echo $res->message;
}
$sid=$_GET['sid'];
include 'client.php';
$res=request('studs','edit',['sid'=>$sid]);
if ($res->status==200):
$row=$res->data;
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../../../bs4/css/bootstrap.min.css">
    <title>Document</title>
</head>
<body>
<div class="container mt-5">
    <div class="row">
        <div class="col">
            <h2 class="alert alert-secondary">Edit Student</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <form action="studs_edit.php" method="post">
                sid:<input readonly type="text" class="form-control" name="sid"   value="<?=$row->sid?>">
                name:<input type="text" class="form-control" name="name" value="<?=$row->name?>">
                avgr:<input type="text" class="form-control" name="avgr" value="<?=$row->avgr?>">
                fid:<input type="text" class="form-control" name="fid"   value="<?=$row->fid?>"><br/>
                <input type="submit" value="save" class="btn btn-success">
            </form>
        </div>
    </div>
</div>
</body>
</html>
<?php
else:
    echo $res->message;
    endif;
    ?>