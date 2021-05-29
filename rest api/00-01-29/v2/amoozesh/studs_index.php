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

    <table class="table table-striped table-bordered ">
        <thead>
        <tr>
            <th>id</th>
            <th>name</th>
            <th>avgr</th>
            <th>fid</th>
            <th><a class="btn btn-success" href="studs_add.php">Add New</a>
                <a class="btn btn-success" href="studs_search.php">Search</a></th>
        </tr>
        </thead>
        <tbody>
        <?php
        include('client.php');
        $res = request('studs', 'index');
        $rows = $res->data;
        if ($res->status == 200):
            ?>
            <?php foreach ($rows as $row) { ?>
            <tr>
                <td><?= $row->sid ?></td>
                <td><?= $row->name ?></td>
                <td><?= $row->avgr ?></td>
                <td><?= $row->fid ?></td>
                <td><a class="btn btn-danger" href="studs_delete.php?sid=<?= $row->sid ?>">Delete</a>
                    <a class="btn btn-info" href="studs_edit.php?sid=<?= $row->sid ?>"> Edit </a></td>
            </tr>

        <?php } ?>
        <?php else : ?>
            <tr>
                <td colspan="5">
                    <h2 class="alert alert-danger"><?= $res->message ?></h2>
                </td>
            </tr>
        <?php endif; ?>
        </tbody>
    </table>

</div>
</body>
</html>