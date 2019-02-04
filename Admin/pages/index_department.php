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
    <title>ข้อมูลหน่วยงาน</title>
    <?php include("link.php"); ?>

    <style>
    .modal-dialog.a{
        max-width : 70%;
    } body{
        font-family: 'Kanit', sans-serif;
    }
    </style>
</head>

  <?php include("navbar.php"); ?>

<body>

    <!-- /.modal edit-->
    <div class="modal fade" tabindex="-1" role="dialog" id="myModal2">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="card">
                <div class="card-body">
                <div class="modal-header">
                    <h4 class="modal-title" style="font-family:Prompt; font-weight: bold;">แก้ไขข้อมูลหน่วยงาน</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>        
                </div>

                <div class="modal-body">
                    <form id="form2" method="POST">
                        <table style="width:100%" align="center" id="txtHint" border="0"  class="table-responsive"></table>
                    </form>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-success" value="submit" name="submit" id="submit" onclick="update()" style="font-family:Prompt;">บันทึกข้อมูล</button>
                    <button type="reset" class="btn btn-danger" data-dismiss="modal" style="font-family:Prompt;">ยกเลิก</button>
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>
    <!-- /.modal edit-->

    <!-- /.data -->
    <div class="container w3-card-2 w3-round" style="width:60% " >          
        <table align="center">
            <tr>
                <br/>
                <th colspan="7"><h3 style="text-align:center; font-family:Prompt;"><b>ค้นหาข้อมูลหน่วยงาน</b></h3></th>
            </tr>
            <tr>
                <form class="form-inline">
                    <th colspan="6"><input type="text" style="width:100%;" size="50" name="search_text" id="search_text" class="form-control" placeholder="ระบุคำที่ต้องการค้นหา"></th>
                    <th style="text-align:right;"><button type="button" class="btn btn-success btn-block" style="font-family:Prompt;" onclick="location.href='create_dep.php';">เพิ่มข้อมูล</button></th>   
                </form>                        
            </tr>
        </table>
        <br>
    </div>
    <br>          


    <div class="table-responsive" id="result" style="font-family:Prompt;">
        <p></p>
          <form id="form3"> </form>
    </div>
        
    <!-- /.data -->
    <?php include ("footer.php"); ?>
    
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
                            });
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
                            });   
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
        $(document).ready(function(){
            load_data();
                function load_data(query){
                    $.ajax({
                        url:"search_dep.php",
                        method:"POST",
                        data:{query:query},
                        success:function(data)
                        {
                            $('#result').html(data);
                        }
                    });
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
                });
        });
    </script>

</body>
</html>