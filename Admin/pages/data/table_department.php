   
        <!-- /.modal edit-->
        <div class="modal fade" tabindex="-1" role="dialog" id="myModal2">
            <div class="modal-dialog" role="document" style="width:50%">
                <div class="modal-content">
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
                            <th colspan="7"><h4 style="text-align:center;"><b>ค้นหาข้อมูลหน่วยงาน</b></h4></th>
                        </tr>
                        <tr>
                        <form class="form-inline" onsubmit="openModal()" id="myForm">
                        <th colspan="6"><input type="text" style="width:100%;" size="50" name="search_text" id="search_text" class="form-control" placeholder="ระบุคำค้นหา"></th>
                        </form>                        
                        </tr>
                    </table>
                    <br>
            </div>
            <br>
            <!-- <div class="container w3-card-2 w3-round-large" style="width:70% " >           -->
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
                        <td style="text-align: center;"></td>
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
                        <td style="text-align:left"><?php echo $data['lat']; ?></td>
                        <td style="text-align:left"><?php echo $data['lng']; ?></td>
                        <td><button type="button" class="btn btn-warning btn-block" data-toggle="modal" onclick="showDepartment(<?php echo $data['dep_id']; ?>)" data-target="#myModal2">เเก้ไข</button></td></form>
                        <td><span  class="btn btn-danger btn-block" form="form3"  onclick="remove(<?php echo $data['dep_id']; ?>)">ลบ</span></td>                    
                    </tr>
                       <?php endwhile;?>
                    </table>
                </form>
            </div>
            <!-- </div> -->
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
            xhttp.open("GET", "get_department.php?id="+str, true);
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
                        url:"data/search_dep.php",
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