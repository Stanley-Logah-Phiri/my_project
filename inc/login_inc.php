<?php
session_start();
include_once("dbcon.php");


// Process login form submission
if (isset($_POST['login_btn'])) {
    
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Retrieve hashed password from the database based on the provided email
    $checkEmailQuery = "SELECT * FROM users WHERE email = '$email' AND status='Active'";
    $result = $conn->query($checkEmailQuery);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $hashed_password = $row['password'];
        $activation_code = $row['activation_code'];
        $activation_status = $row['activation_status'];

        // Verify the entered password against the hashed password from the database
        if (password_verify($password, $hashed_password)) {

            if ($activation_code != 0 && $activation_status != 'Verified') {
                # code...
                echo "<script type='text/javascript'>document.location.href='../activation.php';</script>";
            } else {
                # code...
                $_SESSION['user_email'] = $email;
                $_SESSION['user_id'] = $row['user_id'];
                $_SESSION['role'] = $row['role'];
                $_SESSION['full_name'] = $row['full_name'];
                
                
                if ($_SESSION['role'] == 1) {
                    $_SESSION['admin'] = $row['user_id'];
                    $activities = "Logged in";
                    $login_time = date("Y-m-d H:i:sa");
                    $sql = "INSERT INTO userlog (userlog_id, user_id, full_name, login_time) VALUES ('', '".$_SESSION['admin']."', '".$_SESSION['full_name']."', '".$login_time."')"; 
                    $conn->query($sql);
                    echo "<script>window.location.href = '../admin/index.php';</script>";

                }else if($_SESSION['role'] == 2) {
                    $_SESSION['HRM'] = $row['user_id'];
                    $activities = "Logged in";
                    $login_time = date("Y-m-d H:i:sa");
                    $sql = "INSERT INTO userlog (userlog_id, user_id, full_name, login_time) VALUES ('', '".$_SESSION['HRM']."', '".$_SESSION['full_name']."', '".$login_time."')"; 
                    $conn->query($sql);
                    echo "<script>window.location.href = '../HRM/index.php';</script>";
    
                } elseif ($_SESSION['role'] == 3) {
                    $_SESSION['candidate'] = $row['user_id'];
                    $activities = "Logged in";
                    $login_time = date("Y-m-d H:i:sa");
                    $sql = "INSERT INTO userlog (userlog_id, user_id, full_name, login_time) VALUES ('', '".$_SESSION['candidate']."', '".$_SESSION['full_name']."', '".$login_time."')"; 
                    $conn->query($sql);
                    echo "<script>window.location.href = '../candidate/index.php';</script>";
                } 

            }
            
           

            
        } else {
            // Password verification failed
            
            $_SESSION['errorLogin'] = "Invalid Email or Password";
            echo "<script type='text/javascript'>document.location.href='../login.php';</script>";
        }
    } else {
        // User with the provided email doesn't exist
        $_SESSION['errorLogin'] = "Account Does Not Exists";
        echo "<script type='text/javascript'>document.location.href='../login.php';</script>";
    }
}

// Close the connection
$conn->close();
?>