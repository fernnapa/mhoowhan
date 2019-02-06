<?php  
session_start();
include("../../db_connect.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>ข้อมูลเจ้าหน้าที่</title>
    <link href="https://fonts.googleapis.com/css?family=Kanit|Prompt" rel="stylesheet">
    <?php include("link.php"); ?>

    <style>
    .modal-dialog.a{
    max-width : 70%;
    }
    .modal-dialog.b{
    max-width : 580px;
    }

    body{
                font-family: 'Kanit', sans-serif;
            }
    </style>
</head>

<?php include("navbar.php"); ?>

<body>
<div class="card">
      <div class="card-body">

  <!-- /.modal add-->
    <div class="modal fade" tabindex="-1" role="dialog" id="myModal">
        <div class="modal-dialog b" role="document">
            <div class="modal-content">  
                <div class="card">
                    <div class="card-body" >    
                        <div class="modal-header">
                            <h4 class="modal-title" style="font-family:Prompt; font-weight: bold;">เพิ่มข้อมูลเจ้าหน้าที่</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body" style="font-family:Prompt;">
                            <form id="upload_form" method="POST">
                                <table align="center" border="0" class="table-responsive">
                                    <tr>
                                    </tr>
                                    <tr>
                                        <th style="text-align: center;">หมายเลขพนักงาน </th>
                                        <th style="text-align: center;"><input type="text" id="emp_id" name="emp_id" class="form-control"></th>
                                    </tr>
                                    <tr>
                                        <th style="text-align: center;">ชื่อ :</th>
                                        <th style="text-align: center;"><input type="text" id="emp_fname" name="emp_fname" class="form-control"></th>
                                    </tr>
                                    <tr>
                                        <th style="text-align: center;">นามสกุล :</th>
                                        <th style="text-align: center;"><input type="text" id="emp_lname" name="emp_lname" class="form-control"></th>
                                    </tr>
                                    <tr>
                                        <th style="text-align: center;">ตำเเหน่ง :</th>
                                        <th style="text-align: center;"><input type="text" id="emp_position" name="emp_position" class="form-control"></th>
                                    </tr>
                                    <tr>
                                        <th style="text-align: center;">โทรศัพท์ :</th>
                                        <th style="text-align: center;"><input type="text" id="emp_tel" name="emp_tel" class="form-control"></th>                                    
                                    </tr>
                                    <tr>
                                        <th style="text-align: center;">อีเมล์ :</th>
                                        <th style="text-align: center;"><input type="text" id="emp_mail" name="emp_mail" class="form-control"></th>
                                    </tr>
                                    <tr>
                                        <th style="text-align: center;">รูปภาพ :</th>
                                        <th style="text-align: center;"><input type="file" name="images[]" id="select_image" multiple  onchange="namepic()" style="font-family:Prompt; font-size: 15px;"></th>
                                        <input type="hidden" id="emp_pic" name="emp_pic" class="form-control">
                                    </tr>
                                    <tr>
                                        <th style="text-align: center;">Username :</th>
                                        <th style="text-align: center;"><input type="text" id="emp_user" name="emp_user" class="form-control"></th>
                                    </tr>
                                    <tr>
                                        <th style="text-align: center;">Password :</th>
                                        <th style="text-align: center;"><input type="password" id="emp_pass" name="emp_pass" class="form-control"></th>
                                    </tr>
                                    <tr>
                                        <th style="text-align: center;">สถานะผู้ใช้งาน :</th> 
                                        <th style="text-align: center;"><select name="emp_status" id="emp_status"  class="form-control" style="font-family:Prompt; font-size: 15px;">
                                                <option>เลือกสถานะ</option>
                                                <option value="member">เจ้าหน้าที่ทั่วไป</option>
                                                <option value="head">หัวหน้าศูนย์คอมพิวเตอร์</option>
                                                <option value="leader">ผู้อำนวยการศูนย์คอมพิวเตอร์</option>
                                                <option value="admin">ผู้ดูแลระบบ</option>
                                            </select></th>
                                    </tr>
                                </table>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="reset" class="btn btn-danger" data-dismiss="modal" style="font-family:Prompt;">ยกเลิก</button>
                            <button type="submit" class="btn btn-success"  value="submit" name="sub_create" id="submit" form="upload_form" style="font-family:Prompt;">บันทึกข้อมูล</button>
                        </div>
                    </div>
                 </div>
            </div>
        </div>
    </div>
<!-- /.modal add-->

<!-- /.modal edit-->
<div class="modal fade" tabindex="-1" role="dialog" id="myModal2">
    <div class="modal-dialog b" role="document">
        <div class="modal-content">  
            <div class="card">
                    <div class="card-body" >    
                        <div class="modal-header">
                            <h4 class="modal-title" style="font-family:Prompt; font-weight: bold;">แก้ไขข้อมูลเจ้าหน้าที่</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body table-responsive">
                            <form id="update_form" method="POST">
                                <table align="center" id="txtHint"></table>
                            </form>
                        </div>
                        <div class="modal-footer table-responsive">
                                <button type="submit" class="btn btn-success" value="submit" name="sub_update" id="submit" form="update_form" style="font-family:Prompt;">บันทีกข้อมูล</button>
                                <button type="reset" class="btn btn-danger" data-dismiss="modal" style="font-family:Prompt;">ยกเลิก</button>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>
<!-- /.modal edit-->


<!-- /.modal detail-->
<div class="modal fade" tabindex="-1" role="dialog" id="myModal3">
    <div class="modal-dialog" role="document">
        <div class="modal-content">  
            <div class="card">
                    <div class="card-body" >    
                        <div class="modal-header">
                            <h4 class="modal-title" style="font-family:Prompt; font-weight: bold;">รายละเอียด</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body table-responsive">
                           
                            <table align="center" id="showEmp"></table>

                        </div>
                        <div class="modal-footer table-responsive">
                                <button type="reset" class="btn btn-danger" data-dismiss="modal" style="font-family:Prompt;">ปิด</button>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>
<!-- /.modal detail-->



<!-- /.data -->
        <table align="center" style="width:100%" class="w3-teal">
        <tr>
            <th colspan="7"><p><h3 style="text-align:center; font-family:Prompt;"><b>ข้อมูลเจ้าหน้าที่</b></h3></th>
        </tr>
        </table>
        <p>       
    <table align="center" style="width:100%">
        <tr>
            <form class="form-inline" onsubmit="openModal()" id="myForm">
                <th colspan="6"><input type="text" style="width:100%;" size="50" name="search_text" id="search_text" class="form-control" placeholder="ระบุคำที่ต้องการค้นหา"></th>
                <th style="text-align:right; font-family:Prompt;"><button type="submit" class="btn btn-success btn-block" style="font-family:Prompt;">เพิ่มข้อมูล</button></th>
            </form>                        
        </tr>
    </table>
   
    <div class="table-responsive" id="result" style="font-family:Prompt;">
        <p></p>
          <form id="form3"> </form>
    </div>
<!-- /.data -->


<?php include ("footer.php"); ?>
</div>
</div>


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


<!-- /.script Detail Employee -->  
<script>
        function showEmp(str) {
        var xhttp;    
            if (str == "") {
                document.getElementById("showEmp").innerHTML = "";
                return;
            }
            xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                document.getElementById("showEmp").innerHTML = this.responseText;
                }
            };
            xhttp.open("GET", "getUser_detail.php?id="+str, true);
            xhttp.send();
        }
</script>	
<!-- /.script Detail Employee -->  

<!-- /.script Edit in modal -->   
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
<!-- /.script Edit in modal -->   

<!-- /.script  create data and popup-->
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
<!-- /.script  create data and popup-->   


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
                                                     title: "อัพเดทข้อมูลสำเร็จ",
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
function namepic()
{
    var name = document.getElementById('select_image');
      var x = name.files.item(0).name;
      document.getElementById('emp_pic').value = x;
}
</script>
  <!-- script upload -->
</body>
</html>
  