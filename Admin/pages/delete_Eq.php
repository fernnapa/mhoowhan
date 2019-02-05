<?php
include("../../db_connect.php");
  
  if(isset($_POST['x'])){     

    $eq_id = mysqli_escape_string($conn, $_POST['x']); 

            $sql = "DELETE from equipment WHERE eq_id = $eq_id";

            if(mysqli_query($conn, $sql)){
              $data = 1;
              echo $data;
            }else{
              $data = 0;
              echo $data;
            }
          }
?>