<?php
session_start();
include("../../db_connect.php");

?>
<!DOCTYPE html>
<html>
    <head>
  
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">


        <?php include("link_phone.php"); ?>

        <title>ยืนยันการจัดสรรครุภัณฑ์</title>
        
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
    
        <body>
     <?php   if(isset($_GET['ID'])){
            $eqid = $_GET['ID'];
        }
     ?>
        <div class="modal fade" tabindex="-1" role="dialog" id="ModalDep">
                    <div class="modal-dialog" role="document" style="width:500x";>
                    <div class="modal-content">
                    <div class="modal-header">
                         <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">ข้อมูลหน่วยงาน</h4>

                    </div>
                            <div class="modal-body">
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


                <br>           
                    
                    <form id="Add_AC"> 
                    <table border="0" align="center" style="width:100%;" class="w3-teal">
                    <tr>
                    <td><h3><b>ยืนยันการจัดสรรครุภัณฑ์</b></h3></a></button></td>
                    </tr>
                    </table>
                    <div class="container w3-card-2 w3-round" style="width:100% " > 
                    <p></p>
                    <table border="1" align="center" style="width:100%" class="w3-round table-bordered ">
                    <tr>
                    <td style="text-align: left">คำนำหน้าชื่อ</td>
                    <td style="text-align: left">ชื่อผู้เช่ายืม</td>
                    </tr>
                    <td><input type="text" name="ac_tname" class="form-control" ></td>
                    <td ><input type="text" name="ac_name" class="form-control"></td>
                    </tr>

                    
                    <tr>
                    <td  style="text-align: left">รหัสพนักงาน</td>
                    <td  style="text-align: left">ตำเเหน่ง</td>
                    </tr>
                    <tr>
                    <td ><input type="text" name="ac_empid" class="form-control" ></td>
                    <td><input type="text" name="ac_position" class="form-control"></td>
                    </tr>


                    <tr>
                    </tr>
                    <td style="text-align: left">หน่วยงาน </td>
                    <td style="text-align: left" >จุดประสงค์การยืม-คืน</td>
                    </tr>
                    <tr>
                    <td class="form-inline"><input type="text" name="pm_ex" placeholder="หน่วยงาน"  class="form-control " id="pm_ex" readonly style="width:100%;">
                    <input type="hidden" name="ac_dep" placeholder="หน่วยงาน"  class="form-control " id="ac_dep" style="width:100%;">
                    <form id="chooseDep"><input type="submit" name="AddDep" id="AddDep" value="เลือกหน่วยงาน" form="chooseDep" class="btn btn-primary btn-block" data-toggle="modal" data-target="#ModalDep"></button></form></td>
                    <td style="vertical-align:top"><input type="text" name="ac_title" class="form-control"></td>
                
                    </tr>

                   
                    <tr>
                    <input type="hidden"  name="date"  id="date" value="<?=date('Y-m-d')?>"readonly/>
                    <td style="text-align: left">รหัสพนักงานจัดสรร</td>
                    <td style="text-align: left">ประเภทห้อง</td>
                    </tr>
                    <tr>
                    <td ><input type="text" name="ac_emp" class="form-control" value="<?php echo $_SESSION["emp_id"] ?>" readonly></td>
                    <td ><input type="text" name="ac_typeR" class="form-control"></td>
                    </tr>

                    </table>
                    <p></p>
                    <table  align="center" style="width:100%;" class="w3-round table-bordered " border="1" >
                    <thead>
                    <tr >
                        <td style="text-align: center;">Barcode</td>
                        <td style="text-align: center;">Serial Number</td>
                        <td style="text-align: center;">สัญญา</td>
                        <td style="text-align: center;">ประเภทครุภัณฑ์</td>
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
                            WHERE eq_id = $eqid";
                       $result = mysqli_query($conn, $sql);
                       while($data = mysqli_fetch_array($result)):

                    ?>
                        <td style="text-align:left"><?php echo $data['eq_barcode']; ?></td>
                        <td style="text-align:left"><?php echo $data['eq_serial']; ?></td>
                        <td style="text-align:left"><?php echo $data['con_name']; ?></td>
                        <td style="text-align:left"><?php echo $data['type_name']; ?></td>
                        <input type="hidden" name="id" value="<?php echo $data['eq_id']; ?>">
                    

                    </tr>
                       <?php endwhile;?>
                      
                </table>
                    <table border="0" align="center" style="width:100%;">
                    <tr>
                    <td style="width:50%"><input type="submit" name="submitAdd" id="submit" value="บันทึกข้อมูล" form="Add_AC" class="btn btn-success btn-block"></td>
                    <td style="width:50%"><a href="viewQR_Admin.php?ID=<?php echo $eqid; ?>" class="btn btn-danger btn-block">ยกเลิก</a></td>
                    </tr>
                    </table>
                    </div>
                    </div>
                    </form>
               
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
                $(document).ready(function(){  
                  $('#submitAdd').on("click", function(){  
                       $('#Add_AC').submit();  
                  });  
                  $('#Add_AC').on('submit', function(e){  
                       e.preventDefault();  
                       $.ajax({  
                            url :"Add_AC_QR.php",  
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
                                                    location.href = "indexAC_phone.php";
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
