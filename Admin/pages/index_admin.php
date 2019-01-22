<?php  
session_start();
include("../../Home/db_connect.php");

?>  

<!DOCTYPE html>
<html lang="en">
<head>
  
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>ข้อมูลเจ้าหน้าที่</title>
  <link href="https://fonts.googleapis.com/css?family=Kanit|Prompt" rel="stylesheet">
  <?php include("link.php"); ?>

<style>
.modal-dialog.a{
  max-width : 500px;
  max-height: 650px;
}
</style>
</head>

<body>
    <?php include("navbar.php"); ?>


<!------------------------------------------ /.modal detail------------------------------------------------------->

                  <h3 align="center" style="font-family:Prompt;">การจัดสรรการใช้งานครุภัณฑ์ของศูนย์คอมพิวเตอร์</h3>  
                	<br />  
                  <div class="table-responsive">  
                    		    <table id="allocate_data" align="center" class="table table-striped table-bordered">  
                          		<thead>  
                               	<tr>  
											            <th style="text-align: center; font-family:Prompt;">รหัสบาร์โคด</th>  
                                  <th style="text-align: center; font-family:Prompt;">รายการ</th>  
                                  <th style="text-align: center; font-family:Prompt;">ชื่อ</th>  
                                  <th style="text-align: center; font-family:Prompt;">สถานะ</th>  
                                  <th style="text-align: center; font-family:Prompt;"></th>  
                               	</tr>  
                         		  </thead>  
                              <?php  
                              $result =  mysqli_query( $conn, "SELECT * FROM `allocate` 
                              RIGHT JOIN allocate_detail
                              ON allocate_detail.ac_id = allocate.ac_id 
                              LEFT JOIN a_status
                              ON a_status.status_id = allocate.ac_status
                              LEFT JOIN department
                              ON department.dep_id = allocate.ac_dep");
                              while($row = mysqli_fetch_array($result)) 
                               
                          		{  
                               	echo '  
                               		<tr>  
											            <td style="text-align:left; font-family:Prompt;">'.$row["ald_eq_barcode"].'</td>  
                                  <td style="text-align:left; font-family:Prompt;">'.$row["ald_type_name"].'</td>  
							   				          <td style="text-align:left; font-family:Prompt;">'.$row["ac_name"].'</td>  
                                   <td style="text-align:left; font-family:Prompt;">'.$row["status_name"].'</td>   
                                   <td><button type="button" id="detail" class="btn btn-icons  btn-primary btn-md" data-toggle="modal" data-target="#myModalView" value="'.$row["ac_id"].'" onclick="showAllocate('.$row["ac_id"].')" form="myFormView"><i class="mdi mdi-file-document"></i></button> 
											            <button type="button" id="view" class="btn btn-icons  btn-success btn-md" data-toggle="modal" data-target="#myModalView" value="'.$row["ac_id"].'" onclick="showPic('.$row["ac_id"].')" form="myFormView"><i class="mdi mdi-image-area"></i></button> 
                                  </tr>  
                               	';  
                          		}  
                          		?>  
                    		    </table>  

                            <div class="modal fade" tabindex="-1" role="dialog" id="myModalView">
                         		  <div class="modal-dialog" role="document">
                            		<div class="modal-content">  
                                  <div class="card">
                                    <div class="card-body">
                              			<div class="modal-header">
                                      <h4 class="modal-title" style="font-family:Prompt;">รายละเอียด</h4>
                                			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>  	
                              			</div>
                              		  <div class="modal-body">          
                                   		<table style="width:100%" id="txtHint" class="table-responsive"></table>       
                              		  </div>  
                              		  <div class="modal-footer">
                                    	<button type="reset" class="btn btn-danger" data-dismiss="modal" style="font-family:Prompt;">ปิด</button>
                              		  </div>
           			                  </div>  
				                        </div>
                              </div>  
				                    </div>
                  </div>
<!------------------------------------------ /.modal detail------------------------------------------------------->
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
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="vendors/js/vendor.bundle.base.js"></script>
  <script src="vendors/js/vendor.bundle.addons.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/misc.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="js/dashboard.js"></script>
  <!-- End custom js for this page-->
</body>
</html>

<script>
        $(document).ready(function(){  
            $('#tableshow').DataTable({
            "searching": false
            });  
        }); 
</script>



<!--  read data  -->							  	
<script>  
 		$(document).ready(function(){  
      		$('#allocate_data').DataTable();  
 		});  
</script>  

<script>
        $('#myFormView').on('submit', function(e){
            $('#myModalView').modal('show');
            e.preventDefault();
        });
</script>
            

<!-- /.script show Detail -->   
<script>
        function showAllocate(str) {
        var xhttp;    
            if (str == "") {
                document.getElementById("txtHint").innerHTML = "";
                return;
            }
            xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function(){
                if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
                }
            };
            xhttp.open("GET", "getallocate.php?id="+str, true);
            xhttp.send();
        }
</script>	


<!-- /.script show View Pic -->   
<script>
        function showPic(str) {
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
            xhttp.open("GET", "../../Home/getPic.php?id="+str, true);
            xhttp.send();
        }
</script>	