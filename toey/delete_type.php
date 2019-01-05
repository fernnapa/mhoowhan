<?php

require_once 'db_connect.php';
  
  if(isset($_POST['x'])){     
    $type_id = mysqli_escape_string($conn, $_POST['x']); 
       
    
        $sql = "DELETE from type WHERE type_id = $type_id";

            if(mysqli_query($conn, $sql)){
              $data = 1;
              echo $data;
            }else{
              $data = 0;
              echo $data;
            }
          }
?>