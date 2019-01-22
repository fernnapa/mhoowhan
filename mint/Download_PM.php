<?php  

include ("db_connect.php");
$output = '';
if(isset($_POST["export"]))
{


                                        $status_name = "ยืม - คืน";
                                        $sql = "SELECT * FROM permit_detail 
                                        LEFT JOIN permit
                                        ON permit_detail.per_id = permit.pm_id
                                        LEFT JOIN department
                                        ON permit.pm_dep = department.dep_id
                                        WHERE pmd_status_name = '$status_name'";

                         $result = mysqli_query($conn, $sql);
                       while($data = mysqli_fetch_array($result)){
                              
                           
 
 
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
               while($data = mysqli_fetch_array($result))
                 {

                  $cn  =   $data['pmd_con_name'];
                  $tn  =   $data['pmd_type_name'];

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
                                       
                                        <td >'.$data['pmd_eq_barcode'].'</td>
                                        <td >'.$data['pmd_type_name'].'</td>
                                        <td >'.$data['dep_no'].'</td>
                                        <td >'.$data['dep_name'].'</td>
                                        <td >'.$data['pm_userTname'].'</td>
                                        <td >'.$data['pm_username'].'</td>
                                        <td >'.$data['pm_position'].'</td>
                                        <td >'.$data['pm_userno'].'</td>
                                        <td >'.$data['pmd_eq_serial'].'</td>
                                        <td >'.$tor_name.'</td>
                                        <td >'.$data['pmd_con_name'].'</td>
                                        <td >'.$data['pmd_status_name'].'</td>
                    </tr>
   ';
  }
                        }
  $output .= '</table>';
  header("Content-Disposition: attachment; filename='รายงานการยืม-คืนครุภัณฑ์คอมพิวเตอร์.xls'");
  header("Content-Type: application/vnd.ms-excel");
//   header("Pragma: public");
//   header("Expires: 0");
//   header("Content-Type: application/force-download");
//   header("Content-Type: application/octet-stream");
//   header("Content-Type: application/download");
  
  echo $output;
 }
}

?>