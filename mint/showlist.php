<?php  
 include('connection.php');
 $query ="SELECT * FROM db_com 
 ORDER BY com_no DESC";  
 $result = mysqli_query($con, $query);  
 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
           
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>  
           <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>            
           <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
           
           <!-- bootstrap -->
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
           <br />
           <div class="container">  
                <h2 align ="center">รายการครุภัณฑ์คอมพิวเตอร์ </h2>
                <br />  
                <div class="table-responsive">  
                     <table id="com_data" class="table table-striped table-bordered">  
                          <thead>  
                               <tr align="center">  
                                    
                                    <td>Barcode</td>  
                                    <td>รายการ</td>  
                                    <td>SN Number</td> 
                                    <td>สถานะ</td>
                                    <td width ="15">action</td>
                                    <td width ="15"></td>
                                    <td width ="15"></td>
                                    
                               </tr>  
                          </thead>  
                          <?php  
                          while($row = mysqli_fetch_array($result))  
                          {  
                               echo '  
                               <tr>  
                                    <td>'.$row["barcode_id"].'</td>
                                    <td>'.$row["list_com"].'</td>  
                                    <td>'.$row["SN"].'</td>   
                                    <td>'.$row["Status_com"].'</td>
                                    <form class="form-inline" onsubmit="openModal()" id="myFormEdit">
                                    <td align="center"><button type="submit" id="detail"class="btn btn-info view_data" data-toggle="modal" data-target="#myModal" value="'.$row["com_no"].'" onclick="showDepartment(this.value)" form="myFormEdit"><i class="glyphicon glyphicon-pencil">&nbsp;</i>ดูรายละเอียด</button></td>';  
                                    
                                    if ($row["Status_com"] == "จัดสรรแล้ว"){

                                        echo"<td align='center'><a class='btn btn-danger' data-role='update'>จัดสรรแล้ว</a></button></td>";

                                    }else{
                                        echo"<td align='center'><a href='updatelist.php? com_no=$row[com_no]'< class='btn btn-success' data-role='update'>จัดสรร</a></button></td>";
                                    }
                                     
                                    if ($row["Status_com"] == "รอจัดสรร"){
                                        echo"<td align='center'><a class='btn btn-warning' data-role='update'>แก้ไข</a></button></td>";
                                   }else{
                                        echo"<td align='center'><a href='editlist.php? com_no=$row[com_no]'< class='btn btn-warning' data-role='update'>แก้ไข</a></button></td>";
                                   }
                        
                                echo  "</tr>";
                               
                          }  
                          ?>  
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
      </body>  
 </html>  
 <script>  
                    $(document).ready(function(){  
                    $('#com_data').DataTable();  
                    });  
 </script>  

<script>
                    $('#myFormEdit').on('submit', function(e){
                    $('#myModalEdit').modal('show');
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