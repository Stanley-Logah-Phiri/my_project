<?php
include("dbcon.php");

$query = "SELECT jobs.job_title, COUNT(job_applications.job_id) as application_count
          FROM jobs
          LEFT JOIN job_applications ON jobs.job_id = job_applications.job_id
          GROUP BY jobs.job_title";
$result = $conn->query($query);

$data = array();
$data[] = ['Job Title', 'Applications Received'];

while ($row = $result->fetch_assoc()) {
    $data[] = [$row['job_title'], (int)$row['application_count']];
}

echo json_encode($data, JSON_NUMERIC_CHECK);

$conn->close();



?>
