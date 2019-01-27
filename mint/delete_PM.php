<?php 

    session_start();
    if(isset($_POST['id'])){

    //    echo $_POST['id'];

        $del_val = $_POST['id'];
        if (($key = array_search($del_val, $_SESSION['chooseEq'])) !== false) {
            unset($_SESSION['chooseEq'][$key]);
            echo 1;
        }

    }
?>