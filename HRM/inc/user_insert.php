<?php
    session_start();
    include('dbcon.php');
    if  (isset($_POST['user_deactivate'])  == 'POST') {
        $userId = $_POST['user_id'];
        $query = "UPDATE users SET status = 'inactive' WHERE user_id = '$userId'";

        $stmt = $conn->query($query);

        
        if ($stmt) {
           
            $_SESSION['user_success'] = 'user deactivated successfully';
            echo "<script type='text/javascript'>window.location.href='../manage_users.php';</script>";
        } else {
            
            $_SESSION['user_error'] = 'Job Edited successfully';
                        echo "<script type='text/javascript'>window.location.href='../manage_users.php';</script>";
        }
    }

    if  (isset($_POST['user_activate'])  == 'POST') {
        $userId = $_POST['user_id'];
        $queryS = "UPDATE users SET status = 'Active' WHERE user_id = '$userId'";

        $stmtS = $conn->query($queryS);

        
        if ($stmtS) {
           
            $_SESSION['user_success'] = 'user activated successfully';
            echo "<script type='text/javascript'>window.location.href='../manage_users.php';</script>";
        } else {
            
            $_SESSION['user_error'] = 'Job Edited successfully';
                        echo "<script type='text/javascript'>window.location.href='../manage_users.php';</script>";
        }
    }
?>
