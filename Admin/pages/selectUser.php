<?php
include("../../db_connect.php");
?>
<!DOCTYPE html>
<html>
    <head>
  
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://fonts.googleapis.com/css?family=Kanit|Prompt" rel="stylesheet">

        <?php include("link.php");?>

        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">






        <style>
            table, th, td    {
            }
            td {
                padding: 5px;
                text-align: center;  
                font-size: 50px;  
            }
            th {
                padding: 5px;
            }
            body{
                font-family: 'Kanit', sans-serif;
                background-image: url("../../images/bg/bg.jpg");
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
                top:35%;
                left:67%;
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
    
    
    
    
    
    
    <table align="center" class="box" border="0" style="width:40%;" >
   
        <tr>
        <td style="font-family:Prompt;"> 
        
        <a href="../../Home/login_phone.php?ERFdfgRTsTR=<?php echo $id; ?>" class=" btn btn-primary btn-lg btn-block">
                <i class="fa fa-desktop fa-3x"></i><br><br/>
                &nbsp;&nbsp; เจ้าหน้าที่
                <br/>ศูนย์คอมพิวเตอร์
            </a></td>
        </tr>
        <tr>
        <td style="font-family:Prompt;">
        <a href="viewQR_User.php?ID=<?php echo $id; ?>" class=" btn btn-primary btn-lg btn-block">
                <i class="fa fa-users fa-3x"></i><br><br/>
                &nbsp;&nbsp;ผู้ใช้งานทั่วไป
            </a></td>
         
        
            
        </tr>
    </table>
    
   




  



    </body>
</html>
