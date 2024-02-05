<?php
    session_start();
    //include_once('../../inc/login_inc.php');
    include('dbcon.php');
    include('session.php');
    //include('init.php');

    $logout_time = date("Y-m-d H:i:sa");
    $sql = "UPDATE userlog SET logout_time = '".$logout_time."' WHERE user_id = '".$_SESSION['candidate']."' AND logout_time = ''";
    $query = $conn->query($sql);
    session_unset();
    session_destroy();

    header("Location: ../../login.php");
?>