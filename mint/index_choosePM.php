<?php
include_once 'db_connect.php';
session_start();
$_SESSION['chooseEq'] = array();
?>
<!DOCTYPE html>
<html>
    <head>
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
         
    </style>
    </head>
    <title>ยืม-คืนครุภัณฑ์</title>
        <body>
                <br>       
                    <div class="container w3-card-4 w3-round" style="width:80% " > 
                    <br>
                    <table border="0" align="center" style="width:100%;" class="w3-teal w3-round">
                    <tr>
                    <td><h3><b>ยืม-คืนครุภัณฑ์</b></h3></a></button></td>
                    </tr>
                    </table>
                    <table border="0" align="right" style="width:17%;">
                    <tr>
                    <td><a href="create_PM.php" class="btn btn-primary btn-block"> ข้อมูลครุภัณฑ์ที่เลือก</a></button></td>
                    </tr>
                    </table>
                    <br>
                    <br>
                    <br>
                    <div class="table-responsive" id="result">
                    <p></p>
                    <form id="form3"> 
                    <table id="tableshow" align="center" style="width:100%;" class="table table-striped table-bordered " >
                    <thead>
                    <tr >
                        <td style="text-align: center;"></td>
                        <td style="text-align: center;">Barcode</td>
                        <td style="text-align: center;">Serial Number</td>
                        <td style="text-align: center;">สัญญา</td>
                        <td style="text-align: center;">ประเภทครุภัณฑ์</td>
                        <td style="text-align: center;">สถานะ</td>
                        <td style="text-align: center;">เลือกครุภัณฑ์</td>
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
                            LEFT JOIN type_eq
                            ON tor.tor_type = type_eq.type_id 
                            WHERE status_name = 'รอจัดสรร'";
                       $result = mysqli_query($conn, $sql);
                       while($data = mysqli_fetch_array($result)):

                    ?>
                        <td style="text-align:left"><?php echo $data['eq_pic']; ?></td>
                        <td style="text-align:left"><?php echo $data['eq_barcode']; ?></td>
                        <td style="text-align:left"><?php echo $data['eq_serial']; ?></td>
                        <td style="text-align:left"><?php echo $data['con_name']; ?></td>
                        <td style="text-align:left"><?php echo $data['type_name']; ?></td>
                        <td style="text-align:left"><?php echo $data['status_name']; ?></td>
                        <input type="hidden" name="id" value="<?php echo $data['eq_id']; ?>">

                        <td><button type="button" name="submit" id="submit<?php echo $data['eq_id']; ?>" class="btn btn-success btn-block" value="<?php echo $data['eq_id']; ?>" onclick="getid(this)" >เลือกครุภัณฑ์</button></td></form>
                    </tr>
                       <?php endwhile;?>
                </table>
                </form>
                </div>
                <br>
                </div>
<!-- /.data -->
<!-- /.script modal add -->
<script>
$(document).ready(function(){  
        $('#tableshow').DataTable({
        "searching": true
});  
 }); 
</script>
<script>          
      function getid(str){
         var a = str.value;
         var b = str.id;
          $(document).ready(function(){
                $.ajax({

                        url: 'insert_PM.php',
                        type: 'POST',
                        data: {'id':a},
                        success:function(res){
                            if(res == 2){
                            swal( {
                                                     title: "เลือกข้อมูลไม่สำเร็จ",
                                                     text: "ข้อมูลนี้ถูกเลือกไปเเล้ว",
                                                     icon: "error",
                                                     button: "กรอกข้อมูลอีกครั้ง",
                                                    }
                                                  );
                        }if(res == 1){
                            swal( {
                                                     title: "เลือกข้อมูลสำเร็จ",
                                                     icon: "success",
                                                     button: "ตกลง",
                                                     });
                                                     document.getElementById(b).innerHTML = "เลือกเเล้ว";
                                                     document.getElementById(b).className = "btn btn-danger btn-block";
                                                     document.getElementById(b).readonly = true;
                        }
                        }
                });
          });
}  
</script>
        </body>
</html>
