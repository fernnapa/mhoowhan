<?php  
session_start();
include("../../db_connect.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>ข้อมูลครุภัณฑ์คอมพิวเตอร์</title>
  <link href="https://fonts.googleapis.com/css?family=Kanit|Prompt" rel="stylesheet">
    <?php include("link.php"); ?> 
    
 <style>
  

    table, th, td{
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
  <?php include("navbar.php"); ?>
<body>

<div class="card">
    <div class="card-body">
   
<table align="center" style="width:100%; font-family:Prompt;" border="0" class="w3-teal ">
        <tr>
            <th><p><h3 style="text-align:center; font-family:Prompt;" class="w3-teal"><b>QR-code ครุภัณฑ์คอมพิวเตอร์</b></h3></th>
                </tr>
        </table>

    <div style="width:100%;" class="input-group mb-3">
    <table border="0" align="center" style="width:100%;" >
                    <tr>
                    <td><select name="search_text" id="search_text" style="width: 100%; font-family:Prompt; font-size: 15px;" class="form-control">
                                                            <option value="ทั้งหมด">สัญญาทั้งหมด</option>
                                            <?php
                                                    $cont = "SELECT * FROM contract ORDER BY con_name";
                                                    $result = mysqli_query($conn, $cont);
                                                    while($data = mysqli_fetch_array($result)):
                                             ?>
                                                    <option value="<?php echo $data['con_name']; ?>"><?php echo $data['con_name']; ?></option>
                                            <?php endwhile;?>
                                                </select></td>
                    <td><select name="search_text2" id="search_text2" style="width: 100%; font-family:Prompt; font-size: 15px;" class="form-control">
                                                            <option value="ทั้งหมด">สถานะทั้งหมด</option>
                                            <?php
                                                    $cont = "SELECT * FROM a_status  
                                                    WHERE status_id = 1 OR status_id = 2 OR status_id = 3 OR status_id = 5 OR status_id = 6 OR status_id = 7 OR status_id = 8 OR status_id = 10 OR status_id = 11
                                                    ORDER BY status_id";
                                                    $result2 = mysqli_query($conn, $cont);
                                                    while($data = mysqli_fetch_array($result2)):
                                             ?>
                                                    <option value="<?php echo $data['status_id']; ?>"><?php echo $data['status_name']; ?></option>
                                            <?php endwhile;?>
                                                </select></td>

                    </tr>
                    </table>
    </div>
    <div class="table-responsive" id="result">
        <form id="form3"></form>
    </div>
    <!-- /.data -->
    <?php include ("footer.php"); ?>
    </div>
    </div>
</body>
</html>

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
                function load_data(a, x)
                {
                        $.ajax(
                        {
                        url:"search_qr.php",
                        method:"POST",
                        data:{'con':a, 'c':x},
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
                function load_data(b, x)
                {
                        $.ajax(
                        {
                        url:"search_qr.php",
                        method:"POST",
                        data:{'status':b, 'b':x},
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
    
    
    <script>          
      function getidTOedit(str){
         var a = str.value;
         var b = str.id;
         location.href = "QRcode.php?ID="+a;
    }  
    </script>

   

    <script>
        function namepic(){
            var name = document.getElementById('select_image');
            var x = name.files.item(0).name;
            document.getElementById('eq_pic').value = x;
        }
    </script>


    <script>
        function showEq(str) {
            var xhttp;    
            if (str == "") {
                document.getElementById("getEq").innerHTML = "";
                return;
            }
            xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                document.getElementById("getEq").innerHTML = this.responseText;
                }
            };
            xhttp.open("GET", "../../toey/getEq.php?id="+str, true);
            xhttp.send();
            }
    </script>



  