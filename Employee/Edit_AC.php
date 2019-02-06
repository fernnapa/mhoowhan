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
    <?php include("menu/navbar_emp.php"); ?>
    <title>เเก้ไขรายการจัดสรรครุภัณฑ์</title>
        <body>

<?php
        if(isset($_GET['ID'])){
            $id = $_GET['ID'];
        }
     
        if(isset($_GET['id'])){
            $id = $_GET['id'];
        }

?>
<div class="card">
      <div class="card-body">
        <div class="modal fade" tabindex="-1" role="dialog" id="ModalDep">
                    <div class="modal-dialog" role="document" style="width:500x";>
                    <div class="modal-content">
                    <div class="modal-header">
                         <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" style="font-family:Prompt;">ข้อมูลหน่วยงาน</h4>

                    </div>
                            <div class="modal-body">
                    <table id="tableType" align="center" style="width:100%; font-family:Prompt;" class="table table-striped table-bordered " >
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


                <br>   
                <?php
               
                $ac = "SELECT * FROM `allocate` 
                LEFT JOIN department ON allocate.ac_dep = department.dep_id
                WHERE ac_id = $id";
                $result = mysqli_query($conn, $ac);
                while($data = mysqli_fetch_array($result)){
                          
                    $ac_tname = $data['ac_tname'];
                    $ac_name = $data['ac_name'];
                    $ac_empid = $data['ac_empid'];
                    $ac_position = $data['ac_position'];
                    $ac_dep = $data['ac_dep'];
                    $ac_dep_name = $data['dep_name'];
                    $ac_title = $data['ac_title'];
                    $date = $data['ac_date'];
                    $ac_emp = $data['ac_emp'];
                    $ac_typeR = $data['ac_typeR'];


                }
                ?>
                    
                    <form id="Add_AC"> 
                    <table border="0" align="center" style="width:80%;" class="w3-teal">
                    <tr>
                    <td><h3 style="font-family:Prompt;"><b>เเก้ไขรายการยืม-คืนครุภัณฑ์</b></h3></a></button></td>
                    </tr>
                    </table>
                    <div class="container" > 
                    <div class="table-responsive">
                    <br>
                    <table border="1" align="center" style="width:100%; font-family:Prompt;" class="w3-round ">
                    <tr>
                    <td style="text-align: left; width:40%;">คำนำหน้าชื่อ</td>
                    <td style="text-align: left; width:60%; ">ชื่อผู้เช่ายืม</td>
                    </tr>
                    <td><input type="text" name="ac_tname" class="form-control" value="<?php echo $ac_tname; ?>"></td>
                    <td ><input type="text" name="ac_name" class="form-control" value="<?php echo $ac_name; ?>"></td>
                    </tr>

                    
                    <tr>
                    <td  style="text-align: left">รหัสพนักงาน</td>
                    <td  style="text-align: left">ตำเเหน่ง</td>
                    </tr>
                    <tr>
                    <td ><input type="text" name="ac_empid" class="form-control" value="<?php echo $ac_empid; ?>"></td>
                    <td><input type="text" name="ac_position" class="form-control" value="<?php echo $ac_position; ?>"></td>
                    </tr>


                    <tr>
                    </tr>
                    <td style="text-align: left">หน่วยงาน </td>
                    <td style="text-align: left" >จุดประสงค์การจัดสรร</td>
                    </tr>
                    <tr>
                    <td class="form-inline"><input type="text" name="ac_ex" value="<?php echo $ac_dep_name; ?>"  class="form-control " id="ac_ex" readonly style="width:100%;">
                    <input type="hidden" name="ac_dep" value="<?php echo $ac_dep; ?>" placeholder="หน่วยงาน"  class="form-control " id="ac_dep" style="width:100%;">
                    <form id="chooseDep"><input type="submit" name="AddDep" id="AddDep" value="เลือกหน่วยงาน" form="chooseDep" class="btn btn-primary btn-block" data-toggle="modal" data-target="#ModalDep"></button></form></td>
                    <td style="vertical-align:top"><input type="text" name="ac_title" class="form-control" value="<?php echo $ac_title; ?>" ></td>
                
                    </tr>

                    
                    <tr>
                    <input type="hidden"  name="date"  id="date" value="<?=date('Y-m-d')?> "readonly/>
                    <td style="text-align: left">รหัสพนักงานจัดสรร</td>
                    <td style="text-align: left">ประเภทห้อง</td>
                    </tr>
                    <tr>
                    <td ><input type="text" name="ac_emp" class="form-control" value="<?php echo $ac_emp; ?>"></td>
                    <td ><input type="text" name="ac_typeR" class="form-control" value="<?php echo $ac_typeR; ?>"></td>
                    </tr>
                    </table>
                    </div>
                    <br>
               
                    <div class="table-responsive" id="result">
                    <table align="right">
                    <tr>
                    <td><form id="id_edit_add" method="POST" action="index_chooseAC_Edit.php"><input type="hidden" name="id_add" id="id_add" value="<?php echo $id; ?>"><input type="submit" name="edit_add_ac" class="btn btn-success" form="id_edit_add"  value="เลือกครุภัณฑ์" style="font-family:Prompt;"></form></td>
                    </tr>
                    </table>
                    <br>
                    <br>
                    <table id="tableshow" align="center" style="width:100%;" class="table table-striped table-bordered " >
                    <thead>
                    <tr >
                        <td style="text-align: center; font-weight: bold;">Barcode</td>
                        <td style="text-align: center; font-weight: bold;">Serial Number</td>
                        <td style="text-align: center; font-weight: bold;">สัญญา</td>
                        <td style="text-align: center; font-weight: bold;">ประเภทครุภัณฑ์</td>
                        <td style="text-align: center; font-weight: bold;">สถานะ</td>
                        <td style="text-align: center; font-weight: bold;">เลือกครุภัณฑ์</td>
                    </tr>
                    </thead>
                    <tr>
                    <?php
                         
                       $pmd = "SELECT * FROM allocate_detail WHERE ac_id = $id";
                       $result = mysqli_query($conn, $pmd);
                       while($data = mysqli_fetch_array($result)):

                    ?>
                                    <td style="text-align:left"><?php echo $data['ald_eq_barcode']; ?></td>
                                    <td style="text-align:left"><?php echo $data['ald_eq_serial']; ?></td>
                                    <td style="text-align:left"><?php echo $data['ald_con_name']; ?></td>
                                    <td style="text-align:left"><?php echo $data['ald_type_name']; ?></td>
                                    <td style="text-align:left"><?php echo $data['ald_status_name']; ?></td>
                                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                                    <td><button type="button" name="submit" id="submit<?php echo $data['ald_eq_id']; ?>" class="btn btn-danger btn-block" value="<?php echo $data['ald_eq_id']; ?>" onclick="getid(this)" style="font-family:Prompt;">ลบครุภัณฑ์</button></td>
                                </tr>
                            <?php endwhile;?>
                   
                        </table>
              
                        <table border="0" align="center" style="width:25%;">
                            <tr>
                                <td><input type="button" name="Update_AC" id="Update_AC" style="font-family:Prompt;" value="ส่งรายการจัดสรรอีกครั้ง" form="Add_AC" class="btn btn-success btn-block"></td>
                            </tr>
                        </table>
                    </form>
              
                    <br>
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
  </div>
  </div>
  <!-- container-scroller --> 
            
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

                        url: '../mint/delete_AC_EDIT.php',
                        type: 'POST',
                        data: {'eqid':a},
                        success:function(res){
                        
                            alert(res);
                            if(res == 2){
                            swal( {
                                                     title: "ลบข้อมูลไม่สำเร็จ",
                                                     text: "เกิดข้อผิดพลาดเกี่ยวกับฐานข้อมูล",
                                                     icon: "error",
                                                     button: "กรุณาลองอีกครั้ง",
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
                  $('#Update_AC').on("click", function(){  
                       $('#Add_AC').submit();  
                  });  
                  $('#Add_AC').on('submit', function(e){  
                       e.preventDefault();  
                       $.ajax({  
                            url :"../mint/Update_AC.php",  
                            method:"POST",  
                            data:new FormData(this),  
                            contentType:false,  
                            processData:false,  
                            success:function(data){
                                var a = data;
                                alert(a);
                                if(data == 1){
                                             swal( {
                                                     title: "อัพเดทข้อมูลสำเร็จ",
                                                     icon: "success",
                                                     button: "ตกลง",
                                                     }).then (function(){ 
                                                    location.href = "Result_AC.php";
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
                                                     title: "อัพเดทข้อมูลไม่สำเร็จ",
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
              
            document.getElementById("ac_ex").value = value;
            document.getElementById("ac_dep").value = id;
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

    </body>
</html>
