<?php  

include("../db_connect.php");
$output = '';
if(isset($_POST["export"]))
{
              
                       $status_name = "จัดสรร";
                       $sql = "SELECT * FROM allocate_detail 
                       LEFT JOIN allocate
                       ON allocate_detail.ac_id = allocate.ac_id
                       LEFT JOIN department
                       ON allocate.ac_dep = department.dep_id
                       WHERE ald_status_name = '$status_name'";

                         $result = mysqli_query($conn, $sql);
                             
                           
 
      if(mysqli_num_rows($result) > 0)
                      {
                            $output .= '
                                        <table class="table" bordered="1">  
                                        <tr>  
                                        <td>Barcode</td>
                                        <td>รายการ</td>
                                        <td>รหัสหน่วยงาน</td>
                                        <td>ชื่อหน่วยงาน</td>
                                        <td></td>
                                        <td>ชื่อ</td>
                                        <td>ตำเเหน่ง</td>
                                        <td>รหัสพนักงาน</td>
                                        <td>Serial Number</td>
                                        <td>TOR</td>
                                        <td>สัญญาปี</td>
                                        <td>สถานะ</td>
                                        </tr>
                                        ';
                      }
    while($data = mysqli_fetch_array($result))
            {

            

             
              $cn  =   $data['ald_con_name'];
              $tn  =   $data['ald_type_name'];

              $tor = "SELECT * FROM tor
              LEFT JOIN type_eq
              ON tor.tor_type = type_eq.type_id
              LEFT JOIN contract
              ON tor.tor_contract = contract.con_id
              WHERE type_name = '$tn' AND con_name = '$cn'";
              $result2 = mysqli_query($conn, $tor);
              while($data2 = mysqli_fetch_array($result2)){
                       $tor_name  = $data2['tor_name'];
              }
            
            $output .= '
                    <tr>                 
                        <td >'.$data['ald_eq_barcode'].'</td>
                        <td >'.$data['ald_type_name'].'</td>
                        <td >'.$data['dep_no'].'</td>
                        <td >'.$data['dep_name'].'</td>
                        <td >'.$data['ac_tname'].'</td>
                        <td >'.$data['ac_name'].'</td>
                        <td >'.$data['ac_position'].'</td>
                        <td >'.$data['ac_empid'].'</td>
                        <td >'.$data['ald_eq_serial'].'</td>
                        <td >'.$tor_name.'</td>
                        <td >'.$data['ald_con_name'].'</td>
                        <td >'.$data['ald_status_name'].'</td>
                    </tr>
                    
   ';
  }
          
       
                        
  $output .= '</table>';
  header("Content-Disposition: attachment; filename='รายงานการจัดสรรครุภัณฑ์คอมพิวเตอร์.xls'");
  header("Content-Type: application/vnd.ms-excel");
 
  
  echo $output;
 
}

?>