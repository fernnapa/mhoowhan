
<?php

require_once 'db_connect.php';

      if($_POST['dep_name'] != ""  && $_POST['dep_latitude'] != "" && $_POST['dep_longtitude'] != ""){
        $dep_name = mysqli_escape_string($conn, $_POST['dep_name']); 
        $dep_latitude = mysqli_escape_string($conn, $_POST['dep_latitude']); 
        $dep_longtitude = mysqli_escape_string($conn, $_POST['dep_longtitude']); 
    
      $result = "SELECT * FROM department WHERE dep_name = '$dep_name'";
      $result = mysqli_query($conn, $result);
        $num_rows = mysqli_num_rows($result);        
        echo $num_rows;
              if($num_rows>0){
               $data = 2;
                echo $data;
        }else{
                $sql = "INSERT INTO `department`(`dep_name`, `latitude`, `longtitude`) VALUES 
                      ('$dep_name','$dep_latitude','$dep_longtitude')";
        
                        if(mysqli_query($conn, $sql)){
                                      $data = 1; 
                                      echo $data;
                        }else{
                                      $data = 0;
                                      echo $data;
                                    }
              }
      }else{
              $data = 0;
              echo $data;
            }
?>
 
