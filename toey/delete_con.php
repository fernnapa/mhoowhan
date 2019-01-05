<?php

require_once 'db_connect.php';
  
  if(isset($_POST['x'])){     
    $con_id = mysqli_escape_string($conn, $_POST['x']); 
       
    
        $sql = "DELETE from contract WHERE con_id = $con_id";

            if(mysqli_query($conn, $sql)){
              $data = 1;
              echo $data;
            }else{
              $data = 0;
              echo $data;
            }
          }
?>