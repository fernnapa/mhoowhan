<?php
include("../../Home/db_connect.php");
?>
<!DOCTYPE html>
<html>
    <head>
  
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php include("link.php");?>

        <link href="https://fonts.googleapis.com/css?family=Kanit|Prompt" rel="stylesheet">





        <style>
            table, th, td    {
            }
            td {
                padding: 5px;
                text-align: center;    
            }
            th {
                padding: 5px;
            }
            body{
                font-family: 'Kanit', sans-serif;
                background-image: url("../../img/auth/bg.jpg");
                height: auto; 
                background-size: cover;
            }
            .search-table-outter { overflow-x: scroll; }

            .box {
    width:300px;
    height:100px;
    position:fixed;
    margin-left:-150px; /* half of width */
    margin-top:-50px;  /* half of height */
    top:50%;
    left:50%;
}
         
    </style>


        
   
    </head>
    <title>ผู้ใช้</title>
    <body>

        

<?php
        if(isset($_GET['ERFdfgRTsTR'])){
            $id = $_GET['ERFdfgRTsTR'];
        }
     
        if(isset($_GET['id'])){
            $id = $_GET['id'];
        }

?>
    
    
    
    
    
    
    <table align="center" class="box" border="0">
        <tr>

        <td> <a href="../../Home/login_phone.php?ERFdfgRTsTR=<?php echo $id; ?>" class="btn btn-success btn-block" style="font-family:Prompt;">เจ้าหน้าที่ศูนย์คอมพิวเตอร์</a></td>
        </tr>
        <tr>
        <td><a href="viewQR_User.php?ID=<?php echo $id; ?>" class="btn btn-success btn-block" style="font-family:Prompt;">ผู้ใช้งานทั่วไป</a></td>
        </tr>
    </table>
    





  



    </body>
</html>
