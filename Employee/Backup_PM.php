<?php
include("../db_connect.php");
include("datatable_all.php");
session_start();
$_SESSION['chooseEq'] = array();

//   if ((time() - $_SESSION['timeout']) > 60 ) {
//      header('Location: http://www.google.com/');

//   } else {
//   }


// if(time() - $_SESSION['timeout'] > 60) { //subtract new timestamp from the old one
//     unset($_SESSION['username'], $_SESSION['password'], $_SESSION['timestamp']);
//     $_SESSION['logged_in'] = false;
//     header("Location: kuy.php"); //redirect to index.php
//     exit;
// } else {
//     $_SESSION['timestamp'] = time(); //set new timestamp
// }
?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php include("menu/link.php"); ?>

    <style>
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
            .w3-theme-l2 {color:#fff !important;background-color:#78acce !important}
         
    </style>
    </head>
    <?php include("menu/navbar_emp.php"); ?>
    <title>ประวัติยืม-คืนครุภัณฑ์</title>
        <body>
        <div class="card">
            <div class="card-body">
              
                    <div class="container"> 
                    <table border="0" align="center" style="width:100%;" class="w3-teal">
                    <tr>
                    <td><p><h3 style="font-family:Prompt;"><b>ประวัติการยืม-คืนครุภัณฑ์</b></h3></a></button></td>
                    </tr>
                    </table>      
                    <br>
                    <table border="0" align="center" style="width:100%;" >
                    <tr>
                    <td><select name="search_text" id="search_text" style="width: 100%; font-family:Prompt; font-size: 15px; " class="form-control">
                                                            <option value="ทั้งหมด">ประเภททั้งหมด</option>
                                            <?php
                                                    $type = "SELECT * FROM type_eq ORDER BY type_name";
                                                    $result = mysqli_query($conn, $type);
                                                    while($data = mysqli_fetch_array($result)):
                                             ?>
                                                    <option value="<?php echo $data['type_name']; ?>"><?php echo $data['type_name']; ?></option>
                                            <?php endwhile;?>
                                                </select></td>
                    <td><select name="search_text2" id="search_text2" style="width: 100%; font-family:Prompt; font-size: 15px;" class="form-control">
                                                            <option value="ทั้งหมด">สัญญาทั้งหมด</option>
                                            <?php
                                                    $cont = "SELECT * FROM contract ORDER BY con_name";
                                                    $result2 = mysqli_query($conn, $cont);
                                                    while($data = mysqli_fetch_array($result2)):
                                             ?>
                                                    <option value="<?php echo $data['con_name']; ?>"><?php echo $data['con_name']; ?></option>
                                            <?php endwhile;?>
                                                </select></td>

                    </tr>
                    </table>
                    <div class="table-responsive" id="result">
                    <p></p>
                    <form id="form3"> 
                    <table id="tableshow" align="center" style="width:100%;" class="table table-striped table-bordered " >
                    <thead>
                    <tr style="font-weight: bold;">
                        <td style="text-align: center; ">ผู้ยืม</td>
                        <td style="text-align: center;">Serial Number</td>
                        <td style="text-align: center;">สัญญา</td>
                        <td style="text-align: center;">ประเภทครุภัณฑ์</td>
                        <td style="text-align: center;">จุดประสงค์การยืม</td>
                        <td style="text-align: center;">วันที่ยืม</td>
                        <td style="text-align: center;">วันที่คืน</td>
                   </tr>
                    </thead>
                    <tr>
                    <?php
                       $sql = "SELECT * FROM backup_permit";
                       $result = mysqli_query($conn, $sql);
                       while($data = mysqli_fetch_array($result))
                       {

                    ?>
                        <td style="text-align:left"><?php echo $data['bu_username']; ?></td>
                        <td style="text-align:left"><?php echo $data['bu_pm_serial']; ?></td>
                        <td style="text-align:left"><?php echo $data['bu_pmd_con_name']; ?></td>
                        <td style="text-align:left"><?php echo $data['pmd_type_name']; ?></td>
                        <td style="text-align:left"><?php echo $data['bu_pm_name']; ?></td>
                        <td style="text-align:left"><?php echo $data['bu_pm_firstdate']; ?></td>
                        <td style="text-align:left"><?php echo $data['bu_pm_date_refund']; ?></td>
                    </tr>
                       <?php } ?>
                </table>
                </form>
                </div>
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





<script>
$(document).ready(function(){  
        $('#tableshow').DataTable({
        "searching": false
});  
 }); 
</script>

<script>
$(document).ready(function()
{
        load_data();
                function load_data(query, query2)
                {
                        $.ajax(
                        {
                        url:"search_BU_PM.php",
                        method:"POST",
                        data:{query:query, query2},
                        success:function(data)
                        {
                            $('#result').html(data);
                        }
                        }
                            );
                }
                $('#search_text').change(function()
                {
                    var search = $(this).val();
                    var search2 = $('#search_text2').val();
                    if(search != '' && search2 != '')
                    {
                        load_data(search, search2);
                    }else
                    {
                        load_data();
                    }
                }
                );
});
</script>

<script>
$(document).ready(function()
{
        load_data();
                function load_data(query2, query)
                {
                        $.ajax(
                        {
                        url:"search_BU_PM.php",
                        method:"POST",
                        data:{query2:query2, query},
                        success:function(data)
                        {
                            $('#result').html(data);
                        }
                        }
                            );
                }
                $('#search_text2').change(function()
                {
                    var search2 = $(this).val();
                    var search = $('#search_text').val();
                    if(search2 != '' && search != '')
                    {
                        load_data(search2, search);
                    }else
                    {
                        load_data();
                    }
                }
                );
});
</script>


        </body>
</html>
