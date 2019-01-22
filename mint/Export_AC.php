<?php
include_once 'db_connect.php';

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
            .w3-theme-l2 {color:#fff !important;background-color:#78acce !important}
    </style>
    </head>
    <title>ดาวน์โหลดไฟล์การจัดสรรครุภัณฑ์คอมพิวเตอร์</title>
        <body >

                <br>       
                    <div class="container w3-card-4 w3-round" style="width:80% " > 
                    <br>
                    <table border="0" align="center" style="width:100%;" class="w3-teal w3-round">
                    <tr>
                    <td><h3><b>ดาวน์โหลดไฟล์การจัดสรรครุภัณฑ์คอมพิวเตอร์</b></h3></a></button></td>
                    </tr>
                    </table>
                    
                    <br>
                    <div class="table-responsive" id="result">
                    <table align="right">
                    <tr>
                    <form method="post" action="Download_AC.php">
                    
                    <td><input type="submit" name="export" class="btn btn-success" value="Export" /></td>
                    </tr>
                    </table>
                    <br>
                    <br>
                    <form id="form3"> 
                    <table id="tableshow" align="center" style="width:100%;" class="table table-striped table-bordered " >
                    <thead>
                    <tr >
                        <td style="text-align: center;">Barcode</td>
                        <td style="text-align: center;">รายการ</td>
                        <td style="text-align: center;">รหัสหน่วยงาน</td>
                        <td style="text-align: center;">ชื่อหน่วยงาน</td>
                        <td style="text-align: center;"></td>
                        <td style="text-align: center;">ชื่อ</td>
                        <td style="text-align: center;">ตำเเหน่ง</td>
                        <td style="text-align: center;">รหัสพนักงาน</td>
                        <td style="text-align: center;">Serial Number</td>
                        <td style="text-align: center;">TOR</td>
                        <td style="text-align: center;">สัญญาปี</td>
                        <td style="text-align: center;">สถานะ</td>
                        


                   </tr>
                    </thead>
                    <tr>
                    <?php
                       $status_name = "จัดสรร";
                       $sql = "SELECT * FROM allocate_detail 
                       LEFT JOIN allocate
                       ON allocate_detail.ac_id = allocate.ac_id
                       LEFT JOIN department
                       ON allocate.ac_dep = department.dep_id
                       WHERE ald_status_name = '$status_name'";

                         $result = mysqli_query($conn, $sql);
                       while($data = mysqli_fetch_array($result)):
                               $cn  =   $data['ald_con_name'];
                               $tn  =   $data['ald_type_name'];
                       
                            $tor = "SELECT * FROM tor
                            LEFT JOIN type_eq
                            ON tor.tor_type = type_eq.type_id
                            LEFT JOIN contract
                            ON tor.tor_contract = contract.con_id
                            WHERE type_name = '$tn' AND con_name = '$cn' ";
                            $result2 = mysqli_query($conn, $tor);
                            while($data2 = mysqli_fetch_array($result2)){
                                     $tor_name  = $data2['tor_name'];
                            }
                        
                        ?>
                        <td style="text-align:left"><?php echo $data['ald_eq_barcode']; ?></td>
                        <td style="text-align:left"><?php echo $data['ald_type_name']; ?></td>
                        <td style="text-align:left"><?php echo $data['dep_no']; ?></td>
                        <td style="text-align:left"><?php echo $data['dep_name']; ?></td>
                        <td style="text-align:left"><?php echo $data['ac_tname']; ?></td>
                        <td style="text-align:left"><?php echo $data['ac_name']; ?></td>
                        <td style="text-align:left"><?php echo $data['ac_position']; ?></td>
                        <td style="text-align:left"><?php echo $data['ac_empid']; ?></td>
                        <td style="text-align:left"><?php echo $data['ald_eq_serial']; ?></td>
                        <td style="text-align:left"><?php echo $tor_name; ?></td>
                        <td style="text-align:left"><?php echo $data['ald_con_name']; ?></td>
                        <td style="text-align:left"><?php echo $data['ald_status_name']; ?></td>
                        

                   
                        </tr>
                        
                       <?php endwhile; ?>
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
                                        </body>
                                        </html>
