<?php
include ('db_connect.php');

?>
<!DOCTYPE html>
<html>
    <head>
  
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php 
        include("link.php");
        ?>
       

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
    <title>รายการจัดสรรครุภัณฑ์</title>
        <body>
                <br>       
                    <div class="container w3-card-4 w3-round" style="width:80% " > 
                    <br>
                    <table border="0" align="center" style="width:100%;" class="w3-teal w3-round">
                    <tr>
                    <td><h3><b>รายการจัดสรรครุภัณฑ์</b></h3></a></button></td>
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
                       $sql = mysqli_query($conn, "SELECT * FROM allocate
                            LEFT JOIN a_status
                            ON allocate.ac_status = a_status.status_id
                            LEFT JOIN department
                            ON allocate.ac_dep = department.dep_id
                            WHERE ac_status = 7 ");
                       
                       while($data = mysqli_fetch_array($sql)):

                    ?>
                        <td style="text-align:left"><?php echo $data['ac_title']; ?></td>
                        <td style="text-align:left"><?php echo $data['ac_name']; ?></td>
                        <td style="text-align:left"><?php echo $data['dep_name']; ?></td>
                        <td style="text-align:left"><?php echo $data['ac_emp']; ?></td>
                        <td style="text-align:left"><?php echo $data['status_name']; ?></td>
                        <input type="hidden" name="id" value="<?php echo $data['ac_id']; ?>">

                        <td>
                        <form class="form-inline" onsubmit="openModal()" id="myFormEdit">
                        <button type="button" name="submit"  class="btn btn-success btn-block" data-toggle="modal" data-target="#myModalEdit" value="<?php echo $data['ac_id']; ?>" onclick="showAllocate <?php echo $data['ac_id']; ?>" form="myFormEdit">ดูรายการจัดสรร</button>
                        </td>

                        
                                

                    </tr>
                       <?php endwhile;?>
                </table>
                        
                            
                <div class="modal fade" tabindex="-1" role="dialog" id="myModalEdit">
                            <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title">รายละเอียด</h4>
                            </div>
                                    <div class="modal-body">
                                            
                                            <table style="width:90%" align="center" id="txtHint">
                                                                                                    
                                             </table>
                                             </form>
                </div>  
                <div class="modal-footer">
                         <button type="reset" class="btn btn-danger" data-dismiss="modal">ยกเลิก</button>
               </div>
               </div>       
                    
                   
                                         
                </div>  
           </div>  


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


                <!--  -->
                <script>
                    $('#myFormEdit').on('submit', function(e){
                    $('#myModalEdit').modal('show');
                    e.preventDefault();
                    });
            </script>

            <script>
            function showAlocate(str) {
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
            xhttp.open("GET", "select.php?id="+str, true);
            xhttp.send();
            }
            </script>

          





        </body>
</html>
