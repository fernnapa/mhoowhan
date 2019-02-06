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
                max-width : 1020px;
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
        <div class="card">
        <div class="card-body">
<!-- Modal ดูข้อมูลPM -->



                
                <div class="container" > 
                    <table border="0" align="center" style="width:100%;" class="w3-teal">
                    <tr>
                    <td><p><h3 style="font-family:Prompt;"><b>รายการจัดสรรครุภัณฑ์ทั้งหมด</b></h3></a></button></td>
                    </tr>
                    </table>

                    <table border="0" align="right"  >
                    <tr>
                    <td>เลือกจาก</td>
                    <td><select name="search_text" id="search_text" style="width: 100%; font-family:Prompt; font-size: 15px;" class="form-control">
                                                            <option value="ทั้งหมด">สถานะทั้งหมด</option>
                                            <?php
                                                    $type = "SELECT * FROM a_status WHERE status_id = 2  OR status_id = 6 OR status_id = 7 OR status_id = 8 OR status_id = 10 OR status_id = 11  ORDER BY status_id";
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
                    
                </div>
                     
                </div>
              </div>
            </div>
          </div>
        </div>
        <footer class="footer">
          <div class="container-fluid clearfix">
          <span class="copytext">Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | <a href="http://ccs.sut.ac.th/2012/" target="_blank">The Center for Computer Services. SUT</a></span>
          </div>
        </footer>
      </div>
    </div>
  </div>
  </div>
  </div>


  <div class="modal fade" tabindex="-1" role="dialog" id="ModalViewAC">
                            <div class="modal-dialog a" role="document">
                            <div class="modal-content">
                            <div class="card">
                            <div class="card-body">
                            <div class="modal-header">
                            <h4 style="font-family:Prompt;" class="modal-title"><b>รายการจัดสรรครุภัณฑ์</b></h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            </div>
                                    <div class="modal-body table-responsive">
                                            <form id="ViewAC" >
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                          <button type="reset" class="btn btn-danger" data-dismiss="modal" style="font-family:Prompt;">ปิด</button>
                                        </div>

                            </div>
                            </div>
                            </div>
                            </div>
                            </div>


<!-- /.data -->
<!-- /.script modal add -->
<script>
$(document).ready(function(){  
        $('#tableshow').DataTable({
        "searching": true,

        "oLanguage": {
        "sSearch": "ค้นหา : "
        },
        retrieve: true,
});  
 }); 
</script>



<script>
            function showData(str) {
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
            xhttp.open("GET", "get_index_All_AC.php?id="+str, true);
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
