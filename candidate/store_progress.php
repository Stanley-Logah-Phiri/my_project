<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['currentStep']) && isset($_POST['jobId'])) {
    $_SESSION['progress'][$_POST['jobId']] = $_POST['currentStep'];
}
?>
