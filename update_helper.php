<?php
    require "conn.php";
        $serial = $_REQUEST["serial"];

        $newTodo = $_REQUEST["newTodo"];
        $query = "UPDATE todo SET todo = '$newTodo' WHERE serial = $serial;";
        $sendData = mysqli_query($conn, $query);

        if($sendData){
            header("location: index.php");
        }else{
            echo "data updating Failed";
        }
    

?>