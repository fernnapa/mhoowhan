
<?php 
ob_start();
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

    <?php include("menu/navbar_leader.php")  ?>
    
      <?php 
      include("../db_connect.php");

        $sqlListData = "SELECT * FROM `department`";
        
        $rsListData = mysqli_query($conn, $sqlListData);
        $check = 0;
        if(isset($_GET['address']))
        {
          $check = 1;
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
    <?php    }


        if(isset($_POST["search"]) && $_POST['address'] != "all" )
                {   
                      $address = $_POST["address"];      
                      // echo $address;

                      header('Location: index_unique.php?address='.$address); 
                
                }
        if($check == 0) {   //เมื่อเปิดหน้ามาครั้งเเรกยังไม่มีการเรียก search หรือ การรับค่า GET
                
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
                      <?php }

        
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
        height: 600px;  /* The height is 400 pixels */
        width: 100%;  /* The width is the width of the web page */
       }
</style>


<script>
          function initMap() {
            // The location of 
            var sut = {lat: 14.8803505, lng: 102.0156959};
            // The map, centered at Uluru
            var maps = new google.maps.Map(
                document.getElementById('map'), {zoom: 15, center: sut});
            // The marker, positioned at Uluru
                
            var marker, info;
                    $.getJSON("../jsondata.php", function(jsonObj){
                        $.each(jsonObj, function(i, item){

                            marker = new google.maps.Marker({
                                
                                position: new google.maps.LatLng(item.lat, item.lng),
                                map: maps,
                            });

                                info = new google.maps.InfoWindow();
                                google.maps.event.addListener(marker, 'click', (function(marker, i){
                                return function(){
                                    info.setContent(item.dep_name);
                                    info.open(maps,marker);
                                }
                                })(marker, i));
                            });
                        })
                    }


                


</script>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCXkgT4Hw83wzhkNsSJ05qL_dMkzX8EsuE&callback=initMap"
    async defer></script>

    </div>
  </div>


</body>
</html>

                


