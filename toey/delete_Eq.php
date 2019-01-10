<?php

require_once 'db_connect.php';
  
  if(isset($_POST['x'])){     

    $eq_id = mysqli_escape_string($conn, $_POST['x']); 


    $fet = "SELECT * FROM equipment WHERE eq_id = $eq_id";
    $pic = "";

        $rs = $conn->query($fet);
        while($row = mysqli_fetch_assoc($rs))
        {
            $pic = $row["eq_pic"];
          
        }
       
            $sql = "DELETE from equipment WHERE eq_id = $eq_id";

            if(mysqli_query($conn, $sql)){
              $data = 1;
              unlink("../../toey/equipment_pic/$pic");
              echo $data;
            }else{
              $data = 0;
              echo $data;
            }
          }
?>