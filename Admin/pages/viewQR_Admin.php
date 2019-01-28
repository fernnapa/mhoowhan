<?php
include("../../Home/db_connect.php");
?>
<!DOCTYPE html>
<html>
    <head>
  
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php include("link.php"); ?>

        <link href="https://fonts.googleapis.com/css?family=Kanit|Prompt" rel="stylesheet">

        <title>รายการครุภัณฑ์</title>
        
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
         
    </style>
    </head>
    <style>
.modal-dialog.a{
  max-width : 70%;
}
.modal-dialog.b{
  max-width : 580px;
}
</style>
</head>


        <body>
<?php
        if(isset($_GET['ID'])){
            $id = $_GET['ID'];
        }

       
     
        if(isset($_GET['id'])){
            $id = $_GET['id'];
        }

?>
  <div class="modal fade" tabindex="-1" role="dialog" id="myModal2">
                            <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title">เเก้ไขข้อมูลครุภัณฑ์</h4>
                            </div>
                                    <div class="modal-body">
                                            <form id="Edit_Eq" method="POST">
                                            <table style="width:100%" align="center" id="getEq">
                                               
                                               
                                            
                                            </table>
                                            </form>
                                        </div>
                            <div class="modal-footer">
                                <button type="reset" class="btn btn-danger" data-dismiss="modal">ยกเลิก</button>
                                <button type="submit" class="btn btn-success" value="submit" name="Eq_update" id="submit" form="Edit_Eq">อัพเดท</button>
                            </div>
                            </div>
                            </div>
                            </div>
                <br>   
                <?php

                $searchinPM ="SELECT * FROM `permit_detail` WHERE `pmd_eq_id` = $id";
                $result3 = mysqli_query($conn, $searchinPM);   
                $num_rows = mysqli_num_rows($result3); 
                
                

                if($num_rows>0)
                {
                    $pm = "SELECT * FROM `permit_detail`
                    LEFT JOIN permit
                    ON permit_detail.per_id = permit.pm_id 
                    LEFT JOIN department
                    ON permit.pm_dep = department.dep_id
                    WHERE pmd_eq_id = $id";
                    $result = mysqli_query($conn, $pm);
                    while($data = mysqli_fetch_array($result))
                    { 
                        $pm_userTname = $data['pm_userTname'];
                        $pm_username = $data['pm_username'];
                        $pm_userno = $data['pm_userno'];
                        $pm_position = $data['pm_position'];
                        $pm_dep = $data['pm_dep'];
                        $pm_dep_name = $data['dep_name'];
                        $pm_firstdate = $data['pm_firstdate'];
                        $pm_enddate = $data['pm_enddate'];
                        $pm_name = $data['pm_name'];
                        $date = $data['pm_date'];
                        $pm_empno = $data['pm_empno'];
                        $pm_TypeR = $data['pm_TypeR'];
                        $bc =  $data['pmd_eq_barcode'];
                        $sr =  $data['pmd_eq_serial'];
                        $tn =  $data['pmd_type_name'];
                        $cn =  $data['pmd_con_name'];
                        $cn =  $data['pmd_con_name'];
                        $stn =  $data['pmd_status_name'];
                        $dpn =  $data['dep_name'];


    
                    }
                    ?>
    
                 
                        
                        <form id="Add_PM"> 
                        <table border="0" align="center" style="width:100%;" class="w3-teal ">
                        <tr>
                        <td><h3><b>รายการครุภัณฑ์</b></h3></a></button></td>
                        </tr>
                        </table>
                        <div class="table-responsive w3-card-2 w3-round">
                        <table border="1" align="center" style="width:100%" class="w3-round table table-striped table-bordered">
                        <tr>
                        <td style="text-align: left"><b>Barcode</b></td>
                        <td style="text-align: left"><b>หมายเลขเครื่อง</b></td>
                        </tr>
                        <td><?php echo $bc; ?></td>
                        <td ><?php echo $sr; ?></td>
                        </tr>
    
                        
                        <tr>
                        <td  style="text-align: left"><b>ประเภท</b></td>
                        <td  style="text-align: left"><b>สัญญา</b></td>
                        </tr>
                        <tr>
                        <td ><?php echo $tn; ?></td>
                        <td><?php echo $cn; ?></td>
                        </tr>
    
                        <tr>
                        <td  style="text-align: left"><b>สถานะ</b></td>
                        <td  style="text-align: left"><b>หน่วยงาน</b></td>
                        </tr>
    
                        <tr>
                        <td ><?php echo $stn; ?></td>
                        <td><?php echo $dpn; ?></td>
                        </tr>
    
                        <tr>
                        <td style="text-align: left"><b>ผู้ยืมครุภัณฑ์</b></td>
                        <td style="text-align: left" ><b>วันครบกำหนดยืม-คืน</b></td>
                        </tr>
                        <tr>
                        <td ><?php echo $pm_username; ?></td>
                        <td ><?php echo $pm_enddate; ?></td>
                        </tr>
                        <tr>
                        <?php $sql = "SELECT * FROM `equipment` WHERE eq_id = $id";
                            $result2 = mysqli_query($conn, $sql);
                            while($data2 = mysqli_fetch_array($result2))
                            {
                                    $pic = $data2['eq_pic'];
                            }
                         ?>
                        <td colspan="2"><img src="img/<?php echo $pic; ?>" width="400px;" height="320px;" / class="w3-card-2 w3-round"></td>
                        </tr>
                        
                        </table>
                        </div>
            

                        <?php }else{ 

               
                $eq = "SELECT * FROM equipment
                LEFT JOIN a_status
                ON equipment.eq_status = a_status.status_id
                LEFT JOIN tor
                ON equipment.eq_tor = tor.tor_id
                LEFT JOIN contract
                ON tor.tor_contract = contract.con_id
                LEFT JOIN type_eq
                ON tor.tor_type = type_eq.type_id
                WHERE eq_id = $id";

                $result4 = mysqli_query($conn, $eq);
                while($data2 = mysqli_fetch_array($result4)){

                    $pm_username = '-';
                    $pm_enddate = '-';
                    $bc =  $data2['eq_barcode'];
                    $sr =  $data2['eq_serial'];
                    $tn =  $data2['type_name'];
                    $cn =  $data2['con_name'];
                    $stn =  $data2['status_name'];
                    $dpn =  '-';
                    $pic = $data2['eq_pic'];
                    $eqid = $data2['eq_id'];


                    // if($stn == 'รอดำเนินการ'){
                    //     $stn = '-';
                    //     $dpn = '-';
                    //     $pm_username = '-';
                    //     $pm_enddate = '-';

                    // }


                }
                ?>   
                    <form id="Add_PM"> 
                    <table border="0" align="center" style="width:100%;" class="w3-teal ">
                    <tr>
                    <td><h3 style="font-family:Prompt;"><b>รายการครุภัณฑ์</b></h3></a></button></td>
                    </tr>
                    </table>
                    <div class="table-responsive">
                    <br>
                    <table border="1" align="center" style="width:100%" class="w3-round table table-striped table-bordered">
                    <tr>
                    <td style="text-align: left; font-family:Prompt;">Barcode</td>
                    <td style="text-align: left; font-family:Prompt;">Serial</td>
                    </tr>
                    <td><?php echo $bc; ?></td>
                    <td ><?php echo $sr; ?></td>
                    </tr>

                    
                    <tr>
                    <td  style="text-align: left; font-family:Prompt;">ประเภท</td>
                    <td  style="text-align: left; font-family:Prompt;">สัญญา</td>
                    </tr>
                    <tr>
                    <td ><?php echo $tn; ?></td>
                    <td><?php echo $cn; ?></td>
                    </tr>

                    <tr>
                    <td  style="text-align: left; font-family:Prompt;">สถานะ</td>
                    <td  style="text-align: left; font-family:Prompt;">หน่วยงาน</td>
                    </tr>

                    <tr>
                    <td ><?php echo $stn; ?></td>
                    <td><?php echo $dpn; ?></td>
                    </tr>

                    <tr>
                    <td style="text-align: left; font-family:Prompt;">ผู้ยืมครุภัณฑ์ </td>
                    <td style="text-align: left; font-family:Prompt;" >วันครบกำหนดยืม-คืน</td>
                    </tr>
                    <tr>
                    <td ><?php echo $pm_username; ?></td>
                    <td ><?php echo $pm_enddate; ?></td>
                    </tr>
                    <tr>
                    <td colspan="2"><img src="img/<?php echo $pic; ?>" width="400px;" height="300px;" class="w3-card-2 w3-round"></td>
                    </tr>
                    <tr>
                    <td><a href="create_AC_QR.php?ID=<?php echo $eqid; ?>" class="btn btn-success btn-block" style="font-family:Prompt;">ทำรายการจัดสรรครุภัณฑ์</a></td>
                    <td><a href="create_PM_QR.php?ID=<?php echo $eqid; ?>" class="btn btn-success btn-block" style="font-family:Prompt;">ทำรายการยืมคืนครุภัณฑ์</a></td>
                    </tr>                    
                    </table>
                    </div>
            <?php } ?>
          
               
                 
                    
                   
            
<!-- /.data -->
<!-- /.script modal add -->

<script>

$(document).ready(function(){  
      $('#tableshow').DataTable({
  "searching": true
});  
 }); 
</script>

<script>

$(document).ready(function(){  
      $('#tableType').DataTable({
  "searching": true
});  
 }); 
</script>




    </body>
</html>
