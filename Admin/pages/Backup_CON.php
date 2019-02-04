<?php
include("../../db_connect.php");
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
        <?php include("link.php"); ?>

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
    <?php include("navbar.php"); ?>
    <title>ประวัติยืม-คืนครุภัณฑ์</title>
        <body>
                    <table border="0" align="center" style="width:100%;" class="w3-teal">
                    <tr>
                    <td><p><h3 style="font-family:Prompt;"><b>ประวัติสัญญาที่หมดอายุ</b></h3></a></button></td>
                    </tr>
                    </table>
                  
                    <table border="0" align="right" style="width:30%;" >
                    <tr>
                    <td><select name="search_text" id="search_text" style="width: 100%" class="form-control">
                                                            <option value="ทั้งหมด">ประเภททั้งหมด</option>
                                            <?php
                                                    $type = "SELECT * FROM type_eq ORDER BY type_name";
                                                    $result = mysqli_query($conn, $type);
                                                    while($data = mysqli_fetch_array($result)):
                                             ?>
                                                    <option value="<?php echo $data['type_name']; ?>"><?php echo $data['type_name']; ?></option>
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
                        <td style="text-align: center;">ลำดับที่</td>
                        <td style="text-align: center;">ชื่อสัญญา</td>
                        <td style="text-align: center;">Barcode</td>
                        <td style="text-align: center;">Serial Number</td>
                        <td style="text-align: center;">ประเภท</td>
                        <td style="text-align: center;">สถานะ</td>
                   </tr>
                    </thead>
                    <tr>
                    <?php
                       $sql = "SELECT * FROM backup_contract";
                       $result = mysqli_query($conn, $sql);
                       while($data = mysqli_fetch_array($result))
                       {

                    ?>
                        <td style="text-align:left"><?php echo $data['buc_id']; ?></td>
                        <td style="text-align:left"><?php echo $data['buc_con_name']; ?></td>
                        <td style="text-align:left"><?php echo $data['buc_barcode']; ?></td>
                        <td style="text-align:left"><?php echo $data['buc_serial']; ?></td>
                        <td style="text-align:left"><?php echo $data['buc_type_name']; ?></td>
                        <td style="text-align:left"><?php echo $data['buc_status']; ?></td>
                    </tr>
                       <?php } ?>
                </table>
                </form>
                </div>
                <br>
<!-- /.data -->
<!-- /.script modal add -->
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
                        url:"search_BU_CON.php",
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
                        url:"search_BU_CON.php",
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
