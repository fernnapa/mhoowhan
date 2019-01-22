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
            .w3-theme-l2 {color:#fff !important;background-color:#e9657b !important}
    </style>
    </head>
    <title>ผลการดำเนินการการจัดสรรครุภัณฑ์</title>
        <body >
<!-- Modal ดูข้อมูลPM -->
        <div class="modal fade" tabindex="-1" role="dialog" id="ModalViewAC">
                            <div class="modal-dialog " role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title"><b>ข้อมูลการจัดสรรครุภัณฑ์</b></h4>
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
<!-- Modal บอกเหตุผที่ไม่ให้ผ่าน -->
            <div class="modal fade" tabindex="-1" role="dialog" id="ModalNote">
                <div class="modal-dialog" role="document">
                <div class="modal-content w3-theme-l2" >
                <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title"><b>เหตุผลที่ไม่ผ่านการตรวจสอบ</b></h4>
                    </div>
                        <div class="modal-body">
                            <form id="NoteAC" >
                            <table align="center">
                            <tr>
                            <td><input type="hidden" name="id_ac" id="id_ac" class="form-control"></td>
                            <td>เหตุผลที่ไม่ผ่านการตรวจสอบ: </td>
                            <td><input type="text" name="ac_note" id="ac_note" class="form-control"></td>
                            </tr>
                            </table>
                            </form>
                            </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-success"  name="Note_AC" id="Note_AC" form="NoteAC">ส่งผลการตรวจสอบ</button>
                                    <button type="reset" class="btn btn-danger" data-dismiss="modal">ปิด</button>
                                </div>
                                </div>
                                </div>
                                </div>
<!-- Modal บอกเหตุผที่ไม่ให้ผ่าน -->
                <br>       
                    <div class="container w3-card-4 w3-round" style="width:80% " > 
                    <br>
                    <table border="0" align="center" style="width:100%;" class="w3-teal w3-round">
                    <tr>
                    <td><h3><b>ผลการดำเนินการการจัดสรรครุภัณฑ์</b></h3></a></button></td>
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
                        <td style="text-align: center;">Action</td>
                        <td style="text-align: center;"></td>

                   </tr>
                    </thead>
                    <tr>
                    <?php
                       $sql = "SELECT * FROM allocate
                            LEFT JOIN a_status
                            ON allocate.ac_status = a_status.status_id
                            LEFT JOIN department
                            ON allocate.ac_dep = department.dep_id
                            WHERE ac_status= 8 OR ac_status= 10 OR ac_status= 11";
                         $result = mysqli_query($conn, $sql);
                       while($data = mysqli_fetch_array($result)):
                         $id = $data['ac_id'];
                         $stn = $data['status_name'];

                    ?>
                
                    <?php if($stn == "ไม่ผ่านการตรวจสอบ"){ ?>  
                        <td style="text-align:left"><?php echo $data['ac_title']; ?></td>
                        <td style="text-align:left"><?php echo $data['ac_name']; ?></td>
                        <td style="text-align:left"><?php echo $data['dep_name']; ?></td>
                        <td style="text-align:left"><?php echo $data['ac_empid']; ?></td>
                        <td style="text-align:left"><?php echo $data['status_name']; ?></td>

                        <td><button type="button" name="idEdit" class="btn btn-warning btn-block" value="<?php echo $data['ac_id']; ?>" onclick="getidTOedit(this)">เเก้ไขรายการ</button></td>
                        <td><button type="button" name="submitviewNopass" class="btn btn-primary btn-block"  data-toggle="modal" data-target="#ModalViewAC" onclick="showAC(<?php echo $data['ac_id']; ?>)">ดูรายละเอียด</button></td>

                    <?php  } if($stn == "ไม่อนุมัติ"){ ?>
                                        <td style="text-align:left"><?php echo $data['ac_title']; ?></td>
                        <td style="text-align:left"><?php echo $data['ac_name']; ?></td>
                        <td style="text-align:left"><?php echo $data['dep_name']; ?></td>
                        <td style="text-align:left"><?php echo $data['ac_empid']; ?></td>
                        <td style="text-align:left"><?php echo $data['status_name']; ?></td>

                        <td><button type="button" name="submitviewRS" id="submitviewNopass" class="btn btn-danger btn-block"  value="<?php echo $id; ?>" onclick="notpass(this)">ยกเลิกรายการ</button></td>
                        <td><button type="button" name="submitviewNopass" class="btn btn-primary btn-block"  data-toggle="modal" data-target="#ModalViewAC" onclick="showAC(<?php echo $data['ac_id']; ?>)">ดูรายละเอียด</button></td>

                    <?php } if($stn == "อนุมัติ"){ ?>
                        <td style="text-align:left"><?php echo $data['ac_title']; ?></td>
                        <td style="text-align:left"><?php echo $data['ac_name']; ?></td>
                        <td style="text-align:left"><?php echo $data['dep_name']; ?></td>
                        <td style="text-align:left"><?php echo $data['ac_empid']; ?></td>
                        <td style="text-align:left"><?php echo $data['status_name']; ?></td>
                    
                        <td><button type="button" name="submitviewRS" id="submitviewRS" class="btn btn-success btn-block"  value="<?php echo $id; ?>" onclick="pass(this)">ทำการจัดสรร</button></td>
                        <td><button type="button" name="submitview" class="btn btn-primary btn-block"  data-toggle="modal" data-target="#ModalViewAC" onclick="showAC(<?php echo $data['ac_id']; ?>)">ดูรายละเอียด</button></td>
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
            xhttp.open("GET", "getAC.php?id="+str, true);
            xhttp.send();
            }
</script>

<script>          
      function pass(str){
         var a = str.value;
         var b = str.id;
          $(document).ready(function(){
                $.ajax({

                        url: 'Result_pass_AC.php',
                        type: 'POST',
                        data: {'id':a},
                        success:function(res){
                            alert(res);
                            if(res == 2){
                            swal( {
                                                     title: "ข้อมูลนี้ยังไม่เป็นรายการจัดสรรครุภัณฑ์",
                                                     text: "เกิดข้อผิดพลาดเกี่ยวกับฐานข้อมูล",
                                                     icon: "error",
                                                     button: "กรุณาลองอีกครั้ง",
                                                    }
                                                  );
                        }if(res == 1){
                            swal( {
                                                     title: "ข้อมูลนี้เป็นรายการจัดสรรเรียบร้อย",
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
      function expired(str){
         var a = str.value;
         var b = str.id;
          $(document).ready(function(){
                $.ajax({

                        url: 'Result_expired_AC.php',
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
}  
</script>

<script>
              
      function notpass(str){
         var a = str.value;
         var b = str.id;
         swal({
  title: "คุณต้องการยกเลิกรายการนี้ใช่หรือไม่",
  icon: "warning",
  buttons: true,
  dangerMode: true,
}).then (function (isConfirm){
    if (isConfirm) {
          $(document).ready(function(){
                $.ajax({

                        url: 'Result_Notpass_AC.php',
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
                                                     title: "ยกเลิกรายการนี้เรียบร้อย",
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
    });
}  
</script>

<script>          
      function getidTOedit(str){
         var a = str.value;
         var b = str.id;
         location.href = "Edit_AC.php?ID="+a;
}  
</script>

        </body>
</html>
