<?php

include_once("../../Home/db_connect.php");
  
  if(isset($_POST['x'])){     
        $dep_id = mysqli_escape_string($connect, $_POST['x']); 
        
    
        $sql = "DELETE from department WHERE dep_id = $dep_id";

            if(mysqli_query($connect, $sql)){
              $data = 1; 
              echo $data;
            }else{
              $data = 0;
              echo $data;
            }
          }
?>