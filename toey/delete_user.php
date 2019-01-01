<?php

require_once 'db_connect.php';
  
  if(isset($_POST['x'])){     

    $emp_id = mysqli_escape_string($conn, $_POST['x']); 


    $fet = "SELECT emp_pic FROM employee WHERE emp_id = $emp_id";
    $pic = "";

        $rs = $conn->query($fet);
        while($row = mysqli_fetch_assoc($rs))
        {
            $pic = $row["emp_pic"];
          
        }


        
    
        $sql = "DELETE from employee WHERE emp_id = $emp_id";

            if(mysqli_query($conn, $sql)){
              $data = 1;
              unlink("upload/$pic");
              echo $data;
            }else{
              $data = 0;
              echo $data;
            }
          }
?>