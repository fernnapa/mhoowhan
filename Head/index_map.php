<?php  
session_start();
?>  
<!DOCTYPE html>
<html lang="en">

<head>
 
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Map</title>

    <?php include("menu/link.php")  ?>
</head>

<body>

    <?php include("menu/navbar_head.php")  ?>
    
      <?php 
        include("../db_connect.php");
        $sqlListData = "SELECT * FROM `department`";
        
        $rsListData = mysqli_query($conn, $sqlListData);


        if(isset($_POST["search"]) && $_POST["address"] != "all"){   //ถ้ามีการ search และมีค่าที่ไม่ใช่ "ทั้งหมด" ให้แสดงเฉพาะหมุดที่ค้นหา

          $address = $_POST["address"];          

          $strSQL = "SELECT * FROM department WHERE dep_id = $address"; 
          $rs = mysqli_query($conn, $strSQL);
          $infomation = $rs->fetch_assoc();       //เอาค่าไปแสดง description

          $objQuery = mysqli_query($conn, $strSQL);
          ?>
             <div align="center">
        
        <form action="index_map.php" method="post">
            <h3 align ="center" style="font-family:Prompt;">หน่วยงานที่มีการจัดสรรครุภัณฑ์คอมพิวเตอร์</h3><br/>
          <table align="center" border="0">
            <tr>
            <td>
            <select name="address" class="form-control" style="width:100%">
            <option selected value="<?php echo  $infomation["dep_id"]; ?>"><?php echo  $infomation["dep_name"]; ?></option>
              <option value="all">ทั้งหมด</option>
                <?php while($row = $rsListData->fetch_assoc()){ 
                  if($row["dep_name"] != $infomation["dep_name"]){?>

                  <option value="<?php echo $row["dep_id"]; ?>"> <?php echo $row["dep_name"]; ?> </option>
                  <?php } ?>
                <?php } ?>
            </select>                         
             </td>   
            <td><button class="btn btn-primary" type="submit" name="search" style="font-family:Prompt;">ค้นหา</button></td>
            </tr>
            </table>
        </form>

      </div>
      <br/>

      <div id="map"></div>     
      <div class="table-responsive" align="center" style="font-family:Prompt;">
        <br>
        <table border="0">
            <tr >
              <td style="text-align: right;"><b>รหัสหน่วยงาน : </b></td>
              <td><?php echo  $infomation["dep_no"]; ?><br/></td>
            </tr>
            <tr>
              <td style="text-align: right;"><b>ชื่อหน่วยงาน : </b></td>
              <td><?php echo  $infomation["dep_name"]; ?></td>
            </tr>
        </table>
        <br>
        <?php 
          $depid = $infomation["dep_no"];
          $dep = "SELECT * FROM `allocate_detail` 
          LEFT JOIN allocate ON allocate_detail.ac_id = allocate.ac_id 
          LEFT JOIN department ON allocate.ac_dep = department.dep_id
          WHERE `dep_no` = '$depid' ";
           $result = mysqli_query($conn, $dep);
           $num_rows = mysqli_num_rows($result);        
           if($num_rows>0)
           { ?>
            <table border="1" style="width:100%" class="table-bordered table-striped">
            <tr>
              <th colspan="5" bgcolor="#6495ED" ><font color="#FFFFFF" >&nbsp;ครุภัณฑ์จัดสรร</font></th>
            </tr>
            <tr>
            <th style="text-align: center;width:20%">Barcode</th>
            <th style="text-align: center;width:20%">Serial</th>
            <th style="text-align: center;width:20%">ประเภท</th>
            <th style="text-align: center;width:30%">ชื่อพนักงาน</th>

            </tr>
            <?php  while($data = mysqli_fetch_array($result))
            { ?>
            <tr>
            <td style="text-align: center;"><?php echo $data["ald_eq_barcode"]; ?></td>
            <td style="text-align: center;"><?php echo $data["ald_eq_serial"]; ?></td>
            <td style="text-align: center;"><?php echo $data["ald_type_name"]; ?></td>
            <td style="text-align: center;"><?php echo $data["ac_name"]; ?></td>

            </tr>
            <?php } ?>
            </table>
          
          <?php      
          }else
          { ?>
            <table border="1" style="width:100%" class="table-bordered table-striped">
            <tr>
              <th colspan="5" bgcolor="#6495ED" ><font color="#FFFFFF" >&nbsp;ครุภัณฑ์จัดสรร</font></th>
            </tr>
            <tr>
            <th style="text-align: center;width:20%">Barcode</th>
            <th style="text-align: center;width:20%">Serial</th>
            <th style="text-align: center;width:20%">ประเภท</th>
            <th style="text-align: center;width:30%">ชื่อพนักงาน</th>
            </tr>
            <tr>
            <td style="text-align: center;" colspan="5" ><font color="#FF3333"; size="2px;" ><b>หน่วยงานนี้ไม่มีรายการจัดสรรครุภัณฑ์</b></font></td>
            </tr>
            </table>
          <?php }


          $dep2 = "SELECT * FROM `permit_detail` 
          LEFT JOIN permit ON permit_detail.per_id = permit.pm_id 
          LEFT JOIN department ON permit.pm_dep = department.dep_id
          WHERE `dep_no` = '$depid' ";
           $result2 = mysqli_query($conn, $dep2);
           $num_rows2 = mysqli_num_rows($result2);        
           if($num_rows2 > 0)
           { ?>
           <br>
           
           <table border="1" style="width:100%" class="table-bordered table-striped">
            <tr>
            <th colspan="5" bgcolor="#6495ED" ><font color="#FFFFFF" >&nbsp;ครุภัณฑ์ยืมคืน</font></th>
            </tr>
            <tr>
            <th style="text-align: center;width:20%">Barcode</th>
            <th style="text-align: center;width:20%">Serial</th>
            <th style="text-align: center;width:20%">ประเภท</th>
            <th style="text-align: center;width:30%">ชื่อพนักงาน</th>

            </tr>
            <?php  while($data2 = mysqli_fetch_array($result2))
            { ?>
            <tr>
            <td style="text-align: center;"><?php echo $data2["pmd_eq_barcode"]; ?></td>
            <td style="text-align: center;"><?php echo $data2["pmd_eq_serial"]; ?></td>
            <td style="text-align: center;"><?php echo $data2["pmd_type_name"]; ?></td>
            <td style="text-align: center;"><?php echo $data2["pm_username"]; ?></td>

            </tr>
        
            <?php } 
             }else{?>
              <br>
              <table border="1" style="width:100%" class="table-bordered table-striped">
            <tr>
              <th colspan="5" bgcolor="#6495ED" ><font color="#FFFFFF" >&nbsp;ครุภัณฑ์ยืมคืน</font></th>
            </tr>
            <tr>
            <th style="text-align: center;width:20%">Barcode</th>
            <th style="text-align: center;width:20%">Serial</th>
            <th style="text-align: center;width:20%">ประเภท</th>
            <th style="text-align: center;width:30%">ชื่อพนักงาน</th>
            </tr>
            <tr>
            <td style="text-align: center;" colspan="5" ><font color="#FF3333"; size="2px;" ><b>หน่วยงานนี้ไม่มีรายการยืมครุภัณฑ์</b></font></td>
            </tr>
            </table>
             <?php } ?>
            </table>
          </div>
        <br/>

    <?php  }else if(isset($_POST["search"]) && $_POST["address"] == "all" || !isset($_POST["search"]) ){       //ถ้ามีการ search และมีค่า = "ทั้งหมด" ให้แสดงหมุดทั้งหมด

          $strSQL = "SELECT * FROM department"; ?>
           <div align="center">
        
        <form action="index_map.php" method="post">
            <h3 align ="center" style="font-family:Prompt;">หน่วยงานที่มีการจัดสรรครุภัณฑ์คอมพิวเตอร์</h3><br/>
            <table align="center" border="0">
            <tr>
            <td>
            <select name="address" class="form-control" style="width:100%">
              <option selected value="all">ทั้งหมด</option>
                <?php while($row = $rsListData->fetch_assoc()){ ?>

                  <option value="<?php echo $row["dep_id"]; ?>"> <?php echo $row["dep_name"]; ?> </option>

                <?php } ?>
            </select>                         
              </td>
            <td><button class="btn btn-primary" type="submit" name="search" style="font-family:Prompt;">ค้นหา</button></td>
            </tr>
            </table> 
        </form>

      </div>
      <br/>

      <div id="map"></div> 
     <br/>
    
    <?php  }else{                                                  

          $strSQL = "SELECT * FROM department";                  

      }

          $rs = mysqli_query($conn, $strSQL);
          $infomation = $rs->fetch_assoc();       //เอาค่าไปแสดง description

          $objQuery = mysqli_query($conn, $strSQL);

?>


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


    

<style>
       /* Set the size of the div element that contains the map */
      #map {
        height: 400px;  /* The height is 400 pixels */
        width: 100%;  /* The width is the width of the web page */
       }
</style>


<script>
function initMap() {
  // The location of 
  var sut = {lat: 14.8803505, lng: 102.0156959};
  // The map, centered at Uluru
  var map = new google.maps.Map(
      document.getElementById('map'), {zoom: 15, center: sut});
  // The marker, positioned at Uluru

    <?php while($row_dep = $objQuery->fetch_assoc()){ ?>  


            var marker = new google.maps.Marker({position: {lat: <?php echo $row_dep["lat"]; ?>, lng: <?php echo $row_dep["lng"]; ?>}, map: map});
              
     <?php } ?>  
 
}

</script>


    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCXkgT4Hw83wzhkNsSJ05qL_dMkzX8EsuE&callback=initMap"
    async defer></script>

    </div>
  </div>


</body>
</html>

                


