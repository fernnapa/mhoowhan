<?php 

    session_start();
    if(isset($_POST['id'])){

    //    echo $_POST['id'];
    //    return;

        $key = $_POST['id'];
        if(in_array($key, $_SESSION['chooseEq'] )){
            echo 2;
            return;
        }else{
            array_push($_SESSION['chooseEq'],$_POST['id']);
            // echo json_encode($_SESSION['chooseEq']);
            echo 1;
        }





    }
?>