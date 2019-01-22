<?php
header('Content-Type: application/json');

$conn = mysqli_connect("localhost","root","","project_com");
mysqli_query($conn, "SET NAMES 'utf8' "); 

$sqlQuery = "SELECT ac_dep, a_status.status_name, department.dep_name, count(ac_dep) as number 
FROM allocate 
INNER JOIN a_status ON allocate.ac_status = a_status.status_id 
INNER JOIN department ON allocate.ac_dep = department.dep_id 
WHERE allocate.ac_status in(2) 
GROUP by ac_status, ac_dep";

$result = mysqli_query($conn,$sqlQuery);

$data = array();
foreach ($result as $row) {
	$data[] = $row;
}

mysqli_close($conn);

echo json_encode($data);
?>