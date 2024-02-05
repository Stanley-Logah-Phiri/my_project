<?php
$jobId = $row['job_id'];

if ($jobId) {
    // Fetch job details from the database using the job ID
    $query = "SELECT job_id, job_title, job_description, qualifications, responsibilities, deadline_date FROM jobs WHERE job_id = $jobId";
    $result = $conn->query($query);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo '<div class="job-post">';
            echo "<h2>{$row['job_title']}</h2>";

            echo "<p><strong>Description</strong></p>";
            echo "<p> {$row['job_description']}</p>";

            echo "<p><strong>Qualification:</strong></p>";
            $qualifications = explode("\n", $row['qualifications']);
            echo "<ul>";
            foreach($qualifications as $qualification) {
                echo "<li> {$qualification} </li>";
            }
            echo "</ul>";


            echo "<p><strong>Responsibilities:</strong></p>";
            $responsibilities = explode("\n", $row['responsibilities']);
            echo "<ul>";
            foreach($responsibilities as $responsibility) {
                echo "<li> {$responsibility} </li>";
            }
            echo "</ul>";
    

            echo "<p><strong>Deadline:</strong></p>";
            echo "<p>{$row['deadline_date']}</p>";
            echo '<p><a href="edit_job.php?id=' . $row['job_id'] . '">Edit</a> | <a href="delete_job.php?id=' . $row['job_id'] . '">Delete</a></p>';
            echo '</div>';
        }
    } else {
        echo "No job posts found.";
    }
} else {
    echo json_encode(['error' => 'Invalid job ID']);
}

$conn->close();
?>
