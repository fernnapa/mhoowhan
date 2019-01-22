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
    <title>รายการจัดสรรครุภัณฑ์</title>
        <body >
<!-- Modal ดูข้อมูลPM -->
        <div class="modal fade" tabindex="-1" role="dialog" id="ModalViewAC">
                            <div class="modal-dialog " role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title"><b>รายการจัดสรรครุภัณฑ์</b></h4>
                            </div>
                                    <div class="modal-body">
                                            <form id="ViewAC" >
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                          <button type="reset" class="btn btn-danger" data-dismiss="modal">ปิด</button>
                                        </div>

                            </div>
                            </div>
                            </div>
<!-- Modal คืน -->
            <!-- <div class="modal fade" tabindex="-1" role="dialog" id="ModalRefund">
                <div class="modal-dialog" role="document">
                <div class="modal-content w3-theme-l2" >
                <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title"><b>วันที่คืนครุภัณฑ์</b></h4>
                    </div>
                        <div class="modal-body">
                            <form id="Date_RFN_PM" >
                            <table align="center">
                            <tr>
                            <td><input type="hidden" name="id_rf" id="id_rf" class="form-control"></td>
                            <td>วันที่คืนครุภัณฑ์ </td>
                            <td><input type="date" name="pm_date_refund" id="pm_date_refund" class="form-control"></td>
                            </tr>
                            </table>
                            </form>
                            </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-success"  name="Date_rfn" id="Date_rfn" form="Date_RFN_PM">บันทึกข้อมูล</button>
                                    <button type="reset" class="btn btn-danger" data-dismiss="modal">ปิด</button>
                                </div>
                                </div>
                                </div>
                                </div> -->
<!-- Modal คืน -->
                <br>       
                    <div class="container w3-card-4 w3-round" style="width:80% " > 
                    <br>
                    <table border="0" align="center" style="width:100%;" class="w3-teal w3-round">
                    <tr>
                    <td><h3><b>รายการจัดสรรครุภัณฑ์</b></h3></a></button></td>
                    </tr>
                    </table>
                    
                    <br>
                    <div class="table-responsive" id="result">
                    <p></p>
                    <form id="form3"> 
                    <table id="tableshow" align="center" style="width:100%;" class="table table-striped table-bordered " >
                    <thead>
                    <tr >
                        <td style="text-align: center;">จุดประสงค์การจัดสรร</td>
                        <td style="text-align: center;">ชื่อผู้เช่ายืม</td>
                        <td style="text-align: center;">หน่วยงาน</td>
                        <td style="text-align: center;">พนักงานจัดสรร</td>
                        <td style="text-align: center;">สถานะ</td>
                      
                        <td style="text-align: center;">รายละเอียด</td>
                        <td></td>

                   </tr>
                    </thead>
                    <tr>
                    <?php
                       $sql = "SELECT * FROM allocate
                            LEFT JOIN a_status
                            ON allocate.ac_status = a_status.status_id
                            LEFT JOIN department
                            ON allocate.ac_dep = department.dep_id
                          
                            WHERE ac_status = 9 OR ac_status = 7 OR ac_status = 6 OR ac_status= 2 OR ac_status= 8 OR ac_status= 10 OR ac_status= 11";
                         $result = mysqli_query($conn, $sql);
                       while($data = mysqli_fetch_array($result)):
                         $id = $data['ac_id'];
                         $stn = $data['status_name'];
//                          $test =0;

                        //  $exp_date = $data['pm_enddate'];
                        //  $today_date = date('Y-m-d');
                        //  $exp = strtotime($exp_date);
                        //  $td = strtotime($today_date);
                        //  if($td > $exp){
                        //     $test =1;
                         
                       ?>

                        <?php 
                            // if($test == 1){
                            //     $status = 12; 
                            //     $update = "UPDATE `allocate` SET `ac_status`='$status' WHERE ac_id = $id ";
                            //     $rs = mysqli_query($conn, $update);
                            //     $st = "SELECT * FROM allocate
                            //     LEFT JOIN a_status
                            //     ON allocate.ac_status = a_status.status_id
                            //     LEFT JOIN department
                            //     ON allocate.ac_dep = department.dep_id WHERE ac_id = $id";
                            //     $rs1 = mysqli_query($conn, $st);
                            //     while($ex = mysqli_fetch_array($rs1)){
                            //       $stn = $ex['ac_status'];
                            //       $name = $ex['ac_name'];
                            //       $username = $ex['ac_username'];
                            //       $dep = $ex['dep_name'];
                            //       $emp = $ex['pm_empno'];
                            //       $status_name = $ex['status_name'];
                            //     }
                            
                        
                        if($stn == "รอตรวจสอบ"){ ?>
                        <td style="text-align:left"><?php echo $data['ac_title']; ?></td>
                        <td style="text-align:left"><?php echo $data['ac_name']; ?></td>
                        <td style="text-align:left"><?php echo $data['dep_name']; ?></td>
                        <td style="text-align:left"><?php echo $data['ac_empid']; ?></td>
                        <td style="text-align:left"><?php echo $data['status_name']; ?></td>
                        

                        <td><button type="button" name="submitview" class="btn btn-primary btn-block"  data-toggle="modal" data-target="#ModalViewAC" onclick="show_AC(<?php echo $data['ac_id']; ?>)">ดูรายละเอียด</button></td>
                        <td><a href='pdf.php?ac_id=<?php echo $data['ac_id'];?>' class='btn btn-danger' data-role='pdf'>PDF</a></button></td>

                    <?php } ?>
                    <?php if($stn == "ไม่ผ่านการตรวจสอบ"){ ?>  
                        <td style="text-align:left"><?php echo $data['ac_title']; ?></td>
                        <td style="text-align:left"><?php echo $data['ac_name']; ?></td>
                        <td style="text-align:left"><?php echo $data['dep_name']; ?></td>
                        <td style="text-align:left"><?php echo $data['ac_empid']; ?></td>
                        <td style="text-align:left"><?php echo $data['status_name']; ?></td>
                        

                        <td><button type="button" name="submitview" class="btn btn-primary btn-block"  data-toggle="modal" data-target="#ModalViewAC" onclick="showAC_head(<?php echo $data['ac_id']; ?>)">ดูรายละเอียด</button></td>
                        <td><a href='pdf.php?ac_id=<?php echo $data['ac_id'];?>' class='btn btn-danger' data-role='pdf'>PDF</a></button></td>

                    <?php } if($stn == "ไม่อนุมัติ"){ ?>
                        <td style="text-align:left"><?php echo $data['ac_title']; ?></td>
                        <td style="text-align:left"><?php echo $data['ac_name']; ?></td>
                        <td style="text-align:left"><?php echo $data['dep_name']; ?></td>
                        <td style="text-align:left"><?php echo $data['ac_empid']; ?></td>
                        <td style="text-align:left"><?php echo $data['status_name']; ?></td>
                        

                        <td><button type="button" name="submitview" class="btn btn-primary btn-block"  data-toggle="modal" data-target="#ModalViewAC" onclick="showAC(<?php echo $data['ac_id']; ?>)">ดูรายละเอียด</button></td>
                        <td><a href='pdf.php?ac_id=<?php echo $data['ac_id'];?>' class='btn btn-danger' data-role='pdf'>PDF</a></button></td>

                    <?php } if($stn == "อนุมัติ"){ ?>
                        <td style="text-align:left"><?php echo $data['ac_title']; ?></td>
                        <td style="text-align:left"><?php echo $data['ac_name']; ?></td>
                        <td style="text-align:left"><?php echo $data['dep_name']; ?></td>
                        <td style="text-align:left"><?php echo $data['ac_empid']; ?></td>
                        <td style="text-align:left"><?php echo $data['status_name']; ?></td>
                        

                        <td><button type="button" name="submitview" class="btn btn-primary btn-block"  data-toggle="modal" data-target="#ModalViewAC" onclick="showAC(<?php echo $data['ac_id']; ?>)">ดูรายละเอียด</button></td>
                        <td><a href='pdf.php?ac_id=<?php echo $data['ac_id'];?>' class='btn btn-danger' data-role='pdf'>PDF</a></button></td>

                    <?php }if($stn == "ผ่านการตรวจสอบ"){ ?>
                        <td style="text-align:left"><?php echo $data['ac_title']; ?></td>
                        <td style="text-align:left"><?php echo $data['ac_name']; ?></td>
                        <td style="text-align:left"><?php echo $data['dep_name']; ?></td>
                        <td style="text-align:left"><?php echo $data['ac_empid']; ?></td>
                        <td style="text-align:left"><?php echo $data['status_name']; ?></td>
                        

                        <td><button type="button" name="submitview" class="btn btn-primary btn-block"  data-toggle="modal" data-target="#ModalViewAC" onclick="showAC(<?php echo $data['ac_id']; ?>)">ดูรายละเอียด</button></td>
                        <td><a href='pdf.php?ac_id=<?php echo $data['ac_id'];?>' class='btn btn-danger' data-role='pdf'>PDF</a></button></td>
                    
                    <?php }if($stn == "รออนุมัติ"){?>
                        <td style="text-align:left"><?php echo $data['ac_title']; ?></td>
                        <td style="text-align:left"><?php echo $data['ac_name']; ?></td>
                        <td style="text-align:left"><?php echo $data['dep_name']; ?></td>
                        <td style="text-align:left"><?php echo $data['ac_empid']; ?></td>
                        <td style="text-align:left"><?php echo $data['status_name']; ?></td>
                        

                         <td><button type="button" name="submitview" class="btn btn-primary btn-block"  data-toggle="modal" data-target="#ModalViewAC" onclick="showAC_head(<?php echo $data['ac_id']; ?>)">ดูรายละเอียด</button></td>
                         <td><a href='pdf.php?ac_id=<?php echo $data['ac_id'];?>' class='btn btn-danger' data-role='pdf'>PDF</a></button></td>

                         <?php }if($stn == "จัดสรร"){ ?>
                        <td style="text-align:left"><?php echo $data['ac_title']; ?></td>
                        <td style="text-align:left"><?php echo $data['ac_name']; ?></td>
                        <td style="text-align:left"><?php echo $data['dep_name']; ?></td>
                        <td style="text-align:left"><?php echo $data['ac_empid']; ?></td>
                        <td style="text-align:left"><?php echo $data['status_name']; ?></td>
                        
                        <td><button type="button" name="submitview" class="btn btn-primary btn-block"  data-toggle="modal" data-target="#ModalViewAC" onclick="showAC(<?php echo $data['ac_id']; ?>)">ดูรายละเอียด</button></td>
                        <td><a href='pdf.php?ac_id=<?php echo $data['ac_id'];?>' class='btn btn-danger' data-role='pdf'>PDF</a></button></td>

                    <?php } ?>
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

<script>
            function showAC(str) {
            var xhttp;    
            if (str == "") {
                document.getElementById("ViewAC").innerHTML = "";
                return;
            }
            xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                document.getElementById("ViewAC").innerHTML = this.responseText;
                }
            };
            xhttp.open("GET", "get_ALL_AC.php?id="+str, true);
            xhttp.send();
            }
</script>

<script>
            function show_AC(str) {
            var xhttp;    
            if (str == "") {
                document.getElementById("ViewAC").innerHTML = "";
                return;
            }
            xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                document.getElementById("ViewAC").innerHTML = this.responseText;
                }
            };
            xhttp.open("GET", "getAC.php?id="+str, true);
            xhttp.send();
            }
</script>

<script>
            function showAC_head(str) {
            var xhttp;    
            if (str == "") {
                document.getElementById("ViewAC").innerHTML = "";
                return;
            }
            xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                document.getElementById("ViewAC").innerHTML = this.responseText;
                }
            };
            xhttp.open("GET", "getAC_head.php?id="+str, true);
            xhttp.send();
            }
</script>




<script>          
                $(document).ready(function(){  
                  $('#Date_rfn').on("click", function(){  
                       $('#Date_RFN_PM').submit();  
                  });  
                  $('#Date_RFN_PM').on('submit', function(e){  
                       e.preventDefault();  
                       $.ajax({  
                            url :"All_refund_PM.php",  
                            method:"POST",  
                            data:new FormData(this),  
                            contentType:false,  
                            processData:false,  
                            success:function(data){
                                var b = data;
                                alert(b);
                                if(data == 1){
                                             swal( {
                                                     title: "ครภัณฑ์นี้ทำการคืนเรียบร้อย",
                                                     icon: "success",
                                                     button: "ตกลง",
                                                     }).then (function(){ 
                                                    location.href = "index_ALL_PM.php";
                                                    }
                                                    );
                                }if(data == 2){
                                             swal( {
                                                     title: "กรุณากรอกเหตุผล",
                                                     icon: "error",
                                                     button: "กรอกข้อมูลอีกครั้ง",
                                                    }
                                                  );
                                }if (data == 3){
                                             swal( {
                                                     title: "เพิ่มข้อมูลไม่สำเร็จ",
                                                     text: "Barcodeนี้ ถูกใช้ในระบบเเล้ว",
                                                     icon: "error",
                                                     button: "ตกลง",
                                                    });
                                }if(data == 4){
                                            swal( {
                                                     title: "เพิ่มข้อมูลไม่สำเร็จ",
                                                     text: "Serialนี้ ถูกใช้ในระบบเเล้ว",
                                                     icon: "error",
                                                     button: "ตกลง",
                                                    });
                                }if (data == 5){
                                            swal( {
                                                     title: "ส่งผลตรวจสอบไม่สำเร็จ",
                                                     text: "กรุณากรอกข้อมูลเหตุผล",
                                                     icon: "error",
                                                     button: "ตกลง",
                                                    });
                                }if (data == 6){
                                            swal( {
                                                     title: "เพิ่มข้อมูลไม่สำเร็จ",
                                                     text: "เกิดข้อผิดพลาดเกี่ยวกับฐานข้อมูล",
                                                     icon: "error",
                                                     button: "ตกลง",
                                                    });
                                }if (data == 7){
                                    swal( {
                                                     title: "เพิ่มข้อมูลไม่สำเร็จ",
                                                     text: "กรุณานำไฟล์ที่เป็นนามสกุล.jpg",
                                                     icon: "error",
                                                     button: "ตกลง",
                                                    });
                                }     
                                                }  
                       })  
                  });  
             });     
            </script>  


<!-- <script>          
      function expired(str){
         var a = str.value;
         var b = str.id;
         swal({
  title: "คุณต้องการลบข้อมูลนี้ใช่หรือไม่",
  icon: "warning",
  buttons: true,
  dangerMode: true,
}).then (function (isConfirm){
    if (isConfirm) {
          $(document).ready(function(){
                $.ajax({

                        url: 'All_expired_PM.php',
                        type: 'POST',
                        data: {'id':a},
                        success:function(res){
                            alert(res);
                            if(res == 2){
                            swal( {
                                                     title: "เกิดข้อผิดพลาด",
                                                     text: "เกิดข้อผิดพลาดเกี่ยวกับฐานข้อมูล",
                                                     icon: "error",
                                                     button: "กรุณาลองอีกครั้ง",
                                                    }
                                                  );
                        }if(res == 1){
                            swal( {
                                                     title: "ลบข้อมูลนี้เรียบร้อย",
                                                     icon: "success",
                                                     button: "ตกลง",
                                                     }).then (function(){ 
                                                     location.reload();
                                                    }
                                                    );
                                                 
                        }
                        }
                });

          });

    }else{
        swal("ยกเลิกการลบ", "ข้อมูลนี้ยังคงอยู่ :)", "error");
    }

    });
}  
</script> -->
<script>          
      function idrefund(str){
         var a = str.value;
         var b = str.id;
         document.getElementById("id_rf").value = a;

}  
</script>
<script>          
      function idexpired(str){
         var a = str.value;
         var b = str.id;
         document.getElementById("id_exp").value = a;

}  
</script>



        </body>
</html>
