<?php
$url = 'http://127.0.0.1/mabahes_tamrin/rest%20api/j01/api3.php';
$client = curl_init($url);
curl_setopt($client, CURLOPT_RETURNTRANSFER, 1);
$result = curl_exec($client);
curl_close($client);
$books = json_decode($result);
?>
<table width="300px" border="1" align="center">
    <tr>
        <th>book name</th>
        <th>price</th>
    </tr>
    <?php foreach ($books as $book) { ?>
        <tr>
            <td><?= $book->bname ?></td>
            <td><?= $book->price ?></td>
        </tr>
    <?php } ?>
</table>
