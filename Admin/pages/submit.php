<?php
include("../../Home/db_connect.php");

?>
<!DOCTYPE html>
<html>
  <head>
    <title>QR-code</title>
    
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php include("link.php");?>
        <link rel="stylesheet" href="style.css">    
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
            }
            .search-table-outter { overflow-x: scroll; }
            .w3-theme-l2 {color:#fff !important;background-color:#e9657b !important}
    </style>
  </head>
  <body>
  <div class="modal fade" tabindex="-1" role="dialog" id="ModalViewPM">
                            <div class="modal-dialog " role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title"><b>ข้อมูลครุภัณฑ์</b></h4>
                            </div>
                                    <div class="modal-body">
                                            <form id="ViewPM" >
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                          <button type="reset" class="btn btn-danger" data-dismiss="modal">ปิด</button>
                                        </div>

                            </div>
                            </div>
                            </div>
  <br>       
                    <div class="container w3-card-4 w3-round" style="width:80% " > 
                    <br>
                    <table border="0" align="center" style="width:100%;" class="w3-teal w3-round">
                    <tr>
                    <td><h3><b>ทดสอบ QR-code</b></h3></a></button></td>
                    </tr>
                    </table>
                 
                    <div class="table-responsive" id="result">
                    <p></p>
                    <form id="form3"> 
                    <table id="tableshow" align="center" style="width:100%;" class="table table-striped table-bordered " >
                    <thead>
                    <tr >
                    <td style="text-align: center;">Barcode</td>
                        <td style="text-align: center;">Serial Number</td>
                        <td style="text-align: center;">สัญญา</td>
                        <td style="text-align: center;">ประเภทครุภัณฑ์</td>
                        <td style="text-align: center;">TOR</td>
                        <td style="text-align: center;">สถานะ</td>
                        <td style="text-align: center;">QR-Code</td>

                   </tr>
                    </thead>
                    <tr>
                    <?php
                       $sql = "SELECT * FROM equipment
                            LEFT JOIN a_status
                            ON equipment.eq_status = a_status.status_id
                            LEFT JOIN tor
                            ON equipment.eq_tor = tor.tor_id
                            LEFT JOIN contract
                            ON tor.tor_contract = contract.con_id
                            LEFT JOIN type
                            ON tor.tor_type = type.type_id WHERE status_id = 3 OR status_id = 5 OR status_id = 1";
                         $result = mysqli_query($conn, $sql);
                       while($data = mysqli_fetch_array($result)):
                         $id = $data['eq_id'];
                         $con = $data['con_name'];
                         $type = $data['type_name'];
                         $tor = $data['tor_name'];
                         $sttn = $data['status_name'];




                    ?>
                
                        <td style="text-align:left"><?php echo $data['eq_barcode']; ?></td>
                        <td style="text-align:left"><?php echo $data['eq_serial']; ?></td>
                        <td style="text-align:left"><?php echo $con; ?></td>
                        <td style="text-align:left"><?php echo $type; ?></td>
                        <td style="text-align:left"><?php echo $tor; ?></td>
                        <td style="text-align:left"><?php echo $sttn; ?></td>

                        <td><button type="button" name="idEdit" class="btn btn-primary btn-block" value="<?php echo $data['eq_id']; ?>" onclick="getidTOedit(this)">QR-code</button></td>
                        </tr>
                       <?php endwhile; ?>
                    </div>
                    </div>
                       <script>
            function showPM(str) {
            var xhttp;    
            if (str == "") {
                document.getElementById("ViewPM").innerHTML = "";
                return;
            }
            xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                document.getElementById("ViewPM").innerHTML = this.responseText;
                }
            };
            xhttp.open("GET", "getPM.php?id="+str, true);
            xhttp.send();
            }
</script>

<script>          
      function getidTOedit(str){
         var a = str.value;
         var b = str.id;
         location.href = "QRcode.php?ID="+a;
}  
</script>
  </body>
</html>

