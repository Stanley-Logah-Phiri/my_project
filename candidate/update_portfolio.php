<?php
// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Include database connection
    include('inc/dbcon.php');

    // Function to sanitize input
    function sanitizeInput($data) {
        return htmlspecialchars(stripslashes(trim($data)));
    }

    // Retrieve form data
    $userId = $_POST['user_id'];
    $full_name = sanitizeInput($_POST['full_name']);
    $address = sanitizeInput($_POST['address']);
    $phone_number = sanitizeInput($_POST['phone_number']);
    $email = sanitizeInput($_POST['email']);
    $degree = sanitizeInput($_POST['degree']);
    $institution = sanitizeInput($_POST['institution']);
    $graduation_date = sanitizeInput($_POST['graduation_date']);
    $job_title = sanitizeInput($_POST['job_title']);
    $company_name = sanitizeInput($_POST['company_name']);
    $employment_dates = sanitizeInput($_POST['employment_dates']);
    $skills = sanitizeInput($_POST['skills']);
    $certifications = sanitizeInput($_POST['certifications']);
    $certification_file_path = sanitizeInput($_POST['certifications_file_path']);
    $cv_document_path = sanitizeInput($_POST['cv_document_path']);
    $project_links = sanitizeInput($_POST['project_links']);

    // Update user portfolio in the database
    $updateSql = "UPDATE user_portfolio SET
        full_name = ?,
        address = ?,
        phone_number = ?,
        email = ?,
        degree = ?,
        institution = ?,
        graduation_date = ?,
        job_title = ?,
        company_name = ?,
        employment_dates = ?,
        skills = ?,
        certifications = ?,
        certificationS_file_path = ?,
        cv_document_path = ?,
        project_links = ?
        WHERE user_id = ?";

    $updateStmt = $conn->prepare($updateSql);

    if (!$updateStmt) {
        die("Error in prepare: " . $conn->error);
    }

    $updateStmt->bind_param("sssssssssssssssi",
        $full_name,
        $address,
        $phone_number,
        $email,
        $degree,
        $institution,
        $graduation_date,
        $job_title,
        $company_name,
        $employment_dates,
        $skills,
        $certifications,
        $certification_file_path,
        $cv_document_path,
        $project_links,
        $userId
    );

    $updateResult = $updateStmt->execute();

    if ($updateResult) {
        // Success! Redirect or show a success message.
        header("Location: manage_users.php");
        exit();
    } else {
        // Error in execution
        echo "Error updating portfolio: " . $updateStmt->error;
    }

    // Close prepared statement and database connection
    $updateStmt->close();
    $conn->close();
} else {
    // If the form is not submitted, redirect to the main page or show an error message.
    header("Location: manage_users.php");
    exit();
}
?>
