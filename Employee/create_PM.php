<?php
session_start();
include("../Home/db_connect.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <?php include("menu/link.php"); ?>
  


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
            .search-table-outter { overflow-x: scroll; 
            }
            .modal-dialog.a{
                max-width : 50%;
            }

         
    </style>

</head>

<?php include("menu/navbar_emp.php"); ?>
<title>ยืนยันการยืม-คืนครุภัณฑ์</title>
<body>
  
<div class="modal fade" tabindex="-1" role="dialog" id="ModalDep">
                    <div class="modal-dialog a" role="document" style="width:100%";>
                    <div class="modal-content">
                    <div class="card">
                    <div class="card-body">
                    <div class="modal-header">
                        <h4 class="modal-title">ข้อมูลหน่วยงาน</h4>
                         <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                    </div>
                    <div class="modal-body table-responsive">
                    <table id="tableType" align="center" style="width:100%;" class="table table-striped table-bordered " >
                    <thead>
                    <tr >
                        <td style="text-align: center; ">รหัสหน่วยงาน</td>
                        <td style="text-align: center; ">ชื่อหน่วยงาน</td>
                        <td style="text-align: center; ">Action</td>

                    </tr>
                    </thead>
                    <tr>
                    <?php
                       $sql = "SELECT * FROM department";
                       $result = mysqli_query($conn, $sql);
                       while($data = mysqli_fetch_array($result)):

                    ?>
                        <td style="text-align:left"><?php echo $data['dep_no']; ?></td>
                        <td style="text-align:left"><?php echo $data['dep_name']; ?></td>
                        <td><button type="button" class="btn btn-success btn-block" id="<?php echo $data['dep_id']; ?>" value="<?php echo $data['dep_name']; ?>" onclick="Dep(this)">เลือก</button></td>
                        </form>
                    </tr>
                       <?php endwhile;?>
                </table>
                                </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-danger" data-dismiss="modal">ปิด</button>
                    </div>
                    </div>
                    </div>
                    </div>
                    </div>
                </div>


                <br>           
                    
                    <form id="Add_PM"> 
                    <table border="0" align="center" style="width:80%;" class="w3-teal">
                    <tr>
                    <td><h3><b>ยืนยันการยืม-คืนครุภัณฑ์</b></h3></a></button></td>
                    </tr>
                    </table>
                    <div class="container "> 
                    <div class="table-responsive">
                    <br>
                    <table border="1" align="center" style="width:100%" class="w3-round ">
                    <tr>
                    <td style="text-align: left">คำนำหน้าชื่อ</td>
                    <td style="text-align: left">ชื่อผู้เช่ายืม</td>
                    </tr>
                    <td><input type="text" name="pm_userTname" class="form-control" ></td>
                    <td ><input type="text" name="pm_username" class="form-control"></td>
                    </tr>

                    
                    <tr>
                    <td  style="text-align: left">รหัสพนักงาน</td>
                    <td  style="text-align: left">ตำเเหน่ง</td>
                    </tr>
                    <tr>
                    <td ><input type="text" name="pm_userno" class="form-control"></td>
                    <td><input type="text" name="pm_position" class="form-control"></td>
                    </tr>


                    <tr>
                    </tr>
                    <td style="text-align: left">หน่วยงาน </td>
                    <td style="text-align: left" >จุดประสงค์การยืม-คืน</td>
                    </tr>
                    <tr>
                    <td class="form-inline"><input type="text" name="pm_ex" placeholder="หน่วยงาน"  class="form-control " id="pm_ex" readonly style="width:100%;">
                    <input type="hidden" name="pm_dep" placeholder="หน่วยงาน"  class="form-control " id="pm_dep" style="width:100%;">
                    <form id="chooseDep"><input type="submit" name="AddDep" id="AddDep" value="เลือกหน่วยงาน" form="chooseDep" class="btn btn-primary btn-block" data-toggle="modal" data-target="#ModalDep"></button></form></td>
                    <td style="vertical-align:top"><input type="text" name="pm_name" class="form-control"></td>
                
                    </tr>

                    <tr>
                    <td style="text-align: left">วันที่เริ่ม</td>
                    <td style="text-align: left">วันที่สิ้นสุด</td>
                    </tr>
                    <tr>
                    <td ><input type="date" name="pm_firstdate" class="form-control"></td>
                    <td ><input type="date" name="pm_enddate" class="form-control"></td>
                    </tr>
                    <tr>
                    <input type="hidden"  name="date"  id="date" value="<?=date('Y-m-d')?>"readonly/>
                    <td style="text-align: left">รหัสพนักงานจัดสรร</td>
                    <td style="text-align: left">ประเภทห้อง</td>
                    </tr>
                    <tr>
                    <td ><input type="text" name="pm_empno" class="form-control" value="<?php echo $_SESSION["emp_id"] ?>"readonly/></td>
                    <td ><input type="text" name="pm_TypeR" class="form-control"></td>
                    </tr>

                    </table>
                    <br>
                    </div>
                    </div>
                    </form>
                    <br>
                    <div class="container w3-card-4 w3-round" style="width:100% " > 
                    <br>
                    <table border="0" align="right">
                    <tr>
                    <!-- <td><a href="../mint/index_choosePM.php" class="btn btn-primary btn-block">เลือกครุภัณฑ์</a></td> -->
                    </tr>
                    </table>
                    <br>
                    <br>
                    <br>
                    <div class="table-responsive" id="result">
                    <p></p>
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
                          $choose = $_SESSION['chooseEq'];
                          foreach ($choose as $key => $value) {
                            
                        
                       $sql = "SELECT * FROM equipment
                       LEFT JOIN a_status
                            ON equipment.eq_status = a_status.status_id
                            LEFT JOIN tor
                            ON equipment.eq_tor = tor.tor_id
                            LEFT JOIN contract
                            ON tor.tor_contract = contract.con_id
                            LEFT JOIN type_eq
                            ON tor.tor_type = type_eq.type_id 
                            WHERE eq_id = '$value'";
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
                    

                        <td><button type="button" name="submit" id="submit<?php echo $data['eq_id']; ?>" class="btn btn-danger btn-block" value="<?php echo $data['eq_id']; ?>" onclick="getid(this)" >ลบครุภัณฑ์</button></td></form>
                    </tr>
                       <?php endwhile;?>
                      <?php } ?>
                </table>
                <br>
                    <table border="0" align="center" style="width:25%;">
                    <tr>
                    <td><input type="submit" name="submitAdd" id="submit" value="บันทึกข้อมูล" form="Add_PM" class="btn btn-success btn-block"></td>
                    </tr>
                    </table>
                <br>

                </div>
                </div>

    

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

  
</body>
</html>





            
<script>

$(document).ready(function(){  
      $('#tableshow').DataTable({
  "searching": true
});  
 }); 
</script>

<script>

$(document).ready(function(){  
      $('#tableType').DataTable({
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

                        url: '../mint/delete_PM.php',
                        type: 'POST',
                        data: {'id':a},
                        success:function(res){
                        
                            alert(res);
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
                                                     title: "ลบข้อมูลสำเร็จ",
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
}
</script>

<script>          
                $(document).ready(function(){  
                  $('#submitAdd').on("click", function(){  
                       $('#Add_PM').submit();  
                  });  
                  $('#Add_PM').on('submit', function(e){  
                       e.preventDefault();  
                       $.ajax({  
                            url :"../mint/Add_PM.php",  
                            method:"POST",  
                            data:new FormData(this),  
                            contentType:false,  
                            processData:false,  
                            success:function(data){
                                var a = data;
                                alert(a);
                                if(data == 1){
                                             swal( {
                                                     title: "เพิ่มข้อมูลสำเร็จ",
                                                     icon: "success",
                                                     button: "ตกลง",
                                                     }).then (function(){ 
                                                    location.href = "index_ALL_PM.php";
                                                    }
                                                    );
                                }if(data == 2){
                                             swal( {
                                                     title: "เพิ่มข้อมูลไม่สำเร็จ",
                                                     text: "รูปนี้ถูกใช้ในระบบเเล้ว",
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
                                                     title: "เพิ่มข้อมูลไม่สำเร็จ",
                                                     text: "กรุณากรอกข้อมูลให้ครบถ้วน",
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
            function Dep(str) {
            var value = str.value;
            var id = str.id;
              
            document.getElementById("pm_ex").value = value;
            document.getElementById("pm_dep").value = id;
            swal( {
                                                     title: "ท่านได้ทำการเลือกข้อมูลเเล้ว",
                                                     icon: "success",
                                                     button: "ตกลง",
                                                     }).then (function(){ 
                                                        $('#ModalDep').modal('toggle');
                                                    }
                                                    );


            }
            </script>
