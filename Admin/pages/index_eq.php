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
  <title>ข้อมูลครุภัณฑ์คอมพิวเตอร์</title>
  <link href="https://fonts.googleapis.com/css?family=Kanit|Prompt" rel="stylesheet">
  <?php include("link.php"); ?>

</head>
  <?php include("navbar.php"); ?>
<body>


    <!-- /.modal edit-->
    <div class="modal fade" tabindex="-1" role="dialog" id="myModal2">
        <div class="modal-dialog" role="document">
            <div class="modal-content" >
                <div class="card">
                    <div class="card-body" >  
                        <div class="modal-header" >
                            <h4 style="font-family:Prompt;"><b>เเก้ไขข้อมูลครุภัณฑ์</b></h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>                        
                        </div>
                        <div class="modal-body">
                            <form id="Edit_Eq" method="POST">
                                <table style="width:100%" align="center" id="getEq" border="0"></table>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="reset" class="btn btn-danger" data-dismiss="modal" style="font-family:Prompt;">ยกเลิก</button>
                            <button type="submit" class="btn btn-success" value="submit" name="Eq_update" id="submit" form="Edit_Eq" style="font-family:Prompt;">อัพเดท</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.modal edit-->


    <!-- /.table add ครุภัณฑ์ -->
        
        <form id="Add_eq" method="POST">
        <table align="center" style="width:100%; font-family:Prompt;" border="0" class="w3-teal ">
        <tr>
            <th><p><h3 style="text-align:center; font-family:Prompt;" class="w3-teal"><b>ข้อมูลครุภัณฑ์</b></h3></th>
                </tr>
        </table>
        <br>
            <table   align="center" style="width:70%; font-family:Prompt;" border="1" class="table-bordered">
            <tr>
            <td colspan="2" style="text-align: center; font-family:Prompt;"><b>เพิ่มข้อมูลครุภัณฑ์</b></td>
                </tr>
                <tr>
                        <th style="text-align: right;" >Barcode </th>
                    <th><input type="text" name="eq_barcode" class="form-control name_list" /></th>
                </tr>
                <tr>
                    <th style="text-align: right;" >SERIAL NO</th>
                    <th><input type="text" name="eq_sr" class="form-control name_list" /></th>
                </tr>
                <tr>
                
                </tr>
                <tr>
                    <th style="text-align: right;" >สัญญา </th>
                    <th><select name="eq_con" id="eq_con" class="form-control" onchange="filterType(this.value)">
                            <option value="null">เลือกสัญญา</option>
                            <?php
                                $year = "SELECT * FROM contract ORDER BY con_name";
                                $result = mysqli_query($conn, $year);
                                while($data = mysqli_fetch_array($result)):
                            ?>     
                            <option value="<?php echo $data['con_name']; ?>"><?php echo $data['con_name']; ?></option>
                            <?php endwhile;?>
                    </select></th>
                </tr>
                <tr>
                    <th style="text-align: right;" >ประเภทครุภัณฑ์ </th>
                    <th id="getdltype"><select name="eq_type" id="eq_type"  class="form-control" >
                        <option value="null">เลือกประเภท</option>           
                        <option value="<?php echo $data['con_name']; ?>"><?php echo $data['con_name']; ?></option>
                    </select></th>
                </tr>
             
                <tr>
                    <td colspan="6"><button type="submit" class=" btn btn-success btn-block w3-medium" value="submit" name="Eq_create" id="submit" form="Add_eq" style="font-family:Prompt;">บันทึกข้อมูล</button></td>
                </tr>
            </table>
        </form>
        <p><br>
    <!-- /.table add ครุภัณฑ์ -->
  
    
    <!-- ช่อง Search และ Datateble -->
    <div style="width:100%;" class="input-group mb-3">
    <table border="0" align="center" style="width:100%;" >
                    <tr>
                    <td><select name="search_text" id="search_text" style="width: 100%" class="form-control">
                                                            <option value="ทั้งหมด">ประเภททั้งหมด</option>
                                            <?php
                                                    $type = "SELECT * FROM type_eq ORDER BY type_name";
                                                    $result = mysqli_query($conn, $type);
                                                    while($data = mysqli_fetch_array($result)):
                                             ?>
                                                    <option value="<?php echo $data['type_name']; ?>"><?php echo $data['type_name']; ?></option>
                                            <?php endwhile;?>
                                                </select></td>
                    <td><select name="search_text2" id="search_text2" style="width: 100%" class="form-control">
                                                            <option value="ทั้งหมด">สถานะทั้งหมด</option>
                                            <?php
                                                    $cont = "SELECT * FROM a_status  
                                                    WHERE status_id = 1 OR status_id = 2 OR status_id = 3 OR status_id = 5 OR status_id = 6 OR status_id = 7 OR status_id = 8 OR status_id = 10 OR status_id = 11
                                                    ORDER BY status_id";
                                                    $result2 = mysqli_query($conn, $cont);
                                                    while($data = mysqli_fetch_array($result2)):
                                             ?>
                                                    <option value="<?php echo $data['status_id']; ?>"><?php echo $data['status_name']; ?></option>
                                            <?php endwhile;?>
                                                </select></td>

                    </tr>
                    </table>
    </div>
    <div class="table-responsive" id="result">
        <p></p>
        <form id="form3"></form>
    </div>
    <!-- ช่อง Search และ Datateble -->

    
    <?php include ("footer.php"); ?>
    <script>
$(document).ready(function(){  
        $('#tableshow').DataTable({
        "searching": true,
        "language": {
            "lengthMenu": "ข้อมูลเเสดง _MENU_ ต่อหน้า",
            "info": " _PAGE_ หน้าจาก _PAGES_",
            "sSearch": "ค้นหา"

        },
  
      retrieve: true,

      
});  
 }); 
</script>



    <script>
        $(document).ready(function(){
            load_data();
                function load_data(query)
                {
                    $.ajax({
                        url:"search_eq.php",
                        method:"POST",
                        data:{query:query},
                        success:function(data){
                            $('#result').html(data);
                        }
                    });
                }
                $('#search_text').keyup(function()
                {
                    var search = $(this).val();
                    if(search != ''){
                        load_data(search);
                    }else{
                        load_data();
                    }
                });
        });
    </script>       
    
    
    <script>
        function filterType(str) {
            var xhttp;    
            if (str == "") {
                document.getElementById("getdltype").innerHTML = "";
                return;
            }
            xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                document.getElementById("getdltype").innerHTML = this.responseText;
                }
            };
            xhttp.open("GET", "getDLtype.php?id="+str, true);
            xhttp.send();
        }
    </script>


    <script>          
        $(document).ready(function(){  
            $('#Eq_create').on("click", function(){  
                $('#Add_eq').submit();  
            });  
            $('#Add_eq').on('submit', function(e){  
                e.preventDefault();  
                $.ajax({  
                    url :"create_Eq.php",  
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
                                });
                            }if(data == 2){
                                swal( {
                                    title: "เพิ่มข้อมูลไม่สำเร็จ",
                                    text: "รูปนี้ถูกใช้ในระบบเเล้ว",
                                    icon: "error",
                                    button: "กรอกข้อมูลอีกครั้ง",
                                });
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
        $(document).ready(function(){  
            $('#Eq_update').on("click", function(){  
                $('#Edit_Eq').submit();  
            });  
            $('#Edit_Eq').on('submit', function(e){  
                e.preventDefault();  
                    $.ajax({  
                        url :"update_eq.php",  
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
                                });
                            }if (data == 2){
                                swal( {
                                                 title: "อัพเดทข้อมูลไม่สำเร็จ",
                                                 text: "รูปนี้ถูกใช้ในระบบเเล้ว",
                                                 icon: "error",
                                                 button: "กรอกข้อมูลอีกครั้ง",
                                });
                            }if (data == 3){
                                swal( {
                                                 title: "อัพเดทข้อมูลไม่สำเร็จ",
                                                 text: "Barcodeนี้ถูกใช้ในระบบเเล้ว",
                                                 icon: "error",
                                                 button: "กรอกข้อมูลอีกครั้ง",
                                });
                            }if (data == 4){
                                swal( {
                                                 title: "อัพเดทข้อมูลไม่สำเร็จ",
                                                 text: "Serialนี้ถูกใช้ในระบบเเล้ว",
                                                 icon: "error",
                                                 button: "กรอกข้อมูลอีกครั้ง",
                                });
                            }if(data == 5){
                                swal( {
                                                 title: "อัพเดทข้อมูลไม่สำเร็จ",
                                                 text: "เกิดข้อผิดพลาดเกี่ยวกับฐานข้อมูล",
                                                 icon: "error",
                                                 button: "ตกลง",
                                });
                            }if(data == 6){
                                swal( {
                                                 title: "อัพเดทข้อมูลไม่สำเร็จ",
                                                 text: "ท่านเลือกนามสกุลไฟล์รูปไม่ถูกต้อง",
                                                 icon: "error",
                                                 button: "ตกลง",
                                });
                            }if(data == 7){
                                swal( {
                                                 title: "อัพเดทข้อมูลไม่สำเร็จ",
                                                 text: "กรุณากรอกข้อมูลให้ครบถ้วน",
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
        function removeEq(str){
            swal({
                    title: "คุณต้องการลบข้อมูลนี้ใช่หรือไม่",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
            }).then (function (isConfirm){
                if (isConfirm) {
                    $.ajax({
                        url: "delete_Eq.php", 
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
        function namepic(){
            var name = document.getElementById('select_image');
            var x = name.files.item(0).name;
            document.getElementById('eq_pic').value = x;
        }
    </script>


    <script>
        function showEq(str) {
            var xhttp;    
            if (str == "") {
                document.getElementById("getEq").innerHTML = "";
                return;
            }
            xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                document.getElementById("getEq").innerHTML = this.responseText;
                }
            };
            xhttp.open("GET", "getEq.php?id="+str, true);
            xhttp.send();
            }
    </script>
<script>
$(document).ready(function()
{
        load_data();
                function load_data(a, x)
                {
                        $.ajax(
                        {
                        url:"search_eq.php",
                        method:"POST",
                        data:{'type':a, 'b':x},
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
                    var search2 = $('#search_text2').val();
                    if(search != '' && search2 != '')
                    {
                        load_data(search, search2);
                    }else
                    {
                        load_data();
                    }
                }
                );
});
</script>

<script>
$(document).ready(function()
{
        load_data();
                function load_data(b, x)
                {
                        $.ajax(
                        {
                        url:"search_eq.php",
                        method:"POST",
                        data:{'status':b, 'b':x},
                        success:function(data)
                        {
                            $('#result').html(data);
                        }
                        }
                            );
                }
                $('#search_text2').change(function()
                {
                    var search2 = $(this).val();
                    var search = $('#search_text').val();
                    if(search2 != '' && search != '')
                    {
                        load_data(search2, search);
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