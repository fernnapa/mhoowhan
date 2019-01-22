<?php
header('Content-Type: application/json');

$conn = mysqli_connect("localhost","root","","project_com");
mysqli_query($conn, "SET NAMES 'utf8' "); 

$sqlQuery = "SELECT year(ac_date) as xx, month(ac_date) as a, ac_status, a_status.status_name, ac_date, count(ac_date) as number 
FROM allocate 
INNER JOIN a_status ON allocate.ac_status = a_status.status_id 
WHERE allocate .ac_status in(2) and year(ac_date) in(2019)
GROUP by ac_status, month(ac_date), year(ac_date)
 ";

$result = mysqli_query($conn,$sqlQuery);

$data = array();
foreach ($result as $row) {
	$data[] = $row;
}

mysqli_close($conn);

echo json_encode($data);
?>