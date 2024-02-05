<?php
include('inc/dbcon.php');

$id = $_GET['id'];

$sq = "SELECT * FROM jobs WHERE job_id = ?";
$stmt = $conn->prepare($sq);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$job = $result->fetch_assoc();

// Output job details in a formatted way
echo "<div class='row col-md-12'>";
echo "<h2 class='mb-4'>" . nl2br($job['job_title']) . "</h2>";
echo "<ul class=''>";
echo "<li ><strong>Job Description:</strong><br>" . $job['job_description']. "</li>";
echo "<li><strong>Job Qualifications:</strong><ul><li>" . str_replace("\n", "</li><li>", $job['qualifications']) . "</li></ul></li>";
echo "<li><strong>Job Qualifications:</strong><ul><li>" . str_replace("\n", "</li><li>", $job['responsibilities']) . "</li></ul></li>";

// Add more fields as necessary
echo "</ul>";
echo "</div>";
?>
