<!DOCTYPE html>
<?php 
     include ("connection.php");
?>	
<html lang="en">
     <head>
          <meta charset="utf-8">
          <title>เพิ่มข้อมูลการจัดสรรครุภัณฑ์ศูนย์คอมพิวเตอร์</title>
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <meta name="description" content="Import Excel File To MySql Database Using php">

          <link rel="stylesheet" href="css/bootstrap.min-import.css">
          <link rel="stylesheet" href="css/bootstrap-responsive.min-import.css">
          <link rel="stylesheet" href="css/bootstrap-custom-import.css">


</head>
<body>    

	<!-- Navbar
    ================================================== -->

<div class="navbar navbar-inverse navbar-fixed-top" >
      <div class="navbar-inner">
             <div class="container"> 
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    </a>
             </div>
       </div>
</div>
<div id="wrap">
          <div class="container">
                  <div class="row">
                        <div class="span3 hidden-phone"></div>
                             <div class="span6" id="form-login">
          <form class="form-horizontal well" action="import_unallocate.php" method="post" name="upload_csv" enctype="multipart/form-data">
      <fieldset>
           <legend>เพิ่มไฟล์ข้อมูลประเภท CSV</legend>
<div class="control-group">
         <div class="control-label">
              <label>ไฟล์ข้อมูล CSV :</label>
         </div>
              <div class="controls">
              <input type="file" name="file" id="file" class="input-large">
              </div>
         </div>
         <div class="control-group">
              <div class="controls">
              <button type="submit" id="submit" name="Import" class="btn btn-primary button-loading" data-loading-text="Loading...">Upload</button>
							
              </div>
         </div>
         </fieldset>
         </form>
        </div>
              <div class="span3 hidden-phone"></div>
         </div>
		

          <table class="table table-bordered" >
             <thead>
                      <tr>
	
	<th>Bar Code</th>
	<th>รายการ</th>
	<th>Serial Number.</th>
	<th width="15%">สถานะ</th>				 
                      </tr>	
             </thead>
<?php
		
             $result_set =  mysqli_query( $con, "SELECT * FROM equipment 
                                        LEFT JOIN tor ON equipment.eq_tor = tor.tor_id
                                        LEFT JOIN type_eq ON tor.tor_type = type_eq.type_id
                                        LEFT JOIN a_status ON equipment.eq_status = a_status.status_id ");
             while($row = mysqli_fetch_array($result_set))
             {
?>
			
                      <tr>
	                    
	                    <td><?php echo $row['eq_barcode']; ?></td>
	                    <td><?php echo $row['type_name']; ?></td>
	                    <td><?php echo $row['eq_serial']; ?></td>
	                    <td><?php echo $row['status_name']; ?></td>
                      </tr>
<?php
             }
?>
           </table>
         </div>
       </div>

    </body>
</html>