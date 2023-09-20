<?php
require "conn.php";

$serial = $_REQUEST["serial"];

// echo $serial;

$query = "DELETE FROM todo WHERE serial = '$serial';";
$isDeleted = mysqli_query($conn, $query);
if($isDeleted){
    header("location: index.php");
}else{
    echo "Delete failed";
}

?>