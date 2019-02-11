<?php
include("../db_connect.php");
session_start();
$_SESSION['chooseEq'] = array();
?>
<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Home</title>
    <?php include("menu/link.php"); ?>
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
    <?php include("menu/navbar_emp.php"); ?>
    <title>จัดสรรครุภัณฑ์</title>
        <body>

        
    <div class="card">
      <div class="card-body">


                <?php
                        $id = $_POST['id_add'];
                ?>
                     
                    <div class="container" > 
                    
                    <table border="0" align="center" style="width:100%;" class="w3-teal w3-round">
                    <tr>
                    <td><h3 style="font-family:Prompt;"><b>จัดสรรครุภัณฑ์</b></h3></a></button></td>
                    </tr>
                    </table>
                    <br>


                      
                    <table border="0" align="center" style="width:100%;" >
                    <tr>
                    <td><select name="search_text" id="search_text" style="width: 100%; font-family:Prompt; font-size: 15px;" class="form-control">
                                                            <option value="ทั้งหมด">ประเภททั้งหมด</option>
                                            <?php
                                                    $type = "SELECT * FROM type_eq ORDER BY type_name";
                                                    $result = mysqli_query($conn, $type);
                                                    while($data = mysqli_fetch_array($result)):
                                             ?>
                                                    <option value="<?php echo $data['type_name']; ?>"><?php echo $data['type_name']; ?></option>
                                            <?php endwhile;?>
                                                </select></td>
                    <td><select name="search_text2" id="search_text2" style="width: 100%; font-family:Prompt; font-size: 15px;" class="form-control">
                                                            <option value="ทั้งหมด">สัญญาทั้งหมด</option>
                                            <?php
                                                    $cont = "SELECT * FROM contract ORDER BY con_name";
                                                    $result2 = mysqli_query($conn, $cont);
                                                    while($data = mysqli_fetch_array($result2)):
                                             ?>
                                                    <option value="<?php echo $data['con_name']; ?>"><?php echo $data['con_name']; ?></option>
                                            <?php endwhile;?>
                                                </select></td>

                    </tr>
                    </table>
                    <br>

                    <div class="card">
                    <div class="card-body">
                    <div class="table-responsive" id="result">
                   
                    <form id="form3"> 
                    <table id="tableshow" align="center" style="width:100%;" class="table table-striped table-bordered " >
                    <thead>
                    <tr>
                        <td style="text-align: center;">Barcode</td>
                        <td style="text-align: center;">Serial Number</td>
                        <td style="text-align: center;">สัญญา</td>
                        <td style="text-align: center;">ประเภทครุภัณฑ์</td>
                        <td style="text-align: center;">สถานะ</td>
                        <td style="text-align: center;">เลือกครุภัณฑ์</td>
                   </tr>
                    </thead>
                    <tr>
                    <?php
                       $sql = "SELECT * FROM equipment
                       LEFT JOIN a_status
                            ON equipment.eq_status = a_status.status_id
                            LEFT JOIN tor
                            ON equipment.eq_tor = tor.tor_id
                            LEFT JOIN contract
                            ON tor.tor_contract = contract.con_id
                            LEFT JOIN type_eq
                            ON tor.tor_type = type_eq.type_id 
                            WHERE status_name = 'รอจัดสรร'";
                       $result = mysqli_query($conn, $sql);
                       while($data = mysqli_fetch_array($result)):

                    ?>
                        <td style="text-align:left"><?php echo $data['eq_barcode']; ?></td>
                        <td style="text-align:left"><?php echo $data['eq_serial']; ?></td>
                        <td style="text-align:left"><?php echo $data['con_name']; ?></td>
                        <td style="text-align:left"><?php echo $data['type_name']; ?></td>
                        <td style="text-align:left"><?php echo $data['status_name']; ?></td>
                        <input type="hidden" name="id" value="<?php echo $data['eq_id']; ?>">

                        <td><button type="button" name="submit" id="submit<?php echo $data['eq_id']; ?>" class="btn btn-success btn-block" value="<?php echo $data['eq_id']; ?>" onclick="getid(this)" style="font-family:Prompt;" >เลือกครุภัณฑ์</button></td></form>
                    </tr>
                       <?php endwhile;?>
                </table>
                </form>
                </div>
                <table border="0" align="center" style="width:25%;">
                    <tr>
                    <td><button type="button" name="addEdit" class="btn btn-primary btn-block" value="<?php echo $id; ?>" onclick="Addac(this)" style="font-family:Prompt;"> ยืนยันการเลือกครุภัณฑ์ </button></td>
                    </tr>
                </table>
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
  </div>
  </div>
  </div>
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
      function getid(str){
         var a = str.value;
         var b = str.id;
          $(document).ready(function(){
                $.ajax({

                        url: 'insert_Edit_AC.php',
                        type: 'POST',
                        data: {'id':a},
                        success:function(res){
                            alert(res);
                            if(res == 2){
                            swal( {
                                                     title: "เลือกข้อมูลไม่สำเร็จ",
                                                     text: "ข้อมูลนี้ถูกเลือกไปเเล้ว",
                                                     icon: "error",
                                                     button: "กรอกข้อมูลอีกครั้ง",
                                                    }
                                                  );
                        }if(res == 1){
                            swal( {
                                                     title: "เลือกข้อมูลสำเร็จ",
                                                     icon: "success",
                                                     button: "ตกลง",
                                                     });
                                                     document.getElementById(b).innerHTML = "เลือกเเล้ว";
                                                     document.getElementById(b).className = "btn btn-danger btn-block";
                                                     document.getElementById(b).readonly = true;
                        }
                        }
                });
          });
}  
</script>

<script>          
      function Addac(str){
         var a = str.value;
         var b = str.id;
          $(document).ready(function(){
                $.ajax({

                        url: 'Add_edit_AC.php',
                        type: 'POST',
                        data: {'id':a},
                        success:function(res){
                            alert(res);
                            if(res == 6){
                            swal( {
                                                     title: "อัพเดทข้อมูลไม่สำเร็จ",
                                                     text: "เกิดข้อผิดพลาดเกี่ยวกับฐานข้อมูล",
                                                     icon: "error",
                                                     button: "ตกลง",
                                                    }
                                                  );
                        }if(res == 1){
                            swal( {
                                                     title: "เพิ่มข้อมูลสำเร็จ",
                                                     icon: "success",
                                                     button: "ตกลง",
                                                     }).then (function(){ 
                                                    location.href = "Edit_AC.php?id=" +a;
                                                    }
                                                    );
                           
                            }
                        }
                });
          });
}  
</script>



<!-------------------Search Dynamic------------------------------->
<script>
$(document).ready(function()
{
        load_data();
                function load_data(query, query2)
                {
                        $.ajax(
                        {
                        url:"search_chooseAC_Edit.php",
                        method:"POST",
                        data:{query:query, query2},
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
                function load_data(query2, query)
                {
                        $.ajax(
                        {
                        url:"search_chooseAC_Edit.php",
                        method:"POST",
                        data:{query2:query2, query},
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
