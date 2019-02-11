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
        <title>ข้อมูลประเภทครุภัณฑ์</title>
        <?php include("link.php");?>
  
        <style>
            .modal-dialog.a{
            max-width : 70%;
            }
            .modal-dialog.b{
            max-width : 700px;
            }
            body{
                font-family: 'Kanit', sans-serif;
            }
        </style>
</head>

<?php include("navbar.php");?>


<body>
<div class="card">
      <div class="card-body">

<!-- /.Model Edit ประเภท-->
    <div class="modal fade" tabindex="-1" role="dialog" id="myModalType" style="font-family:Prompt;">
        <div class="modal-dialog b" role="document";>
            <div class="modal-content">
                <div class="card">
                    <div class="card-body">
                        <div class="modal-header">
                        
                        <h4 style="font-family:Prompt; font-weight: bold;">ข้อมูลประเภท</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>           
                        </div>
                        
                        <div class="modal-body table-responsive">
                            <table id="tableType" align="center" style="width:100%;" class="table table-hover table-striped table-bordered " >
                            <thead>
                                <tr >
                                    <td style="text-align: center; font-weight: bold; font-size: large;">ชื่อประเภท</td>      
                                    <td style="text-align: center; "></td>
                                </tr>
                            </thead>
                                <tr>
                            
                                <?php
                                $sql = "SELECT * FROM type_eq";
                                $result = mysqli_query($conn, $sql);
                                while($data = mysqli_fetch_array($result)):
                                ?>

                                    <td style="text-align:left"><?php echo $data['type_name']; ?></td>                               
                                    <td style="text-align:center"><button type="button" class="btn btn-icons btn-rounded btn-warning" data-toggle="modal" onclick="showType(<?php echo $data['type_id']; ?>)" data-target="#ModalEditType" ><i class="mdi mdi-pencil"></i></button></form>
                                    <button type="button" class="btn btn-icons btn-rounded btn-danger" onclick="removeType(<?php echo $data['type_id']; ?>)" ><i class="mdi mdi-delete"></i></button></td>  
                   
                                </tr>
                                
                                <?php endwhile;?>
                            </table>
                        </div>
                    
                        <div class="modal-footer table-responsive">
                            <button type="submit" class="btn btn-success"  value="submit" name="type_create" id="submit" data-toggle="modal" data-target="#ModalAddType" style="font-family:Prompt;">เพิ่มข้อมูลประเภท</button>
                            <button type="reset" class="btn btn-danger" data-dismiss="modal" style="font-family:Prompt;">ปิด</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- /.Model Edit ประเภท-->


<!-- /.modal Add ประเภท-->
    <div class="modal fade" tabindex="-1" role="dialog" id="ModalAddType" style="font-family:Prompt;">
        <div class="modal-dialog" role="document">
            <div class="modal-content w3-card-4">
                <div class="modal-header">
                         
                    <h4 class="modal-title" style="font-family:Prompt; font-weight: bold;">เพิ่มข้อมูลประเภทครุภัณฑ์</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <form id="Add_Type" method="POST">
                        <table style="width:60%" align="center">
                            <tr></tr>
                            <tr>
                                <th style="text-align: center;" style="font-family:Prompt;">ชื่อประเภท</th>                                                                                   
                            </tr>
                            <tr>
                                <td><input type="text" id="type_name" name="type_name" class="form-control" placeholder="ระบุประเภทครุภัณฑ์"></td>
                            </tr>
                        </table>
                    </form>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-success"  value="submit" name="Type_create" id="submit" form="Add_Type" style="font-family:Prompt;">บันทึกข้อมูล</button>
                    <button type="reset" class="btn btn-danger" data-dismiss="modal" style="font-family:Prompt;">ยกเลิก</button>
                </div>
            </div>
        </div>
    </div>
<!-- /.modal Add ประเภท-->




<!-- /.modal Edit ประเภท-->
    <div class="modal fade" tabindex="-1" role="dialog" id="ModalEditType" style="font-family:Prompt;">
        <div class="modal-dialog" role="document">
            <div class="modal-content w3-card-4">
                <div class="modal-header">
                    
                    <h4 class="modal-title" style="font-family:Prompt; font-weight: bold;">เเก้ไขข้อมูลประเภท</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>     
                </div>
                <div class="modal-body">
                    <form id="Edit_Type" method="POST">
                        <table style="width:100%" align="center" id="getType"></table>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success" value="submit" name="Type_update" id="submit" form="Edit_Type" style="font-family:Prompt;">บันทึกข้อมูล</button>
                    <button type="reset" class="btn btn-danger" data-dismiss="modal" style="font-family:Prompt;">ยกเลิก</button>
                </div>
            </div>
        </div>
    </div>
<!-- /.modal Edit ประเภท-->



<!---------------------------------------------------- /.modal  contract สัญญา---------------------------------------------------------------------------------------------->
<!---------------------------------------------------- /.modal  contract สัญญา---------------------------------------------------------------------------------------------->


<!-- /.modal สัญญา Datateble-->

    <div class="modal fade" tabindex="-1" role="dialog" id="myModalCon">
        <div class="modal-dialog a" role="document" style="width:500x";>
            <div class="modal-content">
                <div class="card">
                    <div class="card-body">
                        <div class="modal-header">
                    
                            <h4 class="modal-title" style="font-family:Prompt; font-weight: bold;">ข้อมูลสัญญา</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body table-responsive">
                            <table id="tableCon" align="center" style="width:100%;" class="table table-hover table-striped table-bordered " >
                                <thead>
                                    <tr >
                                        <td style="text-align: center; font-size: large; font-weight: bold;">ชื่อสัญญา</td>
                                        <td style="text-align: center; font-size: large; font-weight: bold;">รายละเอียดสัญญา</td>
                                        <td style="text-align: center; font-size: large; font-weight: bold;">วันหมดอายุสัญญา</td>
                                        <td style="text-align: center; font-size: large; font-weight: bold;"></td>
                                    </tr>
                                </thead>
                                
                                <tr>
                                    <?php
                                        $sql = "SELECT * FROM contract";
                                        $result = mysqli_query($conn, $sql);
                                        while($data = mysqli_fetch_array($result)):
                                        $exp_date = $data['con_exp'];
                                        $today_date = date('Y-m-d');
                                        $test =0;
                                        $exp = strtotime($exp_date);
                                        $td = strtotime($today_date);
                                        if($td > $exp){
                                            $test =1;
                                        }
                                    ?>

                                    <?php 
                                        if($test == 1){ ?>
                                        <td style="text-align:left"><?php echo $data['con_name']; ?></td>
                                        <td style="text-align:left"><?php echo $data['con_des']; ?></td>
                                        <td style="text-align:center" class="w3-red">หมดอายุสัญญา</td>
                                        <td style="text-align:center"><button type="button" class="btn btn-icons btn-rounded btn-warning" data-toggle="modal" onclick="showCon(<?php echo $data['con_id']; ?>)" data-target="#ModalEditCon"><i class="mdi mdi-pencil"></i></button></form>
                                        <button type="button" class="btn btn-icons btn-rounded btn-danger" onclick="removeCon(<?php echo $data['con_id']; ?>)"><i class="mdi mdi-delete"></i></button></td>
                                </tr>
                            
                                <?php }else{ ?>
                            
                                        <td style="text-align:left"><?php echo $data['con_name']; ?></td>
                                        <td style="text-align:left"><?php echo $data['con_des']; ?></td>
                                        <td style="text-align:center"><?php echo $data['con_exp']; ?></td>
                                        <td style="text-align:center"><button type="button" class="btn btn-icons btn-rounded btn-warning" data-toggle="modal" onclick="showCon(<?php echo $data['con_id']; ?>)" data-target="#ModalEditCon"><i class="mdi mdi-pencil"></i></button></form>
                                        <button type="button" class="btn btn-icons btn-rounded btn-danger" onclick="removeCon(<?php echo $data['con_id']; ?>)"><i class="mdi mdi-delete"></i></button></td>
                                    </tr>
                            
                                <?php } ?>
                                <?php endwhile;?>
                            </table>
                        </div>
                    
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success"  value="submit" name="con_create" id="submit" data-toggle="modal" data-target="#ModalAddCon" style="font-family:Prompt;">เพิ่มข้อมูลสัญญา</button>
                            <button type="reset" class="btn btn-danger" data-dismiss="modal" style="font-family:Prompt;">ปิด</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- /.modal สัญญา Datateble-->


<!-- /.modal Add สัญญา -->
    <div class="modal fade" tabindex="-1" role="dialog" id="ModalAddCon">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                        
                        <h4 class="modal-title" style="font-family:Prompt; font-weight: bold;">เพิ่มข้อมูลสัญญา</h4>
                         <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <form id="Add_Con" method="POST">
                        <table style="width:100%" align="center" border="1">
                            <tr></tr>
                            <tr>
                                <th style="text-align: center;">ชื่อสัญญา</th>  
                                <th style="text-align: left;"><input type="text" id="con_name" name="con_name" class="form-control"></th>
                            </tr>
                            <tr> 
                                <th style="text-align: center; vertical-align:top">รายละเอียดสัญญา</th>
                                <th style="text-align: left;"><textarea class="form-control" rows="5" id="con_des" name="con_des" class="form-control"></textarea></th>
                            </tr>
                            <tr> 
                                <th style="text-align: center;">วันที่หมดอายุ</th>   
                                <th style="text-align: left;"><input type="date" id="con_des" name="con_exp" class="form-control"></th>                                                                                                                            
                            </tr>
                            <tr></tr>
                        </table>
                    </form>
                </div>
                
                <div class="modal-footer">
                        <button type="submit" class="btn btn-success"  value="submit" name="Con_create" id="submit" form="Add_Con" style="font-family:Prompt;">บันทึกข้อมูล</button>
                        <button type="reset" class="btn btn-danger" data-dismiss="modal" style="font-family:Prompt;">ยกเลิก</button>
                </div>
            </div>
        </div>
    </div>
<!-- /.modal Add สัญญา -->


<!-- /.modal Edit สัญญา -->
    <div class="modal fade" tabindex="-1" role="dialog" id="ModalEditCon">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                        
                        <h4 class="modal-title" style="font-family:Prompt; font-weight: bold;">เเก้ไขข้อมูลสัญญา</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <form id="Edit_Con" method="POST">
                        <table style="width:100%" align="center" id="getCon"></table>
                    </form>
                </div>
                <div class="modal-footer">
                        <button type="submit" class="btn btn-success" value="submit" name="Con_update" id="submit" form="Edit_Con" style="font-family:Prompt;">บันทึกข้อมูล</button>
                        <button type="reset" class="btn btn-danger" data-dismiss="modal" style="font-family:Prompt;">ยกเลิก</button>
                </div>
            </div>
        </div>
    </div>
<!-- /.modal Edit สัญญา -->
 



<!---------------------------------------------------- /.modal  TOR---------------------------------------------------------------------------------------------->
<!---------------------------------------------------- /.modal  TOR---------------------------------------------------------------------------------------------->


<!-- /.modal add TOR-->

    <div class="modal fade" tabindex="-1" role="dialog" id="myModal" >
        <div class="modal-dialog" role="document"> 
            <div class="modal-content">
                <div class="card">
                    <div class="card-body">
                        <div class="modal-header">
                                
                                <h4 class="modal-title" style="font-family:Prompt; font-weight: bold;">เพิ่มข้อมูล TOR</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body" style="font-family:Prompt;">
                            <form id="Add_tor" method="POST">
                                <table style="width:100%" align="center" border="0">
                                    <tr></tr>
                                    <tr>
                                        <th style="text-align: right;">ชื่อ TOR</th>
                                        <th style="text-align: center;"><input type="text" id="tor_name" name="tor_name" class="form-control"></th>
                                    </tr>
                                    <tr>
                                        <th style="text-align: right;">ประเภท TOR</th>
                                        <th style="text-align: center;"><select name="tor_type" id="tor_type" style="width: 100%; font-family:Prompt; font-size: 15px;" class="form-control">
                                            <option value="">เลือกประเภท</option>
                                            
                                            <?php
                                                    $type = "SELECT * FROM type_eq ORDER BY type_name";
                                                    $result = mysqli_query($conn, $type);
                                                    while($data = mysqli_fetch_array($result)):
                                             ?>
                                                            <option value="<?php echo $data['type_id']; ?>"><?php echo $data['type_name']; ?></option>
                                            <?php endwhile;?>
                                                </select></th>        
                                            </tr>
                                            <tr>
                                                <th style="text-align: right;">สัญญา</th>
                                                <th style="text-align: center;"><select name="tor_contract" id="tor_contract" style="width: 100%; font-family:Prompt; font-size: 15px;" class="form-control">
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
                            <button type="submit" class="btn btn-success"  value="submit" name="Tor_create" id="submit" form="Add_tor" style="font-family:Prompt;">บันทึกข้อมูล</button>
                            <button type="reset" class="btn btn-danger" data-dismiss="modal" style="font-family:Prompt;">ยกเลิก</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- /.modal add TOR-->


<!-- /.modal edit TOR-->
    <div class="modal fade" tabindex="-1" role="dialog" id="ModalEditTor">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="card">
                    <div class="card-body">
                        <div class="modal-header">
                                
                                <h4 class="modal-title" style="font-family:Prompt; font-weight: bold;">เเก้ไขข้อมูล</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body">
                            <form id="Edit_Tor" method="POST">
                                <table style="width:100%" align="center" id="getTor"  border="0">
                                    <tr></tr>
                                </table>
                            </form>
                        </div>
                        <div class="modal-footer">
                                <button type="submit" class="btn btn-success" value="submit" name="Tor_update" id="submit" form="Edit_Tor" style="font-family:Prompt;">บันทึกข้อมูล</button>
                                <button type="reset" class="btn btn-danger" data-dismiss="modal" style="font-family:Prompt;">ยกเลิก</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- /.modal edit TOR-->



<!-- /.Datateble -->
<table align="center" class="w3-teal" style="width:100%">
            <tr>
                <th colspan="7"><p><h3 style="text-align:center; font-family:Prompt;"><b>ข้อมูล TOR</b></h3></th>
            </tr>
            </table>
    <br>
    <table align="center" style="width:100%">
        <tr>
        <form class="form-inline" onsubmit="openModal()" id="myForm">
            <th colspan="5"><input type="text" style="width:100%;" size="50" name="search_tor" id="search_tor" class="form-control" placeholder="ระบุคำที่ต้องการค้นหา"></th>
            <th style="text-align:right;"><button type="submit" class="btn btn-success btn-block" style="font-family:Prompt;">เพิ่มข้อมูล TOR</button></th>
        </form>                           
        </tr>
        <tr>
            <td colspan="3" style="width:50%"><button type="submit" class="btn btn-primary btn-block"  data-toggle="modal" data-target="#myModalType" style="font-family:Prompt;">จัดการข้อมูลประเภท</button></td>
            <td colspan="3" ><button type="submit" class="btn btn-primary btn-block" data-toggle="modal" data-target="#myModalCon" style="font-family:Prompt;">จัดการข้อมูลสัญญา</button></td>                          
        </tr>
    </table>

    
    <div class="table-responsive" id="result" style="font-family:Prompt;">
        <p></p>
          <form id="form3"> </form>
    </div> 
<!-- /.Datateble -->

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
                                }else if(data == 2){
                                             swal( {
                                                     title: "เพิ่มข้อมูลไม่สำเร็จ",
                                                     text: "ข้อมูลนี้มีอยู่ในระบบเเล้ว",
                                                     icon: "error",
                                                     button: "กรุณากรอกข้อมูลอีกครั้ง",
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


<!-- /.script  datatable-->   
<script>
$(document).ready(function(){  
      $('#tableType').DataTable({
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
            title: "คุณต้องการลบสัญญานี้หรือไม่",
            text: "ข้อมูลครุภัณฑ์ในสัญญานี้จะถูกไปด้วย",
            text: "ข้อมูลครุภัณฑ์ในสัญญานี้จะถูกไปด้วย",
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

  </body>
  </html>
