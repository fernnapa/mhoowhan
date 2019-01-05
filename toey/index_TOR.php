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
    <title>ข้อมูลเจ้าหน้าที่</title>
        <body>
                <br><br><br><br><br>
  <!---------------------------------------------------- /.modal data type---------------------------------------------------------------------------------------------->
<!---------------------------------------------------- /.modal data type---------------------------------------------------------------------------------------------->

  <div class="modal fade" tabindex="-1" role="dialog" id="myModalType">
                    <div class="modal-dialog" role="document" style="width:500x";>
                    <div class="modal-content">
                    <div class="modal-header">
                         <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">ข้อมูลประเภท</h4>
                    </div>
                            <div class="modal-body">
                    <table id="tableType" align="center" style="width:100%;" class="table table-striped table-bordered " >
                    <thead>
                    <tr >
                        <td style="text-align: center; ">ชื่อประเภท</td>
                   
                        <td style="text-align: center; ">Action</td>
                        <td style="text-align: center; "></td>

                    </tr>
                    </thead>
                    <tr>
                    <?php
                       $sql = "SELECT * FROM type";
                       $result = mysqli_query($conn, $sql);
                       while($data = mysqli_fetch_array($result)):

                    ?>
                        <td style="text-align:left"><?php echo $data['type_name']; ?></td>
                                           
                        <td><button type="button" class="btn btn-warning btn-block" data-toggle="modal" onclick="showType(<?php echo $data['type_id']; ?>)" data-target="#ModalEditType">เเก้ไข</button></td></form>
                        <td><button type="button" class="btn btn-danger btn-block" onclick="removeType(<?php echo $data['type_id']; ?>)" >ลบ</button></td>
                    </tr>
                       <?php endwhile;?>
                </table>
                                </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success"  value="submit" name="type_create" id="submit" data-toggle="modal" data-target="#ModalAddType">เพิ่มข้อมูลประเภท</button>
                        <button type="reset" class="btn btn-danger" data-dismiss="modal">ปิด</button>
                    </div>
                    </div>
                    </div>
                </div>
<!-- /.modal data type-->
<!-- /.modal add type-->
<div class="modal fade" tabindex="-1" role="dialog" id="ModalAddType">
                    <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                         <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">เพิ่มข้อมูลประเภท</h4>
                    </div>
                            <div class="modal-body">
                                    <form id="Add_Type" method="POST">
                                            <table style="width:60%" align="center">
                                                    <tr>
                                                    </tr>
                                                    <tr>
                                                    <th style="text-align: center;">ชื่อประเภท</th>                                                                                   
                                                </tr>
                                                <tr>
                                                <td><input type="text" id="type_name" name="type_name" style="width:99%" class="form-control"></td>
                                                </tr>
                                            </table>
                                    </form>
                                </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-danger" data-dismiss="modal">ยกเลิก</button>
                        <button type="submit" class="btn btn-success"  value="submit" name="Type_create" id="submit" form="Add_Type">บันทึกข้อมูล</button>
                    </div>
                    </div>
                    </div>
                </div>
<!-- /.modal edit-->
<div class="modal fade" tabindex="-1" role="dialog" id="ModalEditType">
                            <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title">เเก้ไขข้อมูลประเภท</h4>
                            </div>
                                    <div class="modal-body">
                                            <form id="Edit_Type" method="POST">
                                            <table style="width:100%" align="center" id="getType">
                                               
                                               
                                            
                                            </table>
                                            </form>
                                        </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success" value="submit" name="Type_update" id="submit" form="Edit_Type">อัพเดท</button>
                                <button type="reset" class="btn btn-danger" data-dismiss="modal">ยกเลิก</button>
                            </div>
                            </div>
                            </div>
                            </div>
<!-- /.modal edit-->
<!---------------------------------------------------- /.modal add type---------------------------------------------------------------------------------------------->
<!---------------------------------------------------- /.modal add type---------------------------------------------------------------------------------------------->

<!---------------------------------------------------- /.modal add contract---------------------------------------------------------------------------------------------->
<!---------------------------------------------------- /.modal add contract---------------------------------------------------------------------------------------------->
<div class="modal fade" tabindex="-1" role="dialog" id="myModalCon">
                    <div class="modal-dialog" role="document" style="width:500x";>
                    <div class="modal-content">
                    <div class="modal-header">
                         <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">ข้อมูลสัญญา</h4>
                    </div>
                            <div class="modal-body">
                    <table id="tableCon" align="center" style="width:100%;" class="table table-striped table-bordered " >
                    <thead>
                    <tr >
                        <td style="text-align: center; ">ชื่อสัญญา</td>
                        <td style="text-align: center; ">รายละเอียดสัญญา</td>
                        <td style="text-align: center; ">Action</td>
                        <td style="text-align: center; "></td>

                    </tr>
                    </thead>
                    <tr>
                    <?php
                       $sql = "SELECT * FROM contract";
                       $result = mysqli_query($conn, $sql);
                       while($data = mysqli_fetch_array($result)):

                    ?>
                        <td style="text-align:left"><?php echo $data['con_name']; ?></td>
                        <td style="text-align:left"><?php echo $data['con_des']; ?></td>

                        <td><button type="button" class="btn btn-warning btn-block" data-toggle="modal" onclick="showCon(<?php echo $data['con_id']; ?>)" data-target="#ModalEditCon">เเก้ไข</button></td></form>
                        <td><button type="button" class="btn btn-danger btn-block" onclick="removeCon(<?php echo $data['con_id']; ?>)" >ลบ</button></td>
                    </tr>
                       <?php endwhile;?>
                </table>
                                </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success"  value="submit" name="con_create" id="submit" data-toggle="modal" data-target="#ModalAddCon">เพิ่มข้อมูลสัญญา</button>
                        <button type="reset" class="btn btn-danger" data-dismiss="modal">ปิด</button>
                    </div>
                    </div>
                    </div>
                </div>
<!-- /.modal data con-->
<!-- /.modal add con-->
<div class="modal fade" tabindex="-1" role="dialog" id="ModalAddCon">
                    <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                         <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">เเก้ไขข้อมูลสัญญา</h4>
                    </div>
                            <div class="modal-body">
                                    <form id="Add_Con" method="POST">
                                            <table style="width:60%" align="center">
                                                    <tr>
                                                    </tr>
                                                    <tr>
                                                    <th style="text-align: left;">ชื่อสัญญา</th>   
                                                    <th style="text-align: left;">รายละเอียดสัญญา</th>                                                                                                                                                                  
                                                </tr>
                                                <tr>
                                                <td><input type="text" id="con_name" name="con_name" style="width:99%" class="form-control"></td>
                                                <td><input type="text" id="con_des" name="con_des" style="width:99%" class="form-control"></td>
                                                </tr>
                                            </table>
                                    </form>
                                </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-danger" data-dismiss="modal">ยกเลิก</button>
                        <button type="submit" class="btn btn-success"  value="submit" name="Con_create" id="submit" form="Add_Con">บันทึกข้อมูล</button>
                    </div>
                    </div>
                    </div>
                </div>
<!-- /.modal edit-->
<div class="modal fade" tabindex="-1" role="dialog" id="ModalEditCon">
                            <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title">เเก้ไขข้อมูลสัญญา</h4>
                            </div>
                                    <div class="modal-body">
                                            <form id="Edit_Con" method="POST">
                                            <table style="width:100%" align="center" id="getCon">
                                               
                                               
                                            
                                            </table>
                                            </form>
                                        </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success" value="submit" name="Con_update" id="submit" form="Edit_Con">อัพเดท</button>
                                <button type="reset" class="btn btn-danger" data-dismiss="modal">ยกเลิก</button>
                            </div>
                            </div>
                            </div>
                            </div>
<!-- /.modal edit-->





<!---------------------------------------------------- /.modal add contract---------------------------------------------------------------------------------------------->
<!---------------------------------------------------- /.modal add contract---------------------------------------------------------------------------------------------->
<!-- /.modal add-->
                <div class="modal fade" tabindex="-1" role="dialog" id="myModal">
                    <div class="modal-dialog" role="document"> 
                    <div class="modal-content">
                    <div class="modal-header">
                         <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">เพิ่มข้อมูล TOR</h4>
                    </div>
                            <div class="modal-body">
                                    <form id="Add_tor" method="POST">
                                        <table style="width:70%" align="center" border="1">
                                            <tr>
                                            </tr>
                                            <tr>
                                                <th style="text-align: right;">ชื่อ TOR</th>
                                                <th style="text-align: center;"><input type="text" id="tor_name" name="tor_name" style="width:99%" class="form-control"></th>
                                            </tr>

                                            
                                            <tr>
                                                <th style="text-align: right;">ประเภท TOR</th>
                                                <th style="text-align: center;"><select name="tor_type" id="tor_type" style="width: 99%" class="form-control">
                                                            <option value="">เลือกประเภท</option>
                                            <?php
                                                    $type = "SELECT * FROM type ORDER BY type_name";
                                                    $result = mysqli_query($conn, $type);
                                                    while($data = mysqli_fetch_array($result)):
                                             ?>
                                                    <option value="<?php echo $data['type_id']; ?>"><?php echo $data['type_name']; ?></option>
                                            <?php endwhile;?>
                                                </select></th>        
                                            </tr>
                                            <tr>
                                                <th style="text-align: right;">สัญญา</th>
                                                <th style="text-align: center;"><select name="tor_contract" id="tor_contract" style="width: 99%" class="form-control">
                                                            <option value="">เลือกสัญญา</option>
                                            <?php
                                                        $cont = "SELECT * FROM contract ORDER BY con_name";
                                                        $result = mysqli_query($conn, $cont);
                                                        while($data = mysqli_fetch_array($result)):
                                             ?>
                                                            <option value="<?php echo $data['con_id']; ?>"><?php echo $data['con_name']; ?></option>
                                            <?php endwhile;?>
                                                </select></th>
                                            </tr>
                                            <tr>
                                                <th style="text-align: right; vertical-align:top" >รายละเอียด TOR</th>
                                                <th style="text-align: center;"><textarea class="form-control" rows="5" id="comment" name="tor_des" ></textarea></th>
                                            </tr>
                                        </table>
                                    </form>
                                </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-danger" data-dismiss="modal">ยกเลิก</button>
                        <button type="submit" class="btn btn-success"  value="submit" name="Tor_create" id="submit" form="Add_tor">บันทึกข้อมูล</button>
                    </div>
                    </div>
                    </div>
                </div>
<!-- /.modal add-->


<!-- /.modal edit-->
<div class="modal fade" tabindex="-1" role="dialog" id="ModalEditTor">
                            <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title">เเก้ไขข้อมูลสัญญา</h4>
                            </div>
                                    <div class="modal-body">
                                            <form id="Edit_Tor" method="POST">
                                            <table style="width:100%" align="center" id="getTor">
                                            <tr>
                                            </tr>
                                               
                                            
                                            </table>
                                            </form>
                                        </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success" value="submit" name="Tor_update" id="submit" form="Edit_Tor">อัพเดท</button>
                                <button type="reset" class="btn btn-danger" data-dismiss="modal">ยกเลิก</button>
                            </div>
                            </div>
                            </div>
                            </div>
<!-- /.modal edit-->

<!-- /.data -->
<div class="container w3-card-2 w3-round" style="width:80% " >  
                        <table align="center" style="width:100%">
                        <tr>
                            <th colspan="6"><h4 style="text-align:center;"><b>ข้อมูล TOR</b></h4></th>
                        </tr>
                        <tr>
                        <form class="form-inline" onsubmit="openModal()" id="myForm">
                        <th colspan="5"><input type="text" style="width:100%;" size="50" name="search_tor" id="search_tor" class="form-control"></th>
                        <th style="text-align:right;"><button type="submit" class="btn btn-success btn-block">เพิ่มข้อมูล TOR</button></th>
                        
                        </form>                           
                        </tr>
                        <tr>
                            <td colspan="3" style="width:50%"><button type="submit" class="btn btn-primary btn-block"  data-toggle="modal" data-target="#myModalType">จัดการข้อมูลประเภท</button></td>
                            <td colspan="3" ><button type="submit" class="btn btn-primary btn-block" data-toggle="modal" data-target="#myModalCon">จัดการข้อมูลสัญญา</button></td>                          

                        </tr>
                    </table>
                    <br>
                </div> 
                    <br>
    
                    <div class="container w3-card-2 w3-round" style="width:80% " >
                    <div class="table-responsive" id="result">
                    <p></p>
                    <form id="form3"> 
                    <table id="tableCon" align="center" style="width:100%;" class="table table-striped table-bordered " >
                    <thead>
                    <tr >
                        <td style="text-align: center; ">ชื่อ TOR</td>
                        <td style="text-align: center; ">รายละเอียด TOR</td>
                        <td style="text-align: center; ">ประเภท</td>
                        <td style="text-align: center; ">สัญญา</td>
                        <td style="text-align: center; ">Action</td>
                        <td style="text-align: center; "></td>

                    </tr>
                    </thead>
                    <tr>
                    <?php
                       $sql = "SELECT * FROM tor";
                       $result = mysqli_query($conn, $sql);
                       while($data = mysqli_fetch_array($result)):

                    ?>
                        <td style="text-align:left"><?php echo $data['tor_name']; ?></td>
                        <td style="text-align:left"><?php echo $data['tor_des']; ?></td>
                        <td style="text-align:left"><?php echo $data['tor_type']; ?></td>
                        <td style="text-align:left"><?php echo $data['tor_contract']; ?></td>

                        <td><button type="button" class="btn btn-warning btn-block" data-toggle="modal" onclick="showTor(<?php echo $data['tor_id']; ?>)" data-target="#ModalEditTor">เเก้ไข</button></td></form>
                        <td><button type="button" class="btn btn-danger btn-block" onclick="removeTor(<?php echo $data['tor_id']; ?>)" >ลบ</button></td>
                    </tr>
                       <?php endwhile;?>
                </table>
                    </form>      
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

<!-- /.script showdata in modal -->   

<script>
            function showType(str) {
            var xhttp;    
            if (str == "") {
                document.getElementById("getType").innerHTML = "";
                return;
            }
            xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                document.getElementById("getType").innerHTML = this.responseText;
                }
            };
            xhttp.open("GET", "getType.php?id="+str, true);
            xhttp.send();
            }
</script>

<script>
            function showCon(str) {
            var xhttp;    
            if (str == "") {
                document.getElementById("getCon").innerHTML = "";
                return;
            }
            xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                document.getElementById("getCon").innerHTML = this.responseText;
                }
            };
            xhttp.open("GET", "getCon.php?id="+str, true);
            xhttp.send();
            }
</script>

<script>
            function showTor(str) {
            var xhttp;    
            if (str == "") {
                document.getElementById("getTor").innerHTML = "";
                return;
            }
            xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                document.getElementById("getTor").innerHTML = this.responseText;
                }
            };
            xhttp.open("GET", "getTor.php?id="+str, true);
            xhttp.send();
            }
</script>


<!-- /.script showdata in modal -->   

<!-- /.script  insert data and popup-->   

<!-- /.script  insert data and popup-->
<!-- /.script  upload data and popup-->
<script>          
                $(document).ready(function(){  
                  $('#Tor_create').on("click", function(){  
                       $('#Add_tor').submit();  
                  });  
                  $('#Add_tor').on('submit', function(e){  
                       e.preventDefault();  
                       $.ajax({  
                            url :"create_tor.php",  
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

<script>          
                $(document).ready(function(){  
                  $('#Type_create').on("click", function(){  
                       $('#Add_Type').submit();  
                  });  
                  $('#Add_Type').on('submit', function(e){  
                       e.preventDefault();  
                       $.ajax({  
                            url :"create_type.php",  
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

<script>          
                $(document).ready(function(){  
                  $('#Con_create').on("click", function(){  
                       $('#Add_Con').submit();  
                  });  
                  $('#Add_Con').on('submit', function(e){  
                       e.preventDefault();  
                       $.ajax({  
                            url :"create_con.php",  
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
                  $('#Tor_update').on("click", function(){  
                       $('#Edit_Tor').submit();  
                  });  
                  $('#Edit_Tor').on('submit', function(e){  
                       e.preventDefault();  
                       $.ajax({  
                            url :"update_tor.php",  
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
                                }
                                else if(data > 1){
                                            swal( {
                                                     title: "อัพเดทข้อมูลไม่สำเร็จ",
                                                     text: "ข้อมูลนี้มีอยู่ในระบบเเล้ว",
                                                     icon: "error",
                                                     button: "ตกลง",
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
                       })  
                  });  
             });     
</script>

<script>

    $(document).ready(function(){  
                  $('#Type_update').on("click", function(){  
                       $('#Edit_Type').submit();  
                  });  
                  $('#Edit_Type').on('submit', function(e){  
                       e.preventDefault();  
                       $.ajax({  
                            url :"update_type.php",  
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
                                }
                                else if (data > 1){
                                             swal( {
                                                     title: "อัพเดทข้อมูลไม่สำเร็จ",
                                                     text: "ข้อมูลนี้มีอยู่ในระบบเเล้ว",
                                                     icon: "error",
                                                     button: "ตกลง",
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
                       })  
                  });  
             });     
</script>

<script>

    $(document).ready(function(){  
                  $('#Con_update').on("click", function(){  
                       $('#Edit_Con').submit();  
                  });  
                  $('#Edit_Con').on('submit', function(e){  
                       e.preventDefault();  
                       $.ajax({  
                            url :"update_con.php",  
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
                                }else if (data > 1){
                                             swal( {
                                                     title: "อัพเดทข้อมูลไม่สำเร็จ",
                                                     text: "ข้อมูลนี้มีอยู่ในระบบเเล้ว",
                                                     icon: "error",
                                                     button: "ตกลง",
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
                       })  
                  });  
             });     
</script>
<!-- /.script  update data and popup-->   
<!-- /.script  datatable-->   
<script>
$(document).ready(function(){  
      $('#tableType').DataTable({
  "searching": true
});  
 }); 
</script>

<script>
$(document).ready(function(){  
      $('#tableCon').DataTable({
  "searching": true
});  
 }); 
</script>
<!-- /.script  datatable-->   
<!-- script remove -->
<script>
function removeTor(str){
    swal({
  title: "คุณต้องการลบข้อมูลนี้ใช่หรือไม่",
  icon: "warning",
  buttons: true,
  dangerMode: true,
}).then (function (isConfirm){
    if (isConfirm) {
        $.ajax({
                    url: "delete_tor.php", 
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

<script>
function removeType(str){
    swal({
  title: "คุณต้องการลบข้อมูลนี้ใช่หรือไม่",
  icon: "warning",
  buttons: true,
  dangerMode: true,
}).then (function (isConfirm){
    if (isConfirm) {
        $.ajax({
                    url: "delete_type.php", 
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

<script>
function removeCon(str){
    swal({
  title: "คุณต้องการลบข้อมูลนี้ใช่หรือไม่",
  icon: "warning",
  buttons: true,
  dangerMode: true,
}).then (function (isConfirm){
    if (isConfirm) {
        $.ajax({
                    url: "delete_con.php", 
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
                        url:"search_tor.php",
                        method:"POST",
                        data:{query:query},
                        success:function(data)
                        {
                            $('#result').html(data);
                        }
                        }
                            );
                }
                $('#search_tor').keyup(function()
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

  <!-- script upload -->
  
        </body>
</html>
