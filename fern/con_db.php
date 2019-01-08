
    <?php
        $connect= mysqli_connect("localhost","root","","project") or die("Error: " . mysqli_error($connect));
        mysqli_query($connect, "SET NAMES 'utf8' "); 
    ?>

