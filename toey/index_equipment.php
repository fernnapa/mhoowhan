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
         
    </style>
    </head>
    <title>ข้อมูลครุภัณฑ์</title>
        <body>
                <br><br><br><br><br>          

<!-- /.modal add-->
<!-- /.modal upload-->

<!-- /.modal upload-->

<!-- /.modal edit-->
                <div class="modal fade" tabindex="-1" role="dialog" id="myModal2">
                            <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title">เเก้ไขข้อมูลครุภัณฑ์</h4>
                            </div>
                                    <div class="modal-body">
                                            <form id="Edit_Eq" method="POST">
                                            <table style="width:100%" align="center" id="getEq">
                                               
                                               
                                            
                                            </table>
                                            </form>
                                        </div>
                            <div class="modal-footer">
                                <button type="reset" class="btn btn-danger" data-dismiss="modal">ยกเลิก</button>
                                <button type="submit" class="btn btn-success" value="submit" name="Eq_update" id="submit" form="Edit_Eq">อัพเดท</button>
                            </div>
                            </div>
                            </div>
                            </div>
<!-- /.modal edit-->

<!-- /.data -->
           
                <div class="container w3-card-2 w3-round" style="width:80% " >  
                <p>
                                    <form id="Add_eq" method="POST">
                                            <table  style="width:90%"  align="center" border="0">
                                                <tr>
                                                <th colspan="6"><h3 style="text-align:center;"><b>ข้อมูลครุภัณฑ์</b></h3></th>
                                                </tr>
                                            <tr>
                                                <th style="text-align: right; width:20%">Barcode</th>
                                                <th><input type="text" name="eq_barcode" class="form-control name_list" /></th>
                                            </tr>
                                            <tr>
                                                <th style="text-align: right; ">SERIAL NUMBER</th>
                                                <th><input type="text" name="eq_sr" class="form-control name_list" /></th>
                                            </tr>
                                                <th style="text-align: right; width: 100px">รูปภาพ</th>
                                                <th ><input type="file" name="images[]"  id="select_image" multiple  onchange="namepic()" class="form-control"></th>                               
                                                <input type="hidden" id="eq_pic" name="eq_pic" style="width:99%" class="form-control">

                                            </tr>
                                            <tr>
                                                <th style="text-align: right;">สัญญา</th>
                                                <th><select name="eq_con" id="eq_con" style="width: 99%" class="form-control" onchange="filterType(this.value)">
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
                                                <th style="text-align: right;">ประเภทครุภัณฑ์</th>
                                                <th id="getdltype"><select name="eq_type" id="eq_type" style="width: 99%" class="form-control" >
                                                            <option value="null">เลือกประเภท</option>
                                                          
                                                            <option value="<?php echo $data['con_name']; ?>"><?php echo $data['con_name']; ?></option>
                                               </select></th>
                                            </tr>
                                               
                                            <tr>
                                            <td colspan="2"><button type="submit" class="btn btn-success btn-block" value="submit" name="Eq_create" id="submit" form="Add_eq">บันทึกข้อมูล</button></td>
                                            </tr>
                                            </table>
                                            
                                    </form>
                                    <p><br>
                                </div>
                                <br>
            
                    <div class="container w3-card-2 w3-round" style="width:90% " > 
                    <br>
                    <input type="text" style="width:100%;" size="80" name="search_text" id="search_text" class="form-control" placeholder="กรอกข้อมูลที่ต้องการค้นหา">

                    <div class="table-responsive" id="result">
                    <p></p>
                    <form id="form3"> 
                    <table id="tableshow" align="center" style="width:100%;" class="table table-striped table-bordered " >
                    <thead>
                    <tr >
                        <td style="text-align: center;">Barcode</td>
                        <td style="text-align: center;">Serial Number</td>
                        <td style="text-align: center;">รูปภาพ</td>
                        <td style="text-align: center;">สัญญา</td>
                        <td style="text-align: center;">ประเภทครุภัณฑ์</td>
                        <td style="text-align: center;">TOR</td>
                        <td style="text-align: center;">Action</td>
                        <td style="text-align: center;"></td>

                    </tr>
                    </thead>
                    <tr>
                    <?php
                       $sql = "SELECT * FROM equipment";
                       $result = mysqli_query($conn, $sql);
                       while($data = mysqli_fetch_array($result)):

                    ?>
                        <td style="text-align:left"><?php echo $data['eq_barcode']; ?></td>
                        <td style="text-align:left"><?php echo $data['eq_serial']; ?></td>
                        <td style="text-align:left"><?php echo $data['eq_pic']; ?></td>
                        <td style="text-align:left"><?php echo $data['eq_']; ?></td>
                        <td style="text-align:left"><?php echo $data['eq_tor']; ?></td>
                        <td style="text-align:left"><?php echo $data['eq_status']; ?></td>
                      

                        <td><button type="button" class="btn btn-warning btn-block" data-toggle="modal" onclick="showEq(<?php echo $data['emp_id']; ?>)" data-target="#myModal2">เเก้ไข</button></td></form>
                        <td><span  class="btn btn-danger btn-block" form="form3"  onclick="removeEq(<?php echo $data['eq_id']; ?>)">ลบ</span></td>                    
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
              
<!-- /.script showdata in modal -->   

<!-- /.script  insert data and popup-->   

<!-- /.script  insert data and popup-->
<!-- /.script  upload data and popup-->
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
<!-- /.script  upload data and popup-->   
<!-- /.script  update data and popup-->   
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
                                                    }
                                                    );
                                }if (data == 2){
                                    swal( {
                                                     title: "อัพเดทข้อมูลไม่สำเร็จ",
                                                     text: "รูปนี้ถูกใช้ในระบบเเล้ว",
                                                     icon: "error",
                                                     button: "กรอกข้อมูลอีกครั้ง",
                                                    }
                                                  );

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
                        url:"search_eq.php",
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
      document.getElementById('eq_pic').value = x;
}
</script>
  <!-- script upload -->
  
        </body>
</html>
