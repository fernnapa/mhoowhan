<?php  
 include('connection.php');
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
                <h2 align ="center">รายการครุภัณฑ์คอมพิวเตอร์รอการอนุมัติ </h2>
                <br />  
                <div class="table-responsive">  
                     <table id="com_data" class="table table-striped table-bordered">  
                          <thead>  
                               <tr align="center">  
                                    
                                    <td>Barcode</td>  
                                    <td>รายการ</td>  
                                    <td>SN Number</td> 
                                    <td>สัญญาเช่า</td> 
                                    <td>สถานะ</td>
                                    <td width ="15">action</td>
                                    <td width ="15"></td>
                                    
                                    
                               </tr>  
                          </thead>  

                          
                          <?php  
                          
                          $query ="SELECT * FROM allocate 
                          LEFT JOIN equipment On allocate.ac_title = equipment.eq_tor
                          LEFT JOIN tor ON equipment.eq_tor = tor.tor_id
                          LEFT JOIN type_eq ON tor.tor_type = type_eq.type_id
                          LEFT JOIN contract ON tor.tor_contract = contract.con_id
                          LEFT JOIN a_status ON equipment.eq_status = a_status.status_id 
                          ORDER BY ac_id DESC";  
                          $result = mysqli_query($con, $query);  
                   
                          while($row = mysqli_fetch_array($result))  
                          {  

                              
                               echo '  
                               <tr>  
                                    
                                    <td>'.$row["ac_barcode"].'</td>
                                    <td>'.$row["type_name"].'</td>  
                                    <td>'.$row["ac_serial"].'</td>
                                    <td>'.$row["con_des"].' </td>
                                    <td>'.$row["status_name"].'</td>
                                    <form class="form-inline" onsubmit="openModal()" id="myFormEdit">
                                    <td align="center"><button type="submit" id="detail"class="btn btn-info btn - viewdata" data-toggle="modal" data-target="#myModalView" value="'.$row["ac_id"].'" onclick="showEquipment('.$row["ac_id"].')" form="myFormView"><i class="glyphicon glyphicon-pencil">&nbsp;</i>ดูรายละเอียด</button></td>';  
                                  
                                    echo"<td align='center'><a href='' class='btn btn-success' data-role='update'>รอการอนุมัติ</a></button></td>";
                                    
                                     
                                   
                        
                                echo  "</tr>";
                               
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
                    $('#myFormView').on('submit', function(e){
                    $('#myModalView').modal('show');
                    e.preventDefault();
                    });
            </script>
            
<!-- /.script edit -->   
<!-- /.script showmodal -->   

            <script>
            function showEquipment(str) {
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