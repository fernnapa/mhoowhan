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

    <?php include("menu/navbar_emp.php")  ?>
    
      <?php 
      include("../Home/db_connect.php");

        $sqlListData = "SELECT * FROM `department`";
        
        $rsListData = mysqli_query($conn, $sqlListData);


                if(isset($_POST["search"]) && $_POST["address"] != "all"){   //ถ้ามีการ search และมีค่าที่ไม่ใช่ "ทั้งหมด" ให้แสดงเฉพาะหมุดที่ค้นหา

                    $address = $_POST["address"];           

                    $strSQL = "SELECT * FROM department WHERE dep_id = $address";
                

                }else if(isset($_POST["search"]) && $_POST["address"] == "all"){       //ถ้ามีการ search และมีค่า = "ทั้งหมด" ให้แสดงหมุดทั้งหมด

                    $strSQL = "SELECT * FROM department";
                
                }else{                                                  

                    $strSQL = "SELECT * FROM department";                  

                }

                    $rs = mysqli_query($conn, $strSQL);
                    $infomation = $rs->fetch_assoc();       //เอาค่าไปแสดง description

                    $objQuery = mysqli_query($conn, $strSQL);

      ?>

     
                  
                  <div align="center">
                  
                    <form action="index_map.php" method="post">
                        <h3 align ="center" style="font-family:Prompt;">หน่วยงานที่มีการจัดสรรครุภัณฑ์คอมพิวเตอร์</h3><br/>
                        <select name="address">

                          <option selected value="all">ทั้งหมด</option>
                            <?php while($row = $rsListData->fetch_assoc()){ ?>

                              <option value="<?php echo $row["dep_id"]; ?>"> <?php echo $row["dep_name"]; ?> </option>

                            <?php } ?>
                        </select>                         
                            
                        <button class="btn btn-primary" type="submit" name="search" style="font-family:Prompt;">ค้นหา</button>

                    </form>

                  </div>
                  <br/>
    
                  <div id="map"></div> 
                  <br/>
                
                  <div class="table-responsive" align="center" style="font-family:Prompt;">
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
                  </div>
                  <br/>


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

                


