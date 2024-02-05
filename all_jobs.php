<?php
include('inc/dbcon.php');

$id = $_GET['id'];

$sq = "SELECT * FROM jobs WHERE job_id = ?";
$stmt = $conn->prepare($sq);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$job = $result->fetch_assoc();

// Output job details
echo "Job Title: " . $job['job_title'] . "<br>";
echo "Job Description: " . $job['job_description'] . "<br>";
// Add more fields as necessary
?>
