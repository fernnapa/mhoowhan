<?php



$conn = new mysqli ( 'localhost', 'root', '', 'project_com');
    if(mysqli_connect_error()):
        echo "Error connect". mysqli_connect_error();
    endif;
mysqli_set_charset($conn,"utf8");

?>

