<?php  
session_start();
include("../db_connect.php");
$_SESSION['chooseEq'] = array();
?>  
<!DOCTYPE html>
<html lang="en">

<head>
  
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <?php include("menu/link.php"); ?>
  
  <style>
            .modal-dialog.a{
                max-width : 650px;
                max-height: 550px;
            }

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

<?php include("menu/navbar_emp.php"); ?>

<title>รายการยืม-คืนครุภัณฑ์</title>

<body>

<!-- Modal ดูข้อมูลPM -->
<div class="modal fade" tabindex="-1" role="dialog" id="ModalViewPM">
                            <div class="modal-dialog a" role="document">
                            <div class="modal-content">
                            <div class="card">
                            <div class="card-body">
                            <div class="modal-header">
                            <h4 class="modal-title" style="font-family:Prompt;"><b>ข้อมูลการยืม-คืนครุภัณฑ์</b></h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            </div>
                                    <div class="modal-body table-responsive">
                                            <form id="ViewPM" >
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                          <button type="reset" class="btn btn-danger" data-dismiss="modal">ปิด</button>
                                        </div>

                            </div>
                            </div>
                            </div>
                            </div>
                            </div>
<!-- Modal คืน -->
            <div class="modal fade" tabindex="-1" role="dialog" id="ModalRefund">
                <div class="modal-dialog" role="document">
                <div class="modal-content w3-theme-l2" >
                <div class="modal-header">
                
                <h4 class="modal-title" style="font-family:Prompt;"><b>วันที่คืนครุภัณฑ์</b></h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
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
                                <div class="modal-footer" >
                                    <button type="button" class="btn btn-success"  name="Date_rfn" id="Date_rfn" form="Date_RFN_PM" style="font-family:Prompt;">บันทึกข้อมูล</button>
                                    <button type="reset" class="btn btn-danger" data-dismiss="modal" style="font-family:Prompt;">ปิด</button>
                                </div>
                                </div>
                                </div>
                                </div>
<!-- Modal คืน -->
                 
                    <div class="container" > 
                    
                    <table border="0" align="center" style="width:100%;" class="w3-teal w3-round">
                    <tr>
                    <td><h3 style="font-family:Prompt;"><b>รายการยืม-คืนครุภัณฑ์</b></h3></a></button></td>
                    </tr>
                    </table>

                    <table border="0" align="right"  >
                    <tr>
                    <td>เลือกจาก</td>
                    <td><select name="search_text" id="search_text" style="width: 100%" class="form-control">
                                                            <option value="ทั้งหมด">สถานะทั้งหมด</option>
                                            <?php
                                                    $type = "SELECT * FROM a_status WHERE status_id = 3 OR status_id = 5 OR status_id = 6 OR status_id = 7 OR status_id = 8 OR status_id = 10 OR status_id = 11 OR status_id = 12 ORDER BY status_id";
                                                    $result = mysqli_query($conn, $type);
                                                    while($data = mysqli_fetch_array($result)):
                                             ?>
                                                    <option value="<?php echo $data['status_id']; ?>"><?php echo $data['status_name']; ?></option>
                                            <?php endwhile;?>
                                                </select></td>
                                       </tr>
                    </table>
                  


                    <br>
                    <div class="table-responsive" id="result">
                    <p></p>
                    <form id="form3"> 
                    <table id="tableshow" align="center" style="width:100%;" class="table table-striped table-bordered " >
                    <thead>
                    <tr >
                        <td style="text-align: center;">จุดประสงค์การยืม-คืน</td>
                        <td style="text-align: center;">ชื่อผู้เช่ายืม</td>
                        <td style="text-align: center;">หน่วยงาน</td>
                        <td style="text-align: center;">พนักงานจัดสรร</td>
                        <td style="text-align: center;">สถานะ</td>
                        <td style="text-align: center;">จัดการ</td>
                        <td style="text-align: center;">รายละเอียด</td>
                        <td></td>

                   </tr>
                    </thead>
                    <tr>
                    <?php
                       $sql = "SELECT * FROM permit
                            LEFT JOIN a_status
                            ON permit.pm_status = a_status.status_id
                            LEFT JOIN department
                            ON permit.pm_dep = department.dep_id
                            WHERE pm_status = 9 OR pm_status = 7 OR pm_status = 6 OR pm_status= 3 OR pm_status= 8 OR pm_status= 10 OR pm_status= 11 OR pm_status = 12";
                         $result = mysqli_query($conn, $sql);
                       while($data = mysqli_fetch_array($result)):
                         $id = $data['pm_id'];
                         $stn = $data['status_name'];
                         $test =0;

                         $exp_date = $data['pm_enddate'];
                         $today_date = date('Y-m-d');
                         $exp = strtotime($exp_date);
                         $td = strtotime($today_date);
                         if($td > $exp){
                            $test =1;
                         }
                       ?>

                        <?php 
                            if($test == 1){
                                $status = 12; 
                                $update = "UPDATE `permit` SET `pm_status`='$status' WHERE pm_id = $id ";
                                $rs = mysqli_query($conn, $update);
                                $st = "SELECT * FROM permit 
                                LEFT JOIN a_status
                                ON permit.pm_status = a_status.status_id
                                LEFT JOIN department
                                ON permit.pm_dep = department.dep_id WHERE pm_id = $id";
                                $rs1 = mysqli_query($conn, $st);
                                while($ex = mysqli_fetch_array($rs1)){
                                  $stn = $ex['pm_status'];
                                  $name = $ex['pm_name'];
                                  $username = $ex['pm_username'];
                                  $dep = $ex['dep_name'];
                                  $emp = $ex['pm_empno'];
                                  $status_name = $ex['status_name'];
                                }
                            if($stn == 12){ ?>
                            <td style="text-align:left"><?php echo $name; ?></td>
                            <td style="text-align:left"><?php echo $username; ?></td>
                            <td style="text-align:left"><?php echo $dep; ?></td>
                            <td style="text-align:left"><?php echo $emp; ?></td>
                            <td style="text-align:center" class="w3-red"><?php echo $status_name; ?></td>
                            <td><button type="button" name="submitRFN" class="btn btn-success btn-block" data-toggle="modal" data-target="#ModalRefund"  value="<?php echo $id; ?>" onclick="idrefund(this)">คืนครุภัณฑ์</button></td>
                            <td><button type="button" name="submitview" class="btn btn-primary btn-block"  data-toggle="modal" data-target="#ModalViewPM" onclick="showPM_pass(<?php echo $data['pm_id']; ?>)">ดูรายละเอียด</button></td>
                            <td></td>
                       
                        <?php } }
                        if($stn == "รอตรวจสอบ"){ ?>
                        <td style="text-align:left"><?php echo $data['pm_name']; ?></td>
                        <td style="text-align:left"><?php echo $data['pm_username']; ?></td>
                        <td style="text-align:left"><?php echo $data['dep_name']; ?></td>
                        <td style="text-align:left"><?php echo $data['pm_empno']; ?></td>
                        <td style="text-align:left"><?php echo $data['status_name']; ?></td>
                        <td></td>

                        <td><button type="button" name="submitview" class="btn btn-primary btn-block"  data-toggle="modal" data-target="#ModalViewPM" onclick="showPM(<?php echo $data['pm_id']; ?>)">ดูรายละเอียด</button></td>
                        <td></td>
                    
                    
                    <?php } ?>
                    <?php if($stn == "ไม่ผ่านการตรวจสอบ"){ ?>  
                        <td style="text-align:left"><?php echo $data['pm_name']; ?></td>
                        <td style="text-align:left"><?php echo $data['pm_username']; ?></td>
                        <td style="text-align:left"><?php echo $data['dep_name']; ?></td>
                        <td style="text-align:left"><?php echo $data['pm_empno']; ?></td>
                        <td style="text-align:left" ><?php echo $data['status_name']; ?></td>
                        <td></td>

                        <td><button type="button" name="submitview" class="btn btn-primary btn-block"  data-toggle="modal" data-target="#ModalViewPM" onclick="showPM_notpass(<?php echo $data['pm_id']; ?>)">ดูรายละเอียด</button></td>
                        <td></td>
                    
                    
                    <?php } if($stn == "ไม่อนุมัติ"){ ?>
                        <td style="text-align:left"><?php echo $data['pm_name']; ?></td>
                        <td style="text-align:left"><?php echo $data['pm_username']; ?></td>
                        <td style="text-align:left"><?php echo $data['dep_name']; ?></td>
                        <td style="text-align:left"><?php echo $data['pm_empno']; ?></td>
                        <td style="text-align:left"><?php echo $data['status_name']; ?></td>
                        <td></td>

                        <td><button type="button" name="submitview" class="btn btn-primary btn-block"  data-toggle="modal" data-target="#ModalViewPM" onclick="showPM_pass(<?php echo $data['pm_id']; ?>)">ดูรายละเอียด</button></td>
                        <td></td>
                    
                    
                    <?php } if($stn == "อนุมัติ"){ ?>
                        <td style="text-align:left"><?php echo $data['pm_name']; ?></td>
                        <td style="text-align:left"><?php echo $data['pm_username']; ?></td>
                        <td style="text-align:left"><?php echo $data['dep_name']; ?></td>
                        <td style="text-align:left"><?php echo $data['pm_empno']; ?></td>
                        <td style="text-align:left"><?php echo $data['status_name']; ?></td>
                        <td></td>
                        <td><button type="button" name="submitview" class="btn btn-primary btn-block"  data-toggle="modal" data-target="#ModalViewPM" onclick="showPM_pass(<?php echo $data['pm_id']; ?>)">ดูรายละเอียด</button></td>
                        <td></td>
                   
                   
                    <?php } if($stn == "ยืม - คืน"){ ?>
                        <td style="text-align:left"><?php echo $data['pm_name']; ?></td>
                        <td style="text-align:left"><?php echo $data['pm_username']; ?></td>
                        <td style="text-align:left"><?php echo $data['dep_name']; ?></td>
                        <td style="text-align:left"><?php echo $data['pm_empno']; ?></td>
                        <td style="text-align:center"  class="w3-blue-gray"><?php echo $data['status_name']; ?></td>
                        <td><button type="button" name="submitRFN" class="btn btn-success btn-block" data-toggle="modal" data-target="#ModalRefund"  value="<?php echo $id; ?>" onclick="idrefund(this)">คืนครุภัณฑ์</button></td>
                        <td><button type="button" name="submitview" class="btn btn-primary btn-block"  data-toggle="modal" data-target="#ModalViewPM" onclick="showPM_pass(<?php echo $data['pm_id']; ?>)">ดูรายละเอียด</button></td>
                        <td><a href='PDF_PM.php?pm_id=<?php echo $data['pm_id'];?>' class='btn btn-danger' data-role='pdf'>แบบฟอร์ม</a></button></td>

                    <?php }if($stn == "ผ่านการตรวจสอบ"){ ?>
                        <td style="text-align:left"><?php echo $data['pm_name']; ?></td>
                        <td style="text-align:left"><?php echo $data['pm_username']; ?></td>
                        <td style="text-align:left"><?php echo $data['dep_name']; ?></td>
                        <td style="text-align:left"><?php echo $data['pm_empno']; ?></td>
                        <td style="text-align:left"><?php echo $data['status_name']; ?></td>
                        <td></td>
                        <td><button type="button" name="submitview" class="btn btn-primary btn-block"  data-toggle="modal" data-target="#ModalViewPM" onclick="showPM(<?php echo $data['pm_id']; ?>)">ดูรายละเอียด</button></td>
                        <td></td>
                    <?php }if($stn == "รออนุมัติ"){?>
                        <td style="text-align:left"><?php echo $data['pm_name']; ?></td>
                         <td style="text-align:left"><?php echo $data['pm_username']; ?></td>
                         <td style="text-align:left"><?php echo $data['dep_name']; ?></td>
                         <td style="text-align:left"><?php echo $data['pm_empno']; ?></td>
                         <td style="text-align:left"><?php echo $data['status_name']; ?></td>
                         <td></td>
                         <td><button type="button" name="submitview" class="btn btn-primary btn-block"  data-toggle="modal" data-target="#ModalViewPM" onclick="showPM_notpass(<?php echo $data['pm_id']; ?>)">ดูรายละเอียด</button></td>
                         <td></td>
                    <?php } ?>
                        </tr>
                       <?php endwhile; ?>
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






<!-- /.script modal add -->
<script>
$(document).ready(function(){  
        $('#tableshow').DataTable({
        "searching": true
});  
 }); 
</script>

<script>
            function showPM_pass(str) {
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
            xhttp.open("GET", "getAll_PM_pass.php?id="+str, true);
            xhttp.send();
            }
</script>

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
            xhttp.open("GET", "../mint/getAll_PM_wait.php?id="+str, true);
            xhttp.send();
            }
</script>

<script>
            function showPM_notpass(str) {
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
            xhttp.open("GET", "../mint/getAll_PM_notpass.php?id="+str, true);
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
                                                     title: "ครุภัณฑ์นี้ทำการคืนเรียบร้อย",
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



<script>
$(document).ready(function()
{
        load_data();
                function load_data(query)
                {
                        $.ajax(
                        {
                        url:"search_index_All.php",
                        method:"POST",
                        data:{query:query},
                        success:function(data)
                        {
                            $('#result').html(data);
                        }
                        }
                            );
                }
                $('#search_text').change(function()
                {
                    var search = $(this).val();
                    if(search != '' )
                    {
                        load_data(search);
                    }else
                    {
                        load_data();
                    }
                }
                );
});
</script>














        </body>
</html>



