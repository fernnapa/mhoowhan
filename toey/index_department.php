<?php
include_once 'db_connect.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php include("link.php");?>
        
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
    <title>ข้อมูลหน่วยงาน</title>
        <body>
                <br><br><br><br><br>          
<!-- /.modal add-->
                <div class="modal fade" tabindex="-1" role="dialog" id="myModal">
                    <div class="modal-dialog" role="document" style="width:60%">
                    <div class="modal-content">
                    <div class="modal-header">
                         <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">เพิ่มข้อมูลหน่วยงาน</h4>
                    </div>
                            <div class="modal-body">
                                    <form id="form1">
                                            <table style="width:100%" align="center" border="1">
                                                <tr>
                                                </tr>
                                                <tr>
                                                    <th style="text-align: left;">หมายเลขหน่วยงาน</th>
                                                    <th style="text-align: left;">ชื่อหน่วยงาน</th>
                                                    <th style="text-align: left;">แลตติจูด</th>
                                                    <th style="text-align: left;">ลองติจูด</th>
                                                </tr>
                                                <tr>
                                                    <td><input type="text" id="dep_no" name="dep_no" style="width:99%" class="form-control"></td>
                                                    <td><input type="text" id="dep_name" name="dep_name" style="width:99%" class="form-control"></td>
                                                    <td><input type="text" id="dep_latitude" name="dep_latitude" style="width:99%" class="form-control"></td>
                                                    <td><input type="text" id="dep_longtitude" name="dep_longtitude" style="width:99%" class="form-control"></td>
                                                </tr>
                                            </table>
                                    </form>
                                </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-danger" data-dismiss="modal" id="myReset">ยกเลิก</button>
                        <button type="submit" class="btn btn-success"  value="submit" name="submit" id="submit" onclick="create()">บันทึกข้อมูล</button>
                    </div>
                    </div>
                    </div>
                </div>
<!-- /.modal add-->
<!-- /.modal edit-->
                <div class="modal fade" tabindex="-1" role="dialog" id="myModal2">
                            <div class="modal-dialog" role="document" style="width:50%">
                            <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title">เพิ่มข้อมูลหน่วยงาน</h4>
                            </div>
                                    <div class="modal-body">
                                            <form id="form2">
                                                    <table style="width:90%" align="center" border="1">
                                                        <tr>
                                                        </tr>
                                                        <tr>
                                                            <th style="text-align: left;">หมายเลขหน่วยงาน</th>
                                                            <th style="text-align: left;">ชื่อหน่วยงาน</th>
                                                            <th style="text-align: left;">แลตติจูด</th>
                                                            <th style="text-align: left;">ลองติจูด</th>
                                                        </tr>
                                                        <tr id="txtHint">
                                                           
                                                        </tr>
                                                    </table>
                                            </form>
                                        </div>
                            <div class="modal-footer">
                                <button type="reset" class="btn btn-danger" data-dismiss="modal">ยกเลิก</button>
                                <button type="submit" class="btn btn-success" value="submit" name="submit" id="submit" onclick="update()">อัพเดท</button>
                            </div>
                            </div>
                            </div>
                            </div>
<!-- /.modal edit-->

<!-- /.data -->
            <div class="container w3-card-2 w3-round-large" style="width:70% " >          
                    <table align="center" style="width:100%">
                        <tr>
                            <th colspan="7"><h4 style="text-align:center;"><b>ข้อมูลหน่วยงาน</b></h4></th>
                        </tr>
                        <tr>
                        <form class="form-inline" onsubmit="openModal()" id="myForm">
                        <th colspan="6"><input type="text" style="width:100%;" size="50" name="search_text" id="search_text" class="form-control"></th>
                        <th style="text-align:right;"><button type="submit" class="btn btn-success btn-block">เพิ่มข้อมูล</button></th>
                        
                        </form>                        
                        </tr>
                    </table>
                    <br>
            </div>
            <br>
            <div class="container w3-card-2 w3-round-large" style="width:70% " >          
                    <div class="table-responsive" id="result">
                    <p></p>
                    <form id="form3"> 
                    <table id="tableshow" align="center" style="width:100%;" class="table table-striped table-bordered " >
                    <thead>
                    <tr >
                        <td style="text-align: center;">หมายเลขหน่วยงาน</td>
                        <td style="text-align: center;">ชื่อหน่วยงาน</td>
                        <td style="text-align: center;">แลตติจูด</td>
                        <td style="text-align: center;">ลองติจูด</td>
                        <td style="text-align: center;">Action</td>
                        <td style="text-align: center;"></td>

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
                        <td style="text-align:left"><?php echo $data['latitude']; ?></td>
                        <td style="text-align:left"><?php echo $data['longtitude']; ?></td>
                        <td><button type="button" class="btn btn-warning btn-block" data-toggle="modal" onclick="showDepartment(<?php echo $data['dep_id']; ?>)" data-target="#myModal2">เเก้ไข</button></td></form>
                        <td><span  class="btn btn-danger btn-block" form="form3"  onclick="remove(<?php echo $data['dep_id']; ?>)">ลบ</span></td>                    
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
            function showDepartment(str) {
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
            xhttp.open("GET", "getDepartment.php?id="+str, true);
            xhttp.send();
            }
            </script>
<!-- /.script showdata in modal -->   

<!-- /.script  insert data and popup-->   
<script>
function create(){
                
                $(document).ready(function(){
                                                    $.ajax({
                                                        url: "create_dep.php", 
                                                        type: "POST",
                                                        data: $("#form1").serialize(),
                                                        success: function(result){
                                                                        if(result == 1){
                                                                                            swal( {
                                                                                                    title: "เพิ่มข้อมูลสำเร็จ",
                                                                                                    icon: "success",
                                                                                                    button: "ตกลง",
                                                                                                  }).then (function(){ 
                                                                                                                  location.reload();
                                                                                                                }
                                                                                                );
                                                                        }else if(result > 1){
                                                                                            swal( {
                                                                                                    title: "ข้อมูลไม่สำเร็จ",
                                                                                                    text: "ข้อมูลนี้มีอยู่ในระบบเเล้ว",
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
                                                            });
                                            });
                                }
                </script>
<!-- /.script  insert data and popup-->   
<!-- /.script  update data and popup-->   
<script>
    function update(){              
        $(document).ready(function(){
                                        $.ajax({
                                            url: "update_dep.php", 
                                            type: "POST",
                                            data: $("#form2").serialize(),
                                            success: function(result){
                                                            if(result == 1){
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
                                                                                        title: "อัพเดทข้อมูลไม่สำเร็จ",
                                                                                        text: "ท่านกรอกข้อมูลไม่ครบถ้วนหรือไม่ถูกต้อง",
                                                                                        icon: "error",
                                                                                        button: "ตกลง",
                                                                                      });
                                                                            }     
                                                                      }
                                                });
                                });
                    }
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
                    url: "delete_dep.php", 
                    type: "POST",
                    data: {"x": str},
                    success: function(result){
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
<script>
$(document).ready(function()
{
        load_data();
                function load_data(query)
                {
                        $.ajax(
                        {
                        url:"search_dep.php",
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

 <!-- script remove -->
        </body>
</html>
