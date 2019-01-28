<?php $id = $_GET['ID'];
  ?>

<html>
  <head>
    <title>QR-code</title>
  </head>
  <body onload="window.print()">
  
    <img src="https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=http://10.0.10.145/mhoowhan/Admin/pages/selectUser.php?ERFdfgRTsTR=<?php echo $id; ?>" title="Link to my Website" align="center">
  </body>
</html>



