<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
   
    <title>TODO Application using PHP CRUD Operation</title>
</head>
<body>
    <div class="container mt-5">
    
        <form method="POST" action="">
  <div class="mb-3">
    <label class="form-label fw-bold fs-1">My TO-DO</label>
    <input type="text" class="form-control" name="todo" required>
    <input type="submit" class="btn btn-primary my-3">
  </div>
</form>

        
    </div>

    <?php



    require "conn.php";
    

        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $todo = $_REQUEST["todo"];
            $query = "INSERT INTO todo (todo) VALUES ('$todo')";
            $data = mysqli_query($conn, $query);

            if(!$data){
                echo "Data store failed";
            }

            

            // print_r($arr);




        }
        $query = "SELECT * from todo";
            $data = mysqli_query($conn, $query);
            $arr = mysqli_fetch_all($data, MYSQLI_NUM);


?>


<div class="container">
<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">TO-DO</th>
      <th scope="col">Update</th>
      <th scope="col">Delete</th>
    </tr>
  </thead>
  <tbody>
    <!-- <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
    </tr> -->

    <?php
    
    for($i = 0; $i < count($arr); $i++){
        $serial = $arr[$i][0];
        $todo = $arr[$i][1];
        echo "<tr>";
        echo '<th scope="row">'. $serial . '</th>';
        echo '<td>'. $todo .'</td>';
        echo '<td>'. 
        
            '<form action="update.php" method="post">
                <input name="serial" type="number" value="'. $serial .'" style="display: none;">
                <input type="submit" value="Update" class="btn btn-primary">
            </form>'

        .'</td>';

        echo '<td>'. 
        
        '<form action="delete.php" method="post">
            <input name="serial" type="number" value="'. $serial .'" style="display: none;">
            <input type="submit" value="Delete" class="btn btn-danger">
        </form>'

    .'</td>';


        echo "</tr>";
    }


?>
  </tbody>
</table>
</div>

</body>
</html>