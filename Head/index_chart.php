<?php  
session_start();
?>  
<!DOCTYPE html>
<html lang="en">
<?php  
include("../db_connect.php");


                        if(isset($_POST["search"])){

                            $start = $_POST["start"];
                            $end = $_POST["end"];


                            $sql_range = $_POST["search"];


               
                        
                        $sql_range = "SELECT ac_date, ac_dep, department.dep_name, count(ac_id) as total 
                        FROM allocate 
                        INNER JOIN department ON department.dep_id = allocate.ac_dep 
                        INNER JOIN a_status ON allocate.ac_status = a_status.status_id
                        WHERE a_status.status_id in(2) AND ac_date BETWEEN '$start' AND '$end' 
                        GROUP BY department.dep_name ORDER BY `ac_id` DESC";
                        
                        $sql_range2 ="SELECT pm_date_analys, pm_dep, department.dep_name, count(pm_id) as total 
                        FROM permit
                        INNER JOIN department ON department.dep_id = permit.pm_dep 
                        INNER JOIN a_status ON permit.pm_status = a_status.status_id
                        WHERE a_status.status_id in(3) AND pm_date_analys BETWEEN '$start' AND '$end' 
                        GROUP BY department.dep_name ORDER BY `pm_id` DESC";                        
                        
                        $rs_range = $conn->query($sql_range);
                        $rs_range2 = $conn->query($sql_range2);


                        }




                      
                
                        //echo  $sql_range;

                        
?>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>รายงาน</title>
  <link href="https://fonts.googleapis.com/css?family=Kanit|Prompt" rel="stylesheet">
  <?php include("menu/link.php"); ?>
  <style>
            .table-responsive {
              
              overflow-x: auto;
              overflow-y: hidden;
            }
            table, th, td    {
            }
            td {
                padding: 5px;
                text-align: center;    
            }
            th {
                padding: 5px;
            }
            body{
                font-family: 'Kanit', sans-serif;
            }
            .search-table-outter { overflow-x: scroll; }
         
    </style>
</head>

<body>

    <?php include("menu/navbar_head.php")  ?>

                             <?php
                                  include("../db_connect.php");
                                  
                                  $sql = "SELECT COUNT(eq_id) as total1 FROM `equipment`";
                                  $result = mysqli_query($conn, $sql);
                                  while($eq = mysqli_fetch_array($result)){
                                    $eq1= $eq["total1"];
                                  }  

                                  $sql2 = "SELECT COUNT(ac_id) as total2 FROM `allocate` WHERE ac_status = 2";
                                  $result2 = mysqli_query($conn, $sql2);
                                  while($allocate = mysqli_fetch_array($result2)){
                                    $ac = $allocate["total2"];
                                  } 

                                  $sql3 = "SELECT COUNT(pm_id) as total3 FROM `permit` WHERE pm_status = 3";
                                  $result3 = mysqli_query($conn, $sql3);
                                  while($permit = mysqli_fetch_array($result3)){
                                    $pm = $permit["total3"];
                                  } 

                                  $sql4 = "SELECT COUNT(dep_id) as total4 FROM `department`";
                                  $result4 = mysqli_query($conn, $sql4);
                                  while($depart = mysqli_fetch_array($result4)){
                                    $dp = $depart["total4"];
                                  } 

                                

                                  
                              ?>


    <div class="row" style="font-family:Prompt;">
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
              <div class="card card-statistics">
                <div class="card-body">
                  <div class="clearfix">
                    <div class="float-left">
                      <i class="mdi mdi-cellphone-link text-danger icon-lg"></i>
                    </div>
                    <div class="float-right">
                      <p class="mb-0 text-right" style="font-family:Prompt;">จำนวนครุภัณฑ์ทั้งหมด</p>
                      <div class="fluid-container">
                        <h3 class="font-weight-medium text-right mb-0">
                              <?php echo $eq1; ?>
                        </h3>
                      </div>
                    </div>
                  </div>
                  <p class="text-muted mt-3 mb-0">
                    <i class="mdi mdi-alert-octagon mr-1" aria-hidden="true"></i> ครุภัณฑ์คอมพิวเตอร์
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
              <div class="card card-statistics">
                <div class="card-body">
                  <div class="clearfix">
                    <div class="float-left">
                      <i class="mdi mdi-receipt text-warning icon-lg"></i>
                    </div>
                    <div class="float-right">
                      <p class="mb-0 text-right" style="font-family:Prompt;">รายการจัดสรรทั้งหมด</p>
                      <div class="fluid-container">
                        <h3 class="font-weight-medium text-right mb-0"> 
                        <?php echo $ac; ?>
                        </h3>
                      </div>
                    </div>
                  </div>
                  <p class="text-muted mt-3 mb-0">
                    <i class="mdi mdi-bookmark-outline mr-1" aria-hidden="true"></i> การจัดสรรให้กับเจ้าหน้าที่
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
              <div class="card card-statistics">
                <div class="card-body">
                  <div class="clearfix">
                    <div class="float-left">
                      <i class="mdi  mdi-rotate-3d text-success icon-lg"></i>
                    </div>
                    <div class="float-right">
                      <p class="mb-0 text-right" style="font-family:Prompt;">รายการยืม-คืนทั้งหมด</p>
                      <div class="fluid-container">
                        <h3 class="font-weight-medium text-right mb-0">
                        <?php echo $pm; ?>
                        </h3>
                      </div>
                    </div>
                  </div>
                  <p class="text-muted mt-3 mb-0">
                    <i class="mdi mdi-calendar mr-1" aria-hidden="true"></i> การยืม-คืนให้กับเจ้าหน้าที่
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
              <div class="card card-statistics">
                <div class="card-body">
                  <div class="clearfix">
                    <div class="float-left">
                      <i class="mdi mdi-home-variant text-info icon-lg"></i>
                    </div>
                    <div class="float-right">
                      <p class="mb-0 text-right" style="font-family:Prompt;">หน่วยงานทั้งหมด</p>
                      <div class="fluid-container">
                        <h3 class="font-weight-medium text-right mb-0">
                        <?php echo $dp; ?>
                        </h3>
                      </div>
                    </div>
                  </div>
                  <p class="text-muted mt-3 mb-0">
                    <i class="mdi mdi-reload mr-1" aria-hidden="true"></i> หน่วยงานในมหาวิทยาลัยเทคโนโลยีสุรนารี
                  </p>
                </div>
              </div>
            </div>
          </div>


        <div class="card">
        <div class="card-body">
        <div class="fluid-container table-responsive">
          <table align="center" style="width:100%" class="w3-teal">
          <tr>
            <th ><p><h3 style="text-align:center; font-family:Prompt;"><b>สถิติการจัดสรรครุภัณฑ์ให้กับหน่วยงาน</b></h3></th>
            <form action="index_chart.php" method="POST">
                                <table border="0" align="center">
                                <tr>
                                    <br><td style="font-family:Prompt;"><b>วันที่จัดสรร</b> </td>
                                    <td>
                                    <select name="start" class="form-control" style="width:200px"> 
                    <!--DISTINCT เป็นคำสั่งที่ใช้สำหรับการระบุเงื่อนไขการเลือกข้อมูลในตารางTableโดยทำการเลือกข้อมูลที่ซ้ำกันมาเพียงแค่Recordเดียว/ASCเรียงจากน้อยไปหามาก -->
                                
                                    <?php 
                                        $sql_date_start = "SELECT distinct(ac_date) FROM `allocate` order by ac_date asc";
                                        $rs_date_start = mysqli_query($conn, $sql_date_start);
                                    ?>

                                    <?php while($row_date_start = $rs_date_start->fetch_assoc()){ ?>
                                        <option value="<?php echo $row_date_start["ac_date"]; ?>"><?php echo $row_date_start["ac_date"]; ?></option>
                                    <?php } ?>   
                                    </select>
                                    </td>


                                <td style="font-family:Prompt;"><b>ถึง</b></td>

                            <!--DISTINCT เป็นคำสั่งที่ใช้สำหรับการระบุเงื่อนไขการเลือกข้อมูลในตารางTableโดยทำการเลือกข้อมูลที่ซ้ำกันมาเพียงแค่Recordเดียว/DESCเรียงจากมากไปหาน้อย -->
                                <td>
                                <select name="end" class="form-control" style="width:200px">
                                <?php 
                                    $sql_date_end = "SELECT distinct(ac_date) FROM `allocate` order by ac_date desc";

                                    $rs_date_end = $conn->query($sql_date_end);
                                ?>

                                <?php while($row_date_end = $rs_date_end->fetch_assoc()){ ?>
                                
                                <option value="<?php echo $row_date_end["ac_date"]; ?>"><?php echo $row_date_end["ac_date"]; ?></option>

                                <?php } ?>   
                                </select>
                                </td>

                                <td> <input type="submit" name="search" value="ค้นหา" class="btn btn-info" style="font-family:Prompt;">  </td>       
                                </tr>
                                </table>
                                </form>
                                <hr/>
                                <p style="text-align: left; font-family:Prompt; font-size: 15px; ">&emsp;&emsp;&emsp;&emsp;&emsp;วันที่จัดสรร&emsp;<?php echo @$start."    ถึง     ".@$end ?></p>


                                <div align="center">
                                <div id="columnchart_material" style="width: 65%; height: 450px;" class="table responsive"></div>
                                </div>
        
                            </tr>
                    </table>


              
       
                                <hr/>
                                <p style="text-align: left; font-family:Prompt; font-size: 15px; ">&emsp;&emsp;&emsp;&emsp;&emsp;วันที่ยืม-คืน&emsp;<?php echo @$start."    ถึง     ".@$end ?></p>

                                
                                <div align="center">
                                <div id="columnchart_material2" style="width: 65%; height: 450px;" ></div>
                                </div>
                                <br/><hr/>
               
        
                
                                <div align="left">
                                <h3 style="text-align: center; font-family:Prompt;">การจัดสรรครุภัณฑ์แต่ละประเภท</h3><br/>
                                    <div id="dual_x_div" style="width: 200px; height: 150px; font-family:Prompt;"></div>
                                </div><br/><br/><hr/>
                                <div align="left">
                                <h3 style="text-align: center; font-family:Prompt;">การยืม-คืนครุภัณฑ์แต่ละประเภท</h3><br/>
                                    <div id="duall_x_div" style="width: 200px; height: 150px; font-family:Prompt;"></div>
                              </div>
                              
                    </tr>
                </table>
               
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


  
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawStuff);

      function drawStuff() {
        var data = new google.visualization.arrayToDataTable([
          ['ประเภท', 'จำนวน'],  
                        <?php  
                              $sql_r3 = "SELECT ald_type_name, ald_status_name ,a_status.status_name, count(ald_type_name) as number FROM `allocate_detail` 
                              INNER JOIN allocate ON allocate.ac_id = allocate_detail.ac_id 
                              INNER JOIN a_status ON a_status.status_id = allocate.ac_status 
                              WHERE allocate.ac_status in(2) 
                              GROUP by ald_type_name"; 
                                $rs_r3 = $conn->query($sql_r3);

                          while($row = mysqli_fetch_array($rs_r3))  
                          {  
                               echo "['".$row["ald_type_name"]."', ".$row["number"]."],";   // แสดงผลข้อมูลด้านข้าง
                          }  
                        ?>  
        ]);

        var options = {
          width: 800,
          colors:['#F7DC6F'],
          
          bars: 'horizontal', // Required for Material Bar Charts.
          series: {
            0: { axis: 'distance' }, // Bind series 0 to an axis named 'distance'.
            1: { axis: 'brightness' } // Bind series 1 to an axis named 'brightness'.
          },
          axes: {
            x: {
              distance: {label: 'จำนวน'}, // Bottom x-axis.
              brightness: {side: 'top', label: 'apparent magnitude'} // Top x-axis.
            }
          }
        };

      var chart = new google.charts.Bar(document.getElementById('dual_x_div'));
      chart.draw(data, options);
    };
    </script>


	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawStuff);

      function drawStuff() {
        var data = new google.visualization.arrayToDataTable([
          ['ประเภท', 'จำนวน'],  
                        <?php 
                     
  
                          $sql_r4 = "SELECT pmd_type_name, pmd_status_name, a_status.status_name, count(pmd_type_name) as number FROM `permit_detail` 
                          INNER JOIN permit ON permit.pm_id = permit_detail.per_id 
                          INNER JOIN a_status ON a_status.status_id = permit.pm_status 
                          WHERE permit.pm_status in(3) 
                          GROUP by pmd_type_name";
                          
                          
                          $rs_r4 = $conn->query($sql_r4);
     
                          while($row2 = mysqli_fetch_array($rs_r4))  
                          {  
                               echo "['".$row2["pmd_type_name"]."', ".$row2["number"]."],";   // แสดงผลข้อมูลด้านข้าง
                          }  
                        ?>  
        ]);

        var options = {
          width: 800,
          colors:['#F5B7B1'],
          bars: 'horizontal', // Required for Material Bar Charts.
          series: {
            0: { axis: 'distance' }, // Bind series 0 to an axis named 'distance'.
            1: { axis: 'brightness' } // Bind series 1 to an axis named 'brightness'.
          },
          axes: {
            x: {
              distance: {label: 'จำนวน'}, // Bottom x-axis.
              brightness: {side: 'top', label: 'apparent magnitude'} // Top x-axis.
            }
          }
        };

      var chart = new google.charts.Bar(document.getElementById('duall_x_div'));
      chart.draw(data, options);
    };
    </script>


    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
    google.charts.load('current', {'packages':['bar']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ['หน่วยงาน', 'จำนวน'],

      <?php while( $row = $rs_range->fetch_assoc()){ ?> 

        ['<?php echo $row["dep_name"];?>', <?php echo $row["total"]; ?>],
    
      <?php } ?>  
      ]);

      var options = {
        chart: {
          title: 'แผนภูมิการจัดสรรครุภัณฑ์คอมพิวเตอร์ให้กับแต่ละหน่วยงาน',
        }
       
      };

      var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

      chart.draw(data, google.charts.Bar.convertOptions(options));
    }
  </script>

  </body>
</html>







  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
    google.charts.load('current', {'packages':['bar']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ['หน่วยงาน', 'จำนวน'],

      <?php while( $row = $rs_range2->fetch_assoc()){ ?> 

        ['<?php echo $row["dep_name"];?>', <?php echo $row["total"]; ?>],
    
      <?php } ?>  
      ]);

      var options = {
        chart: {
          title: 'แผนภูมิการยืม-คืนครุภัณฑ์คอมพิวเตอร์ให้กับแต่ละหน่วยงาน',
        }
  
      };

      var chart = new google.charts.Bar(document.getElementById('columnchart_material2'));

      chart.draw(data, google.charts.Bar.convertOptions(options));
    }
  </script>



 


	

