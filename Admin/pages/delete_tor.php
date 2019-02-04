<?php

include("../../db_connect.php");


  if(isset($_POST['x'])){     
    $tor_id = mysqli_escape_string($conn, $_POST['x']); 
       
    
        $sql = "DELETE from tor WHERE tor_id = $tor_id";

            if(mysqli_query($conn, $sql)){
              $data = 1;
              echo $data;
            }else{
              $data = 0;
              echo $data;
            }
          }
?>