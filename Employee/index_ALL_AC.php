<?php
include("../db_connect.php");
session_start();


?>
<!DOCTYPE html>
<html>
    <head>
  
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php include("menu/link.php"); ?>     
    <style>
             .modal-dialog.a{
                max-width : 650px;
                max-height: 550px;
            }
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
            .w3-theme-l2 {color:#fff !important;background-color:#78acce !important}
    </style>
    </head>
    <?php include("menu/navbar_emp.php"); ?>

    <title>แบบฟอร์มการจัดสรร</title>
        <body >
<!-- Modal ดูข้อมูลPM -->
        <div class="modal fade" tabindex="-1" role="dialog" id="ModalViewAC">
                            <div class="modal-dialog a" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                            <h4 style="font-family:Prompt;" class="modal-title"><b>รายการจัดสรรครุภัณฑ์</b></h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            </div>
                                    <div class="modal-body table-responsive">
                                            <form id="ViewAC" >
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                          <button type="reset" class="btn btn-danger" data-dismiss="modal">ปิด</button>
                                        </div>

                            </div>
                            </div>
                            </div>


                    
                <div class="container" > 
                   
                    <table border="0" align="center" style="width:100%;" class="w3-teal w3-round">
                    <tr>
                    <td><h3 style="font-family:Prompt;"><b>รายการจัดสรรครุภัณฑ์</b></h3></a></button></td>
                    </tr>
                    </table>

                    <table border="0" align="right"  >
                    <tr>
                    <td>เลือกจาก</td>
                    <td><select name="search_text" id="search_text" style="width: 100%; font-family:Prompt; font-size: 15px;" class="form-control">
                                                            <option value="ทั้งหมด">สถานะทั้งหมด</option>
                                            <?php
                                                    $type = "SELECT * FROM a_status WHERE status_id = 2 OR status_id = 5 OR status_id = 6 OR status_id = 7 OR status_id = 8 OR status_id = 10 OR status_id = 11  ORDER BY status_id";
                                                    $result = mysqli_query($conn, $type);
                                                    while($data = mysqli_fetch_array($result)):
                                             ?>
                                                    <option value="<?php echo $data['status_id']; ?>"><?php echo $data['status_name']; ?></option>
                                            <?php endwhile;?>
                                                </select></td>
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
                        <td style="text-align: center;">หน่วปปปปยงาน</td>
                        <td style="text-align: center;">พนักงานจัดสรร</td>
                        <td style="text-align: center;">สถานะ</td>
                        <td style="text-align: center;">รายละเอียด</td>
                        <td></td>

                   </tr>
                    </thead>
                    <tr>
                    <?php
                       $sql = "SELECT * FROM allocate
                            LEFT JOIN a_status
                            ON allocate.ac_status = a_status.status_id
                            LEFT JOIN department
                            ON allocate.ac_dep = department.dep_id
                          
                          
                            WHERE ac_status = 9 OR ac_status = 7 OR ac_status = 6 OR ac_status= 2 OR ac_status= 8 OR ac_status= 10 OR ac_status= 11";
                         $result = mysqli_query($conn, $sql);
                       while($data = mysqli_fetch_array($result)):
                         $id = $data['ac_id'];
                         $stn = $data['status_name'];
//                          $test =0;

                        //  $exp_date = $data['pm_enddate'];
                        //  $today_date = date('Y-m-d');
                        //  $exp = strtotime($exp_date);
                        //  $td = strtotime($today_date);
                        //  if($td > $exp){
                        //     $test =1;
                         
                       ?>

                        <?php 
                            // if($test == 1){
                            //     $status = 12; 
                            //     $update = "UPDATE `allocate` SET `ac_status`='$status' WHERE ac_id = $id ";
                            //     $rs = mysqli_query($conn, $update);
                            //     $st = "SELECT * FROM allocate
                            //     LEFT JOIN a_status
                            //     ON allocate.ac_status = a_status.status_id
                            //     LEFT JOIN department
                            //     ON allocate.ac_dep = department.dep_id WHERE ac_id = $id";
                            //     $rs1 = mysqli_query($conn, $st);
                            //     while($ex = mysqli_fetch_array($rs1)){
                            //       $stn = $ex['ac_status'];
                            //       $name = $ex['ac_name'];
                            //       $username = $ex['ac_username'];
                            //       $dep = $ex['dep_name'];
                            //       $emp = $ex['pm_empno'];
                            //       $status_name = $ex['status_name'];
                            //     }
                            
                        
                        if($stn == "รอตรวจสอบ"){ ?>
                        <td style="text-align:left"><?php echo $data['ac_title']; ?></td>
                        <td style="text-align:left"><?php echo $data['ac_name']; ?></td>
                        <td style="text-align:left"><?php echo $data['dep_name']; ?></td>
                        <td style="text-align:left"><?php echo $data['ac_empid']; ?></td>
                        <td style="text-align:left"><?php echo $data['status_name']; ?></td>
                        

                        <td><button type="button" name="submitview" class="btn btn-primary btn-block"  data-toggle="modal" data-target="#ModalViewAC" onclick="showAC(<?php echo $data['ac_id']; ?>)">ดูรายละเอียด</button></td>
                        <td></td>

                    <?php } ?>
                    <?php if($stn == "ไม่ผ่านการตรวจสอบ"){ ?>  
                        <td style="text-align:left"><?php echo $data['ac_title']; ?></td>
                        <td style="text-align:left"><?php echo $data['ac_name']; ?></td>
                        <td style="text-align:left"><?php echo $data['dep_name']; ?></td>
                        <td style="text-align:left"><?php echo $data['ac_empid']; ?></td>
                        <td style="text-align:left"><?php echo $data['status_name']; ?></td>
                        

                        <td><button type="button" name="submitview" class="btn btn-primary btn-block"  data-toggle="modal" data-target="#ModalViewAC" onclick="showAC_dt(<?php echo $data['ac_id']; ?>)">ดูรายละเอียด</button></td>
                        <td></td>

                    <?php } if($stn == "ไม่อนุมัติ"){ ?>
                        <td style="text-align:left"><?php echo $data['ac_title']; ?></td>
                        <td style="text-align:left"><?php echo $data['ac_name']; ?></td>
                        <td style="text-align:left"><?php echo $data['dep_name']; ?></td>
                        <td style="text-align:left"><?php echo $data['ac_empid']; ?></td>
                        <td style="text-align:left"><?php echo $data['status_name']; ?></td>
                        

                        <td><button type="button" name="submitview" class="btn btn-primary btn-block"  data-toggle="modal" data-target="#ModalViewAC" onclick="showAC_DC_dt(<?php echo $data['ac_id']; ?>)">ดูรายละเอียด</button></td>
                        <td></td>
                    <?php } if($stn == "อนุมัติ"){ ?>
                        <td style="text-align:left"><?php echo $data['ac_title']; ?></td>
                        <td style="text-align:left"><?php echo $data['ac_name']; ?></td>
                        <td style="text-align:left"><?php echo $data['dep_name']; ?></td>
                        <td style="text-align:left"><?php echo $data['ac_empid']; ?></td>
                        <td style="text-align:left"><?php echo $data['status_name']; ?></td>
                        

                        <td><button type="button" name="submitview" class="btn btn-primary btn-block"  data-toggle="modal" data-target="#ModalViewAC" onclick="showAC_DC_dt(<?php echo $data['ac_id']; ?>)">ดูรายละเอียด</button></td>
                        <td></td>
                        
                    <?php }if($stn == "ผ่านการตรวจสอบ"){ ?>
                        <td style="text-align:left"><?php echo $data['ac_title']; ?></td>
                        <td style="text-align:left"><?php echo $data['ac_name']; ?></td>
                        <td style="text-align:left"><?php echo $data['dep_name']; ?></td>
                        <td style="text-align:left"><?php echo $data['ac_empid']; ?></td>
                        <td style="text-align:left"><?php echo $data['status_name']; ?></td>
                        

                        <td><button type="button" name="submitview" class="btn btn-primary btn-block"  data-toggle="modal" data-target="#ModalViewAC" onclick="showAC(<?php echo $data['ac_id']; ?>)">ดูรายละเอียด</button></td>
                        <td></td>
                    <?php }if($stn == "รออนุมัติ"){?>

                        <td style="text-align:left"><?php echo $data['ac_title']; ?></td>
                        <td style="text-align:left"><?php echo $data['ac_name']; ?></td>
                        <td style="text-align:left"><?php echo $data['dep_name']; ?></td>
                        <td style="text-align:left"><?php echo $data['ac_empid']; ?></td>
                        <td style="text-align:left"><?php echo $data['status_name']; ?></td>
                        

                         <td><button type="button" name="submitview" class="btn btn-primary btn-block"  data-toggle="modal" data-target="#ModalViewAC" onclick="showAC_at(<?php echo $data['ac_id']; ?>)">ดูรายละเอียด</button></td>
                         <td></td>

                         <?php }if($stn == "จัดสรร"){ ?>
                        <td style="text-align:left"><?php echo $data['ac_title']; ?></td>
                        <td style="text-align:left"><?php echo $data['ac_name']; ?></td>
                        <td style="text-align:left"><?php echo $data['dep_name']; ?></td>
                        <td style="text-align:left"><?php echo $data['ac_empid']; ?></td>
                        <td style="text-align:left"><?php echo $data['status_name']; ?></td>
                        
                        <td><button type="button" name="submitview" class="btn btn-primary btn-block"  data-toggle="modal" data-target="#ModalViewAC" onclick="showAC_DC_dt(<?php echo $data['ac_id']; ?>)">ดูรายละเอียด</button></td>
                        <td><a href='PDF_AC.php?ac_id=<?php echo $data['ac_id'];?>' class='btn btn-danger' data-role='pdf'>แบบฟอร์ม</a></button></td> 
                            
                    <?php } ?>
                        </tr>
                       <?php endwhile; ?>
                </table>
                </form>
                </div>
                <br>
                </div>





                
                        
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <footer class="footer">
          <div class="container-fluid clearfix">
          <span class="copytext">Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | <a href="http://ccs.sut.ac.th/2012/" target="_blank">The Center for Computer Services. SUT</a></span>
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
<!-- /.data -->
<!-- /.script modal add -->


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
            xhttp.open("GET", "get_ALL_AC.php?id="+str, true);
            xhttp.send();
            }
</script>

<script>
            function showAC_DC_dt(str) {
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
            xhttp.open("GET", "getAC_DC_dt.php?id="+str, true);
            xhttp.send();
            }
</script>

<script>
            function showAC_dt(str) {
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
            xhttp.open("GET", "getAC_dt.php?id="+str, true);
            xhttp.send();
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
                        url:"search_index_All_AC.php",
                        method:"POST",
                        data:{query:query},
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
                    if(search != '' )
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
