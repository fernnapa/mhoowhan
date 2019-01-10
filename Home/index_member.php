<?php  
session_start();
?>  
<!DOCTYPE HTML>
<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>ระบบติดตามการใช้งานครุภัณฑ์ศูนย์คอมพิวเตอร์</title>
	<link rel="icon" href="images/favicon.png" type="image/png">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<meta name="author" content="" />
	      <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>  
           <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>            
           <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
           
           <!-- bootstrap -->
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<?php
		include("index_link.php");
	?>
	</head>
	
	<?php
		include("navbar_member.php");
	?>
	<?php
		include("db_connect.php");
	?>
	<body>
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
                                    <td width ="15"></td>
                                    
                               </tr>  
                          </thead>  
                          <?php  
                          $query ="SELECT * FROM equipment 
                          LEFT JOIN tor ON equipment.eq_tor = tor.tor_id
                          LEFT JOIN type_eq ON tor.tor_type = type_eq.type_id
                          LEFT JOIN contract ON tor.tor_contract = contract.con_id
                          LEFT JOIN a_status ON equipment.eq_status = a_status.status_id 
                          ORDER BY eq_id DESC";  
                          $result = mysqli_query($conn, $query);  
                   
                          while($row = mysqli_fetch_array($result))  
                          {  

                              
                               echo '  
                               <tr>  
                                    
                                    <td>'.$row["eq_barcode"].'</td>
                                    <td>'.$row["type_name"].'</td>  
                                    <td>'.$row["eq_serial"].'</td>
                                    <td>'.$row["con_des"].' </td>
                                    <td>'.$row["status_name"].'</td>
                                    <form class="form-inline" onsubmit="openModal()" id="myFormEdit">
                                    <td align="center"><button type="submit" id="detail"class="btn btn-info btn - viewdata" data-toggle="modal" data-target="#myModalView" value="'.$row["eq_id"].'" onclick="showEquipment('.$row["eq_id"].')" form="myFormView"><i class="glyphicon glyphicon-pencil">&nbsp;</i>ดูรายละเอียด</button></td>';  
                                    
                                    if ($row["status_name"] == "จัดสรร"){

                                        echo"<td align='center'><a class='btn btn-danger' data-role='update'>จัดสรรแล้ว</a></button></td>";

                                    }else{
                                        echo"<td align='center'><a href='updatelist.php? eq_id=$row[eq_id]'< class='btn btn-success' data-role='update'>จัดสรร</a></button></td>";
                                    }
                                     
                                    if ($row["status_name"] == "รอจัดสรร"){
                                        echo"<td align='center'><a class='btn btn-warning' data-role='update'>แก้ไข</a></button></td>";
                                   }else{
                                        echo"<td align='center'><a href='editlist.php? eq_id=$row[eq_id]'< class='btn btn-warning' data-role='update'>แก้ไข</a></button></td>";
                                   }
                        
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





















	<?php
		include("footer.php");
	?>
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
            xhttp.open("GET", "../mint/select.php?id="+str, true);
            xhttp.send();
            }
            </script>
