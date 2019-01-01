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
                border: 1px solid black;
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
            .modal-dialog{
                width:70%;
            }
            
    </style>
    </head>
    <title>ข้อมูลเจ้าหน้าที่</title>
        <body>
                <br><br><br><br><br>          
<!-- /.modal add-->
                <div class="modal fade" tabindex="-1" role="dialog" id="myModal">
                    <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                         <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">เพิ่มข้อมูลเจ้าหน้าที่</h4>
                    </div>
                            <div class="modal-body">
                                    <form id="upload_form" method="POST">
                                            <table style="width:100%" align="center">
                                                <tr>
                                                </tr>
                                                <tr>
                                                <th style="text-align: center;">หมายเลขพนักงาน</th>
                                                <th style="text-align: center;">ชื่อ</th>
                                                <th style="text-align: center;">สกุล</th>
                                                <th style="text-align: center;">ตำเเหน่ง</th>
                                                <th style="text-align: center;">โทรศัพท์</th>
                                                                                       
                                            </tr>
                                            <tr>
                                            <td><input type="text" id="emp_id" name="emp_id" style="width:99%" class="form-control"></td>
                                            <td><input type="text" id="emp_fname" name="emp_fname" style="width:99%" class="form-control"></td>
                                            <td><input type="text" id="emp_lname" name="emp_lname" style="width:99%" class="form-control"></td>
                                            <td><input type="text" id="emp_position" name="emp_position" style="width:99%" class="form-control"></td>
                                            <td><input type="text" id="emp_tel" name="emp_tel" style="width:99%" class="form-control"></td>
                                            </tr>
                                            <tr>
                                                <th style="text-align: center;">อีเมล์</th>
                                                <th style="text-align: center;">รูปภาพ</th>
                                                <th style="text-align: center;">Username</th>
                                                <th style="text-align: center;">Password</th>
                                                <th style="text-align: center;">status</th>       
                                            </tr>
                                                <tr>
                                                <td><input type="text" id="emp_mail" name="emp_mail" style="width:99%" class="form-control"></td>
                                                <td><input type="file" name="images[]" id="select_image" multiple  onchange="namepic()"></td>
                                                <input type="hidden" id="emp_pic" name="emp_pic" style="width:99%" class="form-control">
                                                <td><input type="text" id="emp_user" name="emp_user" style="width:99%" class="form-control"></td>
                                                <td><input type="text" id="emp_pass" name="emp_pass" style="width:99%" class="form-control"></td>
                                                <td><select name="emp_status" id="emp_status" style="width: 99%" class="form-control">
                                                            <option>เลือกสถานะ</option>
                                                            <option value="user">User</option>
                                                            <option value="admin">Admin</option>
                                                        </select></td>
                                                </tr>
                                            </table>
                                    </form>
                                </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-danger" data-dismiss="modal">ยกเลิก</button>
                        <button type="submit" class="btn btn-success"  value="submit" name="sub_create" id="submit" form="upload_form">บันทึกข้อมูล</button>
                    </div>
                    </div>
                    </div>
                </div>
<!-- /.modal add-->
<!-- /.modal upload-->

<!-- /.modal upload-->

<!-- /.modal edit-->
                <div class="modal fade" tabindex="-1" role="dialog" id="myModal2">
                            <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title">เพิ่มข้อมูลเจ้าหน้าที่</h4>
                            </div>
                                    <div class="modal-body">
                                            <form id="update_form" method="POST">
                                            <table style="width:100%" align="center" id="txtHint">
                                               
                                               
                                            
                                            </table>
                                            </form>
                                        </div>
                            <div class="modal-footer">
                                <button type="reset" class="btn btn-danger" data-dismiss="modal">ยกเลิก</button>
                                <button type="submit" class="btn btn-success" value="submit" name="sub_update" id="submit" form="update_form">อัพเดท</button>
                            </div>
                            </div>
                            </div>
                            </div>
<!-- /.modal edit-->

<!-- /.data -->
                    <table align="center" style="width:90%">
                        <tr>
                            <th colspan="7"><h4 style="text-align:center;"><b>ข้อมูลเจ้าหน้าที่</b></h4></th>
                        </tr>
                        <tr>
                        <form class="form-inline" onsubmit="openModal()" id="myForm">
                        <th colspan="6"><input type="text" style="width:100%;" size="50" name="search_text" id="search_text" class="form-control"></th>
                        <th style="text-align:right;"><button type="submit" class="btn btn-success btn-block">เพิ่มข้อมูล</button></th>
                        
                        </form>                        
                        </tr>
                    </table>
                    
                    <div class="container w3-card-2" style="width:90% " >  
                    <div class="table-responsive" id="result">
                    <p></p>
                    <form id="form3"> 
                    <table id="tableshow" align="center" style="width:100%;" class="table table-striped table-bordered " >
                    <thead>
                    <tr >
                        <td style="text-align: center;">หมายเลขพนักงาน</td>
                        <td style="text-align: center;">ชื่อ</td>
                        <td style="text-align: center;">สกุล</td>
                        <td style="text-align: center;">ตำเเหน่ง</td>
                        <td style="text-align: center;">โทรศัพท์</td>
                        <td style="text-align: center;">อีเมล์</td>
                        <td style="text-align: center;">รูปภาพ</td>
                        <td style="text-align: center;">Username</td>
                        <td style="text-align: center;">Password</td>
                        <td style="text-align: center;">status</td>
                        <td style="text-align: center;">Action</td>
                        <td style="text-align: center;"></td>

                    </tr>
                    </thead>
                    <tr>
                    <?php
                       $sql = "SELECT * FROM employee";
                       $result = mysqli_query($conn, $sql);
                       while($data = mysqli_fetch_array($result)):

                    ?>
                        <td style="text-align:left"><?php echo $data['emp_id']; ?></td>
                        <td style="text-align:left"><?php echo $data['emp_fname']; ?></td>
                        <td style="text-align:left"><?php echo $data['emp_lname']; ?></td>
                        <td style="text-align:left"><?php echo $data['emp_position']; ?></td>
                        <td style="text-align:left"><?php echo $data['emp_tel']; ?></td>
                        <td style="text-align:left"><?php echo $data['emp_mail']; ?></td>
                        <td style="text-align:left"><?php echo $data['emp_pic']; ?></td>
                        <td style="text-align:left"><?php echo $data['emp_user']; ?></td>
                        <td style="text-align:left"><?php echo $data['emp_pass']; ?></td>
                        <td style="text-align:left"><?php echo $data['emp_status']; ?></td>

                        <td><button type="button" class="btn btn-warning btn-block" data-toggle="modal" onclick="showUser(<?php echo $data['emp_id']; ?>)" data-target="#myModal2">เเก้ไข</button></td></form>
                        <td><span  class="btn btn-danger btn-block" form="form3"  onclick="remove(<?php echo $data['emp_id']; ?>)">ลบ</span></td>                    
                    </tr>
                       <?php endwhile;?>
                </table>
                </form>
                </div>
                </div>
<!-- /.data -->
<!-- /.script modal add -->

            <script>
                    $('#myForm').on('submit', function(e){
                    $('#myModal').modal('show');
                    e.preventDefault();
                    });
            </script>
<!-- /.script modal add -->
<!-- /.script modal edit -->
            <script>
                    $('#myFormEdit').on('submit', function(e){
                    $('#myModalEdit').modal('show');
                    e.preventDefault();
                    });
            </script>

<!-- /.script modal edit -->   
<!-- /.script showdata in modal -->   

            <script>
            function showUser(str) {
            var xhttp;    
            if (str == "") {
                document.getElementById("txtHint").innerHTML = "";
                return;
            }
            xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
                }
            };
            xhttp.open("GET", "getUser.php?id="+str, true);
            xhttp.send();
            }
            </script>
<!-- /.script showdata in modal -->   

<!-- /.script  insert data and popup-->   

<!-- /.script  insert data and popup-->
<!-- /.script  upload data and popup-->
<script>          
                $(document).ready(function(){  
                  $('#sub_create').on("click", function(){  
                       $('#upload_form').submit();  
                  });  
                  $('#upload_form').on('submit', function(e){  
                       e.preventDefault();  
                       $.ajax({  
                            url :"create_user.php",  
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
                                                     location.reload();
                                                    }
                                                    );
                                }else if(data > 1){
                                             swal( {
                                                     title: "ข้อมูลไม่สำเร็จ",
                                                     text: "รหัสหรือรูปนี้มีอยู่ในระบบเเล้ว",
                                                     icon: "error",
                                                     button: "กรอกข้อมูลอีกครั้ง",
                                                    }
                                                  );
                                }else{
                                             swal( {
                                                     title: "เพิ่มข้อมูลไม่สำเร็จ",
                                                     text: "ท่านกรอกข้อมูลไม่ครบถ้วนหรือไม่ถูกต้อง",
                                                     icon: "error",
                                                     button: "ตกลง",
                                                    });
                                                   }     
                                                }  
                       })  
                  });  
             });     
            </script>  
<!-- /.script  upload data and popup-->   
<!-- /.script  update data and popup-->   
<script>

    $(document).ready(function(){  
                  $('#sub_update').on("click", function(){  
                       $('#update_form').submit();  
                  });  
                  $('#update_form').on('submit', function(e){  
                       e.preventDefault();  
                       $.ajax({  
                            url :"update_user.php",  
                            method:"POST",  
                            data:new FormData(this),  
                            contentType:false,  
                            processData:false,  
                            success:function(data){
                                var b = data;
                                alert(b);
                                if(data == 1){
                                             swal( {
                                                     title: "เพิ่มข้อมูลสำเร็จ",
                                                     icon: "success",
                                                     button: "ตกลง",
                                                     }).then (function(){ 
                                                     location.reload();
                                                    }
                                                    );
                                }else{
                                             swal( {
                                                     title: "เพิ่มข้อมูลไม่สำเร็จ",
                                                     text: "ท่านกรอกข้อมูลไม่ครบถ้วนหรือไม่ถูกต้อง",
                                                     icon: "error",
                                                     button: "ตกลง",
                                                    });
                                                   }     
                                                }  
                       })  
                  });  
             });     
</script>
<!-- /.script  update data and popup-->   
<!-- /.script  datatable-->   
<script>
$(document).ready(function(){  
      $('#tableshow').DataTable({
  "searching": false
});  
 }); 
</script>
<!-- /.script  datatable-->   
<!-- script remove -->
<script>
function remove(str){
    swal({
  title: "คุณต้องการลบข้อมูลนี้ใช่หรือไม่",
  icon: "warning",
  buttons: true,
  dangerMode: true,
}).then (function (isConfirm){
    if (isConfirm) {
        $.ajax({
                    url: "delete_user.php", 
                    type: "POST",
                    data: {"x": str},
                    success: function(result){
                        alert(result);
                        if(result == 1){
                            swal( {
                            title: "ลบข้อมูลสำเร็จ",
                             icon: "success",
                             button: "ตกลง",
                               }).then (function(){ 
                                location.reload();
                              }
                            );   
                        }else{
                            swal({
                                title: "ลบข้อมูลไม่สำเร็จ",
                                text: "ท่านกรอกข้อมูลไม่ครบถ้วนหรือไม่ถูกต้อง",
                                icon: "error",
                                button: "ตกลง",
                             });
                        }
                    }
        });
   
        }else{
            swal("ยกเลิกการลบ", "ข้อมูลนี้ยังคงอยู่ :)", "error");
        }            
});
}
</script>
 <!-- script remove -->
 <!-- script search -->

<script>
$(document).ready(function()
{
        load_data();
                function load_data(query)
                {
                        $.ajax(
                        {
                        url:"search_user.php",
                        method:"POST",
                        data:{query:query},
                        success:function(data)
                        {
                            $('#result').html(data);
                        }
                        }
                            );
                }
                $('#search_text').keyup(function()
                {
                    var search = $(this).val();
                    if(search != '')
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
<!-- script search -->
<!-- script upload -->
<script>
function namepic(){
    var name = document.getElementById('select_image');
      var x = name.files.item(0).name;
      document.getElementById('emp_pic').value = x;
}
</script>
  <!-- script upload -->
  
        </body>
</html>
