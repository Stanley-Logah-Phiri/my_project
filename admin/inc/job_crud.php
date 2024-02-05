<?php
session_start();
include('dbcon.php');

    if (isset($_POST['activate']) == 'POST') {
        $jobId = $_POST['job_id'];
        $deadLine = $_POST['dead_line'];
        $query = "UPDATE jobs SET status = 'open', deadline_date = '$deadLine' WHERE job_id = '$jobId'";

        $stmt = $conn->query($query);
        if ($stmt) {
            $_SESSION['job_activate_success'] = 'Job Reposted successfully';
            echo '<script>window.location.href = "../manage_jobs.php";</script>';
        } else {
            $_SESSION['job_activate_error'] = 'Error deactivating job';
            echo '<script>window.location.href = "../manage_jobs.php";</script>';
        }

       
    }

    if  (isset($_POST['deactivate'])  == 'POST') {
        $jobId = $_POST['job_id'];
        $query = "UPDATE jobs SET status = 'cancelled' WHERE job_id = '$jobId'";

        $stmt = $conn->query($query);

        
        if ($stmt) {           
            $_SESSION['job_activate_success'] = 'Job cancelled successfully';
            echo '<script>window.location.href = "../manage_jobs.php";</script>';
        } else {                       
            $_SESSION['job_activate_error'] = 'Error cancelling job';
            echo '<script>window.location.href = "../manage_jobs.php";</script>';
        }
    }

?>
<?PHP

include_once("dbcon.php");

// Process registration form submission
if (isset($_POST['user_upload']) == "POST") {
    $title = $_POST["job_title"];
    $description = $_POST["job_description"];
    $qualifications = $_POST["qualifications"];
    $responsibilities = $_POST["responsibilities"];
    $deadline = $_POST["deadline_date"];



    $letters = '';
    $numbers = '';

    foreach (range('A', 'Z') as $char) {
        $letters .= $char; 
    }
    for ($i=0; $i < 10; $i++) { 
        $numbers .= $i;
    }
    
    $job_code = substr(str_shuffle($letters), 0, 2).substr(str_shuffle($numbers), 0, 6);

    // SQL query to post a job into the database using prepared statements
    $sql = "INSERT INTO jobs (job_code, job_title, job_description, qualifications, responsibilities, deadline_date) VALUES (?, ?, ?, ?, ?, ?)";

    // Create a prepared statement
    $stmt = $conn->prepare($sql);

    // Bind parameters
    $stmt->bind_param("ssssss", $job_code, $title, $description, $qualifications, $responsibilities, $deadline);

    // Execute the statement
    if ($stmt->execute()) {
        $_SESSION['job_activate_success'] = 'Job posted successfully';
      echo '<script>window.location.href = "../manage_jobs.php";</script>';
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
}

// Close the connection
/* $conn->close(); */
?>
<?php
include('dbcon.php');

if (isset($_POST['extend']) == 'POST') {
    $jobId = $_POST['job_id'];
    $deadLine = $_POST['dead_line'];
    $query = "UPDATE jobs SET status = 'open', deadline_date = '$deadLine' WHERE job_id = '$jobId'";

    $stmt = $conn->query($query);
    if ($stmt) {
        $_SESSION['job_activate_success'] = 'Job extended successfully';
        echo '<script>window.location.href = "../manage_jobs.php";</script>';
        
    } else {
        http_response_code(500); 
        echo 'Error deactivating job';
    }

   
}

?>