<?php  
session_start();
include("../db_connect.php");
?>  
<!DOCTYPE html>
<html lang="en">

<head>
  
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <?php include("menu/link.php"); ?>
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
            }
            .search-table-outter { overflow-x: scroll; }
            .w3-theme-l2 {color:#fff !important;background-color:#e9657b !important}

            .modal-dialog.a{
                max-width : 835px;
                max-height: 550px;

            }
    </style>



</head>
<title>รายการยืม-คืนครุภัณฑ์ที่รออนุมัติ</title>

<?php include("menu/navbar_leader.php"); ?>

<body>
<div class="card">
      <div class="card-body">
    
<!-- Modal ดูข้อมูลPM -->

<div class="modal fade" tabindex="-1" role="dialog" id="ModalViewPM">
                            <div class="modal-dialog a" role="document">
                            <div class="modal-content">
                            <div class="card">
                            <div class="card-body">
                            <div class="modal-header">
                                <h4 class="modal-title" style="font-family:Prompt; font-weight: bold;"><b>ข้อมูลการยืม-คืนครุภัณฑ์</b></h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            </div>
                                    <div class="modal-body table-responsive">
                                            <form id="ViewPM" >
                                            </form>
                                    </div>
                                    <div class="modal-footer">
                                   
                                    <button type="button" class="btn btn-success"  value="PM_pass" name="PM_pass" id="PM_pass" form="ViewPM" style="font-family:Prompt;">อนุมัติ</button>
                                    <button type="button" class="btn btn-danger"  value="To_note" data-toggle="modal" data-target="#ModalNote"  id="To_note" name="To_note" form="ViewPM" style="font-family:Prompt;">ไม่อนุมัติ</button>
                                    </div>

                            </div>
                            </div>
                            </div>
                            </div>
                            </div>
<!-- Modal บอกเหตุผที่ไม่ให้ผ่าน -->
            <div class="modal fade" tabindex="-1" role="dialog" id="ModalNote">
                <div class="modal-dialog" role="document">
                <div class="modal-content w3-theme-l2" >
                <div class="modal-header">
                                <h4 class="modal-title" style="font-family:Prompt;"><b>เหตุผลที่ไม่ผ่านการตรวจสอบ</b></h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                        <div class="modal-body table-responsive">
                            <form id="NotePM" >
                            <table align="center">
                            <tr>
                            <td><input type="hidden" name="id_pm" id="id_pm" class="form-control"></td>
                            <td><input type="hidden" name="pm_head_dc" id="pm_head_dc" class="form-control" value="<?php echo $_SESSION["User"] ?>"></td>
                            <td><input type="hidden" name="pm_dc_position" id="pm_dc_position" class="form-control" value="<?php echo $_SESSION["emp_position"]?>"></td>

                            <td style="font-family:Prompt;">เหตุผลที่ไม่ผ่านการตรวจสอบ: </td>
                            <td><input type="text" name="pm_note" id="pm_note" class="form-control"></td>
                            </tr>
                            </table>
                            </form>
                            </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-success"  name="Note_PM" id="Note_PM" form="NotePM" style="font-family:Prompt;">ส่งผลการตรวจสอบ</button>
                                    <button type="reset" class="btn btn-danger" data-dismiss="modal" style="font-family:Prompt;">ปิด</button>
                                </div>
                            </div>
                        </div>
                    </div>

<!-- Modal บอกเหตุผที่ไม่ให้ผ่าน -->  
                    <div class="container" > 

                    <table border="0" align="center" style="width:100%;" class="w3-teal">
                    <tr>
                    <td><p><h3 style="font-family:Prompt;"><b>รายการยืม-คืนครุภัณฑ์ที่รออนุมัติ</b></h3></a></button></td>
                    </tr>
                    </table>
           
                    <div class="table-responsive" id="result">
                    <p></p>
                    <form id="form3"> 
                    <table id="tableshow" align="center" style="width:100%;" class="table table-striped table-bordered " >
                    <thead>
                    <tr style="font-family:Prompt; font-weight: bold; font-size: 15px;">
                        <td style="text-align: center;">จุดประสงค์การยืม-คืน</td>
                        <td style="text-align: center;">ชื่อผู้เช่ายืม</td>
                        <td style="text-align: center;">หน่วยงาน</td>
                        <td style="text-align: center;">พนักงานจัดสรร</td>
                        <td style="text-align: center;">สถานะ</td>
                        <td style="text-align: center;"></td>
                   </tr>
                    </thead>
                    <tr>
                    <?php
                       $sql = "SELECT * FROM permit
                            LEFT JOIN a_status
                            ON permit.pm_status = a_status.status_id
                            LEFT JOIN department
                            ON permit.pm_dep = department.dep_id
                            WHERE pm_status= 6";
                       $result = mysqli_query($conn, $sql);
                       $num_rows = mysqli_num_rows($result);        
                       if($num_rows > 0){
                       while($data = mysqli_fetch_array($result))
                       {
                    ?>
                        <td style="text-align:left"><?php echo $data['pm_name']; ?></td>
                        <td style="text-align:left"><?php echo $data['pm_username']; ?></td>
                        <td style="text-align:left"><?php echo $data['dep_name']; ?></td>
                        <td style="text-align:left"><?php echo $data['pm_empno']; ?></td>
                        <td style="text-align:left"><?php echo $data['status_name']; ?></td>
                        <td><button type="button" name="submitviewPM" class="btn btn-success btn-block"  data-toggle="modal" data-target="#ModalViewPM" onclick="ShowData(<?php echo $data['pm_id']; ?>)" style="font-family:Prompt;"><i class="mdi mdi-file-document"></i>ดูรายการยืม-คืน</button></td></form>
                    </tr>
                       <?php } ?>
                       <?php }else{ ?>
                        <td style="text-align: center;" colspan="6" ><font color="#FF3333"; size="2px;" ><b>ไม่มีรายการยืมครุภัณฑ์ที่รออนุมัติ</b></font></td>
                       <?php } ?>
                </table>
                </form>
                </div>
                <br>
                </div>
<!-- /.data -->



                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <footer class="footer">
          <div class="container-fluid clearfix">
          <span class="copytext">Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | <a href="http://ccs.sut.ac.th/2012/" target="_blank">The Center for Computer Services. SUT</a></span>
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  </div>
  </div>
  
</body>
</html>


<!-- /.script modal add -->
<script>
$(document).ready(function(){
      
        $('#tableshow').DataTable({
        "searching": true,
        "language": {
            "lengthMenu": "ข้อมูลเเสดง _MENU_ ต่อหน้า",
            "info": " _PAGE_ หน้าจาก _PAGES_",
            "sSearch": "ค้นหา"

        },
  
      retrieve: true,

      
});  
 }); 
</script>


<script>
            function ShowData(str) {
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
            xhttp.open("GET", "get_index_PM_DC.php?id="+str, true);
            xhttp.send();
            }
</script>



 <script>          
                $(document).ready(function(){  
                  $('#Note_PM').on("click", function(){  
                       $('#NotePM').submit();  
                  });  
                  $('#NotePM').on('submit', function(e){  
                       e.preventDefault();  
                       $.ajax({  
                            url :"Not_pass_PM_DC.php",  
                            method:"POST",  
                            data:new FormData(this),  
                            contentType:false,  
                            processData:false,  
                            success:function(data){
                                var b = data;
                                if(data == 1){
                                             swal( {
                                                     title: "ส่งผลการอนุมัติเรียบร้อย",
                                                     icon: "success",
                                                     button: "ตกลง",
                                                     }).then (function(){ 
                                                    location.href = "index_PM_DC.php";
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
<script>        
        

                $(document).ready(function(){  
                  $('#PM_pass').on("click", function(){  
                       $('#ViewPM').submit();  
                  });  
                  $('#ViewPM').on('submit', function(e){  
                       e.preventDefault();  
                       $.ajax({  
                            url :"Pass_PM_DC.php",  
                            method:"POST",  
                            data:new FormData(this),  
                            contentType:false,  
                            processData:false,  
                            success:function(data){
                                var b = data;
                                alert(b);
                                if(data == 1){
                                             swal( {
                                                     title: "ส่งผลการอนุมัติเรียบร้อย",
                                                     icon: "success",
                                                     button: "ตกลง",
                                                     }).then (function(){ 
                                                    location.href = "index_PM_DC.php";
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
                                }if (data == 50){
                                            swal( {
                                                     title: "ส่งผลตรวจสอบไม่สำเร็จ",
                                                     text: "กรุณากรอกข้อมูลเหตุผล",
                                                     icon: "error",
                                                     button: "ตกลง",
                                                    });
                                }if (data == 6){
                                            swal( {
                                                     title: "ส่งผลการตรวจสอบไม่สำเร็จ",
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

<script>          
                $(document).ready(function(){  
                  $('#To_note').on("click", function(){  

                      var pm_id = $("#pm_id").val();
                       document.getElementById("id_pm").value = pm_id;
                  });  
             });     
</script>