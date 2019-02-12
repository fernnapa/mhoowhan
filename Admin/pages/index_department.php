<?php  
session_start();
include("../../db_connect.php");
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>ข้อมูลหน่วยงาน</title>
    <?php include("link.php"); ?>

    <style>
     body{
        font-family: 'Kanit', sans-serif;
    }
    </style>
</head>

  <?php include("navbar.php"); ?>

<body>
<div class="card">
      <div class="card-body">
   
    <!-- /.modal edit-->
    <div class="modal fade" role="dialog" id="myModal2">   <!--ส่วนของ Modal สังเกตุ id myModal2 ส่วนนี้จะถูกเรียกด้วย Java Script -->
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
                        <table style="width:100%" align="center" id="txtHint" border="0" >
                        </table>
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
        <table align="center" class="w3-teal" style="width:100%">
            <tr>
                <th colspan="7"><p><h3 style="text-align:center; font-family:Prompt;"><b>ข้อมูลหน่วยงาน</b></h3></th>
            </tr>
            </table>
            <br>
                <form class="form-inline">
                <table align="center" style="width:100%;" border="0">
                    <tr>
                    <th style="width:80%;"><input type="text" style="width:100%;" name="search_text" id="search_text" class="form-control" placeholder="ระบุคำที่ต้องการค้นหา"></th>
                    <th style="text-align:right; width:20%;"><button type="button" class="btn btn-success btn-block" style="font-family:Prompt;" onclick="location.href='create_dep.php';">เพิ่มข้อมูล</button></th>   
                    </tr>
                </table>
                </form>                        

    <div class="table-responsive" id="result" style="font-family:Prompt;">
        <p></p>
          <form id="form3"> </form>
    </div>
        
    <!-- /.data -->
    <?php include ("footer.php"); ?>
    </div>
    </div>


    <!----------- หลักการทำงาน AJAX เราจะสามารถใช้งานฝั่ง serve โดยไม่ต้องกดปุ่ม ------------>
    <script>   
        $(document).ready(function(){
            load_data();
                function load_data(query){   // query กำหนดเอง
                    $.ajax({
                        url:"search_dep.php",
                        method:"POST",
                        data:{query:query},  //ตัวแปนตัวแรกอะไรก็ได้ แต่อีกตัวต้องเหมือนใน load_data(query)
                        success:function(data)   
                        {
                            $('#result').html(data);  //เอาไปแทนที่ในแทค html ที่มีชื่อว่า result
                        }
                    });
                }
                $('#search_text').keyup(function()    //ถ้ามีการพิมพ์
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



    <!-------------- ใช้สำหรับดูรายละเอียด เพื่อกแก้ไข---------------->   
    <script>
        function showDepartment(str) {
        var xhttp;    
            if (str == "") {  
                document.getElementById("txtHint").innerHTML = "";
                return;
            }
            xhttp = new XMLHttpRequest();    //ใช้สร้าง XHR Object ขึ้นมาใช้งาน
            xhttp.onreadystatechange = function() {    //ตรวจสอบสถานะการทำงานของการ request
                if (this.readyState == 4 && this.status == 200) {    
                document.getElementById("txtHint").innerHTML = this.responseText; //คืนค่าข้อมูลที่ response มาจาก server แบบข้อความ
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
                        // alert(result);
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

</body>
</html>