<?php
require "conn.php";


$serial = $_REQUEST["serial"];
// echo $serial;
$query = "SELECT * FROM todo WHERE serial = $serial;";

$data = mysqli_query($conn, $query);
$arr = mysqli_fetch_all($data, MYSQLI_NUM);

$todo = $arr[0][1];



?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Update</title>
</head>
<body>
<div class="container mt-5">
    <form action="update_helper.php" method="post">
        <input type="text" style="display: none;" name="serial" value="<?php
                                                echo $serial;  ?>">
        <input type="text" name="newTodo" value="<?php
                                                echo $todo;  ?>" class="form-control" required>
        <input type="submit" value="Update" class="btn btn-primary mt-3">
    </form>
</div>
</body>
</html>


    
    
