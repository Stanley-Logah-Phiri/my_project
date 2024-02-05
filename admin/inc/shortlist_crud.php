<?php
include("dbcon.php");
if (isset($_POST['submit'])) {
    // Get user inputs
    $jobTitle = $_POST['job_title'];
    $shortlistCount = $_POST['shortlist_count'];

    // Fetch data for the specific job_title and shortlist the specified number of people
    $sql = "SELECT cv.*, jobs.job_title AS job_title
            FROM job_applications cv
            LEFT JOIN jobs ON cv.job_id = jobs.job_id
            WHERE jobs.job_title = '$jobTitle'
            GROUP BY cv.id
            ORDER BY score DESC
            LIMIT $shortlistCount";

    $result = $conn->query($sql);
    $shortlistedCandidates = array(); // To store candidates for insertion

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            // Collect data for insertion into shortlisted table
            $shortlistedCandidates[] = array(
                'fullname' => $row["fullname"],
                'email' => $row["email"],
                'job_title' => $row["job_title"]
            );
        }

        // Insert shortlisted candidates into the "shortlisted" table
        foreach ($shortlistedCandidates as $candidate) {
            $insertSql = "INSERT INTO shortlisted (fullname, email, job_title)
                          VALUES ('{$candidate['fullname']}', '{$candidate['email']}', '{$candidate['job_title']}')";
            $conn->query($insertSql);
        }

        echo "Shortlisting successful!";
    } else {
        echo "No candidates found for the specified job title.";
    }
}


                    // Insert notification for each shortlisted candidate
                /*  $notificationMessage = "Congratulations! You have been shortlisted for the position of {$candidate['job_title']}.";
                    $notificationInsertSql = "INSERT INTO notifications (shortlisted_id, message, job_title)
                                        VALUES (LAST_INSERT_ID(), '$notificationMessage', '{$candidate['job_title']}')";
                    $conn->query($notificationInsertSql); */
  

           /*  } else {
                echo "<tr><td colspan='5'>No records found for job title: $jobTitle</td></tr>";
            }
 */
    // Close the database connection
    $conn->close();
                                    
									
?>