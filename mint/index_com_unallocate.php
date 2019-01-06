<!DOCTYPE html>
<?php 
     include ("connection.php");
?>	
<html lang="en">
     <head>
          <meta charset="utf-8">
          <title>เพิ่มข้อมูลรอการจัดสรรครุภัณฑ์ศูนย์คอมพิวเตอร์</title>
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <meta name="description" content="Import Excel File To MySql Database Using php">

          <link rel="stylesheet" href="css/bootstrap.min-import.css">
          <link rel="stylesheet" href="css/bootstrap-responsive.min-import.css">
          <link rel="stylesheet" href="css/bootstrap-custom-import.css">
          
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
           <legend>เพิ่มข้อมูลรอการจัดสรรครุภัณฑ์ศูนย์คอมพิวเตอร์</legend>
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
	                    <th width="15%">Serial Number.</th>
                         <th>ประเภทครุภัณฑ์(TOR)</th>
	                    <th>สถานะ</th>	
                         <th> </th>				 
                      </tr>	
             </thead>
<?php
		
             $result_set =  mysqli_query( $con, "SELECT * FROM db_com ");
             while($row = mysqli_fetch_array($result_set))
             {
?>
			
                      <tr>
	<td><?php echo $row['com_no']; ?></td>
	<td><?php echo $row['barcode_id']; ?></td>
	<td><?php echo $row['list_com']; ?></td>
	<td><?php echo $row['SN']; ?></td>
     <td><?php echo $row['TOR']; ?></td>
	<td><?php echo $row['Status_com']; ?></td>
     <form class="form-inline" onsubmit="openModal()" id="myFormEdit">
     <td><button type="submit" id="detail"class="btn btn-warning view_data" data-toggle="modal" data-target="#myModal" value="<?php echo $row['com_no']; ?>" onclick="showDepartment(this.value)" form="myFormEdit">แก้ไข</button></td> 
                                    
     <!-- <td><?echo"<align='center'><a href='editcom_unallo.php? com_no=$row[com_no]'< class='btn btn-warning' data-role='update'>แก้ไข</a></button></td> -->

                      </tr>
<?php
             }
?>
           </table>
         </div>
       </div>

    </body>
</html>