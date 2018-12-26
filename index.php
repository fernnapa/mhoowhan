<?php  
include ("header_user.php");
include ("slider.php");
 $connect = mysqli_connect("localhost", "root", "", "db_ccs");  
 $query ="SELECT * FROM allocate INNER JOIN status
 ON status.status_id = allocate.status_id
 ORDER BY allocate_id ASC"; 
 mysqli_query($connect, "SET NAMES 'utf8' "); 
 $result = mysqli_query($connect, $query);  
 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <link rel="icon" href="img/logo_ccs.png" type="image/png">
      <title>ระบบติดตามการใช้งานครุภัณฑ์ศูนย์คอมพิวเตอร์</title>
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>  
           <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>            
           <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />  
         
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
            
            
            <!--font-->
            <link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet">

            <style>
            body {
                    font-family: 'Kanit', sans-serif;
            }
            h1 {
                    font-family: 'Kanit', sans-serif;
            }
            </style>
      </head>  
      <body>  
           <br /><br />  
           <div class="container">  
                <h3 align="center">ระบบติดตามการใช้งานครุภัณฑ์คอมพิวเตอร์</h3>  
                <br />  
                <div class="table-responsive">  
                     <table id="com_data" class="table table-striped table-bordered">  
                          <thead>  
                               <tr>  
                                    <td>ลำดับที่</td>  
                                    <td>รายการ</td>  
                                    <td>ชื่อ</td>  
                                    <td>หน่วยงาน</td>  
                                    <td>สถานะ</td>  
                                    <td>action_ddddd</td> 
                               </tr>  
                          </thead>  
                          <?php  
                          while($row = mysqli_fetch_array($result))  
                          {  
                               echo '  
                               <tr>  
                                    <td>'.$row["allocate_id"].'</td>  
                                    <td>'.$row["a_title"].'</td>  
                                    <td>'.$row["a_name"].'</td>  
                                    <td>'.$row["depart_name"].'</td>
                                    <td>'.$row["status_name"].'</td>  
                                    <form class="form-inline" onsubmit="openModal()" id="myFormView"><td><button type="submit" id="detail" class="btn btn-primary btn-xs view_data" data-toggle="modal" data-target="#myModal" value="'.$row["allocate_id"].'" onclick="showDepartment(this.value)" form="myFormView"><i class="glyphicon glyphicon-file">&nbsp;</i>Detail</button></td> 
                               </tr>  
                               ';  
                          }  
                          ?>  
                     </table> 

                     <div class="modal fade" tabindex="-1" role="dialog" id="myModalView">
                            <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title">รายละเอียด</h4>
                            </div>
                                    <div class="modal-body">
                                            
                                            <table style="width:90%" align="center" id="txtHint">
                                                                                                    
                                             </table>
                                             
                </div>  
                <div class="modal-footer">
                         <button type="reset" class="btn btn-danger" data-dismiss="modal">ยกเลิก</button>
               </div>
               </div>       
               </div> 
           </div>  
      </body>  
 </html>


<script>  
 $(document).ready(function(){  
      $('#com_data').DataTable();  
 });  
</script> 

<script>
                    $('#myFormView').on('submit', function(e){
                    $('#myModalView').modal('show');
                    e.preventDefault();
                    });
            </script>
            
<!-- /.script edit -->   
<!-- /.script showmodal -->   

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
            xhttp.open("GET", "select.php?id="+str, true);
            xhttp.send();
            }
            </script>