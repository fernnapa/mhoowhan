
<?php 

include("../../Home/db_connect.php");
  $id = $_GET['ID'];
  
  ?>

<html>
  <head>
    <title>QR-code</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link href="https://fonts.googleapis.com/css?family=Kanit|Prompt" rel="stylesheet">
  <style>
  h5{
  font-family: 'Rubik', sans-serif;
  }
  
  </style>
  </head>
  <body onload="window.print()">
  <br>
  <table align="center" border="0" class="w3-card-2 w3-round-large " >
  <tr>
    <td style="text-align:center;"><img src="https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=http://10.0.10.145/mhoowhan/Admin/pages/selectUser.php?ERFdfgRTsTR=<?php echo $id; ?>" title="Link to my Website" align="center"></td>
  </tr>
  <tr>
  <?php $sql = "SELECT * FROM `equipment` WHERE `eq_id` = $id";
  $result = mysqli_query($conn, $sql);
  while($data = mysqli_fetch_array($result))
  {
    $serial = $data['eq_serial']; 
  }
  ?>
    <td style="text-align:center;"><h5><b> Serial Number: <?php echo $serial;?></b></h5></td>
  </tr>
  </tr>
  </body>
</html>



