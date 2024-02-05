<?php
                // Include your database connection code or configuration here
                include("dbcon.php"); // Adjust the path as needed

                
                
                   /*  if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        $job_id = $_POST["job_id"];
                        $job_title = $_POST["job_title"];
                        $job_description = $_POST["job_description"];
                        $qualifications = $_POST["qualifications"];
                        $responsibilities = $_POST["responsibilities"];
                        $deadline_date = $_POST["deadline_date"];

                        // Update the job post in the database
                        $query = "UPDATE jobs SET job_title = ?, job_description = ?, qualifications = ?, responsibilities = ?, deadline_date = ? WHERE job_id = ?";
                        $stmt = $conn->prepare($query);
                        $stmt->bind_param("sssssi", $job_title, $job_description, $qualifications, $responsibilities, $deadline_date, $job_id);

                        if ($stmt->execute()) {
                            
                            exit();
                        } else {
                            echo "Error updating job post: " . $conn->error;
                        }
                    }
                
                // Close the database connection
                $conn->close(); */

                if (isset($_POST["user_upload"]) == "POST") {
                    $job_id = $_POST["job_id"];
                    $job_title = $_POST["job_title"];
                    $job_description = $_POST["job_description"];
                    $qualifications = $_POST["qualifications"];
                    $responsibilities = $_POST["responsibilities"];
                    $deadline_date = $_POST["deadline_date"];

                    // Update the job post in the database
                    $query = "UPDATE jobs SET job_title = ?, job_description = ?, qualifications = ?, responsibilities = ? WHERE job_id = ?";
                    $stmt = $conn->prepare($query);
                    $stmt->bind_param("ssssi", $job_title, $job_description, $qualifications, $responsibilities, $job_id);

                    if ($stmt->execute()) {
                        $_SESSION['job_cancel_success'] = 'Job Edited successfully';
                        echo "<script type='text/javascript'>window.location.href='../manage_jobs.php';</script>";
                        
                    } else {
                        $_SESSION['job_cancel_error'] = "Error updating job post: " . $conn->error;
                        echo "<script type='text/javascript'>window.location.href='../manage_jobs.php';</script>";
                    }
                    


                } else {
                    echo "sssss";
                    echo "<script type='text/javascript'>window.location.href='../manage_jobs.php';</script>";
                }


            ?>