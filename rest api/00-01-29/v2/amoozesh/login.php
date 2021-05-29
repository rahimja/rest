<?php
if (isset($_POST['uname'])) {
    $uname = $_POST['uname'];
    $upass = $_POST['upass'];
    include 'client.php';
    $res=getToken($uname, $upass);
    if($res->status==200)
    {
        $_SESSION['access_token']=$res->access_token;
        header('location:studs_index.php');
    }
    else
        echo $res->message;

}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../../../bs4/css/bootstrap.min.css">
    <title>login</title>
</head>
<body>
<div class="container">
    <div style="width: 400px;height: 400px;margin: auto" class="alert alert-info mt-5">
        <form action="login.php" method="post" class="mt-5">
            <input placeholder="UserName " type="text" name="uname" class="form-control"><br/>
            <input placeholder="Password" type="text" name="upass" class="form-control"><br>
            <input type="submit" value="Login" class="btn btn-success">
        </form>
    </div>
</div>
</body>
</html>