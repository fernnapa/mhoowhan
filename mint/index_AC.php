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
    <title>รายการจัดสรรครุภัณฑ์ที่รอตรวจสอบ</title>
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
                                        <button type="button" class="btn btn-success"  value="AC_pass" name="AC_pass" id="AC_pass" form="ViewAC" >ผ่านการตรวจสอบ</button>
                                        <button type="button" class="btn btn-danger"  value="To_note" data-toggle="modal" data-target="#ModalNote"  id="To_note" name="To_note" form="ViewAC" >ไม่ผ่านการตรวจสอบ</button>
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
                            <tr>
                            <td>ชื่อผู้ตรวจสอบ</td>
                            <td><input type="text" name="ac_head" id="ac_head" class="form-control" ></td>
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
                    <td><h3><b>รายการจัดสรรครุภัณฑ์ที่รอตรวจสอบ</b></h3></a></button></td>
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
                   </tr>
                    </thead>
                    <tr>
                    <?php
                       $sql = "SELECT * FROM allocate
                            LEFT JOIN a_status
                            ON allocate.ac_status = a_status.status_id
                            LEFT JOIN department
                            ON allocate.ac_dep = department.dep_id
                            WHERE ac_status= 7";
                       $result = mysqli_query($conn, $sql);
                       while($data = mysqli_fetch_array($result)):

                    ?>
                        <td style="text-align:left"><?php echo $data['ac_title']; ?></td>
                        <td style="text-align:left"><?php echo $data['ac_name']; ?></td>
                        <td style="text-align:left"><?php echo $data['dep_name']; ?></td>
                        <td style="text-align:left"><?php echo $data['ac_emp']; ?></td>
                        <td style="text-align:left"><?php echo $data['status_name']; ?></td>

                        <td><button type="button" name="submitviewAC" class="btn btn-success btn-block"  data-toggle="modal" data-target="#ModalViewAC" onclick="showAC(<?php echo $data['ac_id']; ?>)">ดูรายการจัดสรร</button></td></form>
                    </tr>
                       <?php endwhile;?>
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
                            xhttp.open("GET", "getAC_head.php?id="+str, true);
                            xhttp.send();
                            }
                </script>



            <script>          
                            $(document).ready(function(){  
                            $('#Note_AC').on("click", function(){  
                                $('#NoteAC').submit();  
                            });  
                            $('#NoteAC').on('submit', function(e){  
                                e.preventDefault();  
                                $.ajax({  
                                        url :"Not_pass_AC.php",  
                                        method:"POST",  
                                        data:new FormData(this),  
                                        contentType:false,  
                                        processData:false,  
                                        success:function(data){
                                            var b = data;
                                            alert(b);
                                            if(data == 1){
                                                        swal( {
                                                                title: "ส่งผลการตรวจสอบเรียบร้อย",
                                                                icon: "success",
                                                                button: "ตกลง",
                                                                }).then (function(){ 
                                                                location.href = "index_AC.php";
                                                                }
                                                                );
                                            }if(data == 2){
                                                        swal( {
                                                                title: "กรุณากรอกเหตุผล",
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
                                                                title: "ส่งผลตรวจสอบไม่สำเร็จ",
                                                                text: "กรุณากรอกข้อมูลเหตุผล",
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
                            $('#AC_pass').on("click", function(){  
                                $('#ViewAC').submit();  
                            });  
                            $('#ViewAC').on('submit', function(e){  
                                e.preventDefault();  
                                $.ajax({  
                                        url :"Pass_AC.php",  
                                        method:"POST",  
                                        data:new FormData(this),  
                                        contentType:false,  
                                        processData:false,  
                                        success:function(data){
                                            var b = data;
                                            alert(b);
                                            if(data == 1){
                                                        swal( {
                                                                title: "ส่งผลการตรวจสอบเรียบร้อย",
                                                                icon: "success",
                                                                button: "ตกลง",
                                                                }).then (function(){ 
                                                                location.href = "index_AC.php";
                                                                }
                                                                );
                                            }if(data == 2){
                                                        swal( {
                                                                title: "กรุณากรอกเหตุผล",
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
                                                                title: "ส่งผลตรวจสอบไม่สำเร็จ",
                                                                text: "กรุณากรอกข้อมูลเหตุผล",
                                                                icon: "error",
                                                                button: "ตกลง",
                                                                });
                                            }if (data == 6){
                                                        swal( {
                                                                title: "ส่งผลการตรวจสอบไม่สำเร็จ",
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
                            $('#To_note').on("click", function(){  

                                var ac_id = $("#ac_id").val();
                                
                                document.getElementById("id_ac").value = ac_id;
                      

                            });  
                        });     
                        </script> 



                    </body>
            </html>
