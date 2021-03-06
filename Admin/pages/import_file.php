<?php  
session_start();
include("../../db_connect.php");
?>  
<!DOCTYPE html>
<html lang="en">

<head>
 
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>อัพโหลดข้อมูล</title>

           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>  
           <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>            
           <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />

           <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <?php include("link.php")  ?>
</head>

<body>

    <?php include("navbar.php")  ?>

    <div class="card">
      <div class="card-body">
    <table align="center" style="width:100%; font-family:Prompt;" border="0" class="w3-teal ">
        <tr>
            <th><p><h3 style="text-align:center; font-family:Prompt;" class="w3-teal"><b>เพิ่มไฟล์ข้อมูลประเภท CSV</b></h3></th>
                </tr>
        </table>
        <br>
    <table  align="center" style="width:55%; font-family:Prompt;" border="1" class="table-bordered">
      
        <form class="form-horizontal well" action="import_unallocate.php" method="post" name="upload_csv" enctype="multipart/form-data">
        <tr>            
            <th style="font-weight: normal; text-align:right; font-size: 14px" width="50%"><b>ไฟล์ข้อมูล CSV :</b></th>
            
            <th align="center" style="font-weight: normal; font-size: 14px;">
                <input type="file" name="file" id="file" class="input-large" required>
            </th>       
        </tr> 
    
        <tr>
            <th style="font-weight: normal; text-align:right; font-size: 14px" width="50%"><b> วันที่นำเข้า : </b> </th>
            <th style="font-weight: normal; text-align:left; font-size: 14px" width="30%"><input type="text" style="text-align:center;" name="date"  id="date" value="<?=date('Y-m-d')?> "readonly class="form-control"/></th>
           </th>
        </tr>
        <tr>
            <th style="font-weight: normal; text-align:right; font-size: 14px" width="30%"><b> รหัสพนักงานนำเข้า : </b></th>
            <th style="font-weight: normal; text-align:left; font-size: 14px" width="30%"><input type="text" style="text-align:center;" name="empno"  id="empno" value="<?php echo $_SESSION["emp_id"]?> "readonly class="form-control"/></th>
        </tr>
    
        <tr>
            <th colspan="7" style="text-align:center"> 
                <button type="submit"  id="submit" name="Import" class="btn btn-primary button-loading" data-loading-text="Loading...">Upload</button>				          
            </th>
        </tr>
        </form>                            
    </table>
    <br/>
    </div>
    

   
    <div class="container">
        <div class="table-responsive" style="font-family:Prompt;"> 
            <table id="eq_data" class="table table-hover table table-striped table-bordered">
                            <thead>
                                <tr>
	
	                                <th style="text-align:center; font-family:Prompt; font-weight: bold; width='250px">Bar Code</th>
	                                <th style="text-align:center; font-family:Prompt; font-weight: bold; width='250px">รายการ</th>
	                                <th style="text-align:center; font-family:Prompt; font-weight: bold; width='250px">Serial Number.</th>
                                    <th style="text-align:center; font-family:Prompt; font-weight: bold; width='250px">TOR</th>			 
                      
                                </tr>	
                            </thead>
                        
                                <?php		
                                $result_set =  mysqli_query( $conn, "SELECT * FROM equipment 
                                        LEFT JOIN tor ON equipment.eq_tor = tor.tor_id
                                        LEFT JOIN type_eq ON tor.tor_type = type_eq.type_id
                                        LEFT JOIN a_status ON equipment.eq_status = a_status.status_id ");
                                while($row = mysqli_fetch_array($result_set))
                                { 
            
                               echo '  
                               <tr>  
                                    <td style="text-align:center; font-family:Prompt;">'.$row["eq_barcode"].'</td>  
                                    <td style="text-align:center; font-family:Prompt;">'.$row["type_name"].'</td>  
                                    <td style="text-align:center; font-family:Prompt;">'.$row["eq_serial"].'</td>    
                                    <td style="text-align:center; font-family:Prompt;">'.$row["tor_des"].'</td>    

                                </tr>  
                               ';  
                                }  
                                ?>

            </table>
            <br>
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
</body>
</html>


<script>
$(document).ready(function(){  
        $('#eq_data').DataTable({
        "searching": true,
        "language": {
            "lengthMenu": "ข้อมูลเเสดง _MENU_ ต่อหน้า",
            "info": " _PAGE_ หน้าจาก _PAGES_",
            "sSearch": "ค้นหา"

        },
  
      retrieve: true,

      
});  
 }); 
</script>