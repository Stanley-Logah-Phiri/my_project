<?php
session_start();
include_once("dbcon.php");

// Process login form submission
if (isset($_POST['login_btn'])) {
    
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Retrieve hashed password from the database based on the provided email
    $checkEmailQuery = "SELECT * FROM users WHERE email = '$email' OR status='Active'";
    $result = $conn->query($checkEmailQuery);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $hashed_password = $row['password'];

        // Verify the entered password against the hashed password from the database
        if (password_verify($password, $hashed_password)) {
             // Password is correct, set user session and redirect
            $_SESSION['user_email'] = $email;
            $_SESSION['user_id'] = $row['user_id'];
            $_SESSION['role'] = $row['role'];
            
            
            if ($_SESSION['role'] == 1) {
                $_SESSION['admin'] = $row['user_id'];
                /* $activities = "Logged in";
                $login_time = date("Y-m-d H:i:sa");
                $sql = "INSERT INTO userlog (userlog_id, user_id, login_time) VALUES ('', '".$_SESSION['admin']."', '".$login_time."')"; 
                $conn->query($sql); */
                echo "<script>window.location.href = '../admin/index.php';</script>";

            } elseif ($_SESSION['role'] == 2) {
                $_SESSION['candidate'] = $row['user_id'];
              /*   $activities = "Logged in";
                $login_time = date("H:i:sa");
                $sql = "INSERT INTO userlog (userlog_id, user_id, login_time) VALUES ('', '".$_SESSION['candidate']."', '".$login_time."')"; 
                $conn->query($sql); */
                echo "<script>window.location.href = '../candidate/index.php';</script>";
            }          
            
        } else {
            // Password verification failed
            
            $_SESSION['errorLogin'] = "Invalid Email or Password";
            header('Location: ../login.php');
        }
    } else {
        // User with the provided email doesn't exist
        $_SESSION['errorLogin'] = "Account Does Not Exists";
        header('Location: ../login.php');
    }
}

// Close the connection
$conn->close();
?>