<?php  
session_start();
include("../../Home/db_connect.php");
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

</head>
  <?php include("navbar.php"); ?>
<body>


   
    
    <div style="width:100%;" class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text" id="inputGroup-sizing-default"><b>Search :</b></span>
        </div>
        <input type="text" name="search_text" id="search_text" class="form-control" placeholder="ระบุคำที่ต้องการค้นหา">
    </div>
    <div class="table-responsive" id="result">
        <p></p>
        <form id="form3"></form>
    </div>
    <!-- /.data -->
    <?php include ("footer.php"); ?>
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
        $(document).ready(function(){
            load_data();
                function load_data(query)
                {
                    $.ajax({
                        url:"search_qr.php",
                        method:"POST",
                        data:{query:query},
                        success:function(data){
                            $('#result').html(data);
                        }
                    });
                }
                $('#search_text').keyup(function()
                {
                    var search = $(this).val();
                    if(search != ''){
                        load_data(search);
                    }else{
                        load_data();
                    }
                });
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



  