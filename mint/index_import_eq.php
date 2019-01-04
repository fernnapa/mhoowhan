<!DOCTYPE html>
<?php 
     include ("connection.php");
?>	
<html lang="en">
     <head>
          <meta charset="utf-8">
          <title>เพิ่มข้อมูลครุภัณฑ์ศูนย์คอมพิวเตอร์</title>
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <meta name="description" content="Import Excel File To MySql Database Using php">

          <link rel="stylesheet" href="css/bootstrap.min.css">
          <link rel="stylesheet" href="css/bootstrap-responsive.min.css">
          <link rel="stylesheet" href="css/bootstrap-custom.css">


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
          <form class="form-horizontal well" action="import_com_eq.php" method="post" name="upload_csv" enctype="multipart/form-data">
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
	<th width="10%">ลำดับที่</th>
	<th>Bar Code</th>
	<th>รายการ</th>
	<th>ชื่อผู้เช่ายืม</th>
	<th>หน่วยงาน</th>	
	<th width="15%">Serial Number.</th>				 
                      </tr>	
             </thead>
<?php
		
             $result_set =  mysqli_query( $conn, "SELECT * FROM com_eq ");
             while($row = mysqli_fetch_array($result_set))
             {
?>
			
                      <tr>
	<td><?php echo $row['com_id']; ?></td>
	<td><?php echo $row['bar_id']; ?></td>
	<td><?php echo $row['com_list']; ?></td>
	<td><?php echo $row['emp_name']; ?></td>
	<td><?php echo $row['ins_name']; ?></td>
	<td><?php echo $row['com_SN']; ?></td>

                      </tr>
<?php
             }
?>
           </table>
         </div>
       </div>

    </body>
</html>