<?php
    include("dbcon.php");
    if(isset($_POST['activate_btn']) == 'POST'){

        $activation_code =  $_POST['activation_code'];
        $user = $_SESSION['candidate'];

        $sql = "SELECT * FROM users WHERE activation_code = '$activation_code' AND activation_status = 'Not Verified'";
        $res = $conn->query($sql);
        
        $rows = $res->fetch_assoc();
        $code = $rows['activation_code'];
        $user_id = $rows['user_id'];
        if ($activation_code == $code) {
            # code...

            $qs = "UPDATE users SET activation_status = 'Verified', activation_code = '0' WHERE user_id = '$user_id'";
            $wd = $conn->query($qs);

            if ($wd == TRUE) {
             
                # code...
                echo "<script type='text/javascript'>document.location.href='../candidate/index.php';</script>";

            }



        } else {
            # code...

            echo "<script type='text/javascript'>document.location.href='../activation.php';</script>";
        }
        
    }
?>