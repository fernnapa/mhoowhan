<?php



$conn = new mysqli ( 'localhost', 'root', '', 'final');
    if(mysqli_connect_error()):
        echo "Error connect". mysqli_connect_error();
    endif;
mysqli_set_charset($conn,"utf8");

?>

