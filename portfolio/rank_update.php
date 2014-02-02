<?php
include '../connect.php';
// Get current admin level of user
$al = $_SESSION['sess_admin_level']

// Sanitise inputs
$id = mysqli_real_escape_string($con, $_POST['id']);
$new_level = mysqli_real_escape_string($con, $_POST['new_level']);

$query = "UPDATE admin_tbl " . "SET enum = $new_level " . "Where admin_id = $id";

mysqli_query($con, $query);
?>