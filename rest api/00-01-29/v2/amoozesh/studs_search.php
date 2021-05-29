<?php
if (isset($_POST['name'])) {
    $data = [];
    if ($_POST['sid'] != '')
        $data['sid'] = $_POST['sid'];
    if ($_POST['name'] != "")
        $data['name'] = $_POST['name'];
    if ($_POST['fid'] != '')
        $data['fid'] = $_POST['fid'];
    include 'client.php';
    $res = request('studs', 'search', $data);
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
    <title>Document</title>
</head>
<body>
<div class="container mt-5">
    <div class="row">
        <div class="col">
            <h2 class="alert alert-info">Search In Students</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4">
            <form action="studs_search.php " method="post">
                sid:<input type="text" class="form-control" name="sid">
                name:<input type="text" class="form-control" name="name">
                fid:<input type="text" class="form-control" name="fid"><br/>
                <input type="submit" value="Search" class="btn btn-success">
            </form>
        </div>
        <div class="col-sm-8">
            <?php
            if (isset($res)):
                if ($res->status == 200):
                    ?>
                    <table class="table table-striped table-bordered ">
                        <thead>
                        <tr>
                            <th>id</th>
                            <th>name</th>
                            <th>avgr</th>
                            <th>fid</th>
                            <th><a class="btn btn-success" href="studs_add.php">Add New</a></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($res->data as $row) : ?>
                            <tr>
                                <td><?= $row->sid ?></td>
                                <td><?= $row->name ?></td>
                                <td><?= $row->avgr ?></td>
                                <td><?= $row->fid ?></td>
                                <td><a class="btn btn-danger" href="studs_delete.php?sid=<?= $row->sid ?>">Delete</a>
                                    <a class="btn btn-info" href="studs_edit.php?sid=<?= $row->sid ?>"> Edit </a></td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php else:echo $res->message; endif;?>
            <?php else:echo 'res is empty'; endif; ?>
        </div>
    </div>
</div>
</body>
</html>
