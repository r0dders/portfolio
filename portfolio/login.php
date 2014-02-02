<?php
ob_start();
session_start();

include 'header.php';
include '../connect.php';

// Sanitise the input to make sure it is safe

$email = mysqli_real_escape_string($con, $_POST['email']);
$password = mysqli_real_escape_string($con, $_POST['password']);

$sql = "SELECT user_id, email, password, salt, is_active
	FROM users_tbl
	WHERE email = '$email';";
$result = mysqli_query($con, $sql);

if (mysqli_num_rows($result) == 0)// User not found in users table check admin page
{

    $sql = "SELECT admin_id, email, password, salt, is_active, admin_level
		FROM admin_tbl
		WHERE email = '$email';";
    $result = mysqli_query($con, $sql);

    if (mysqli_num_rows($result) == 0)// User not found in either table, so redirect to login_form again.
    {
        //echo "user not found"
        header('Location: login_page.php');
    }
}
$userData = mysqli_fetch_array($result, MYSQLI_ASSOC);

 if($userData['is_active'] == 0) // User not activated account.
 {
 echo "user not activated please can you activate your account by clicking the link we sent you"
 //header('Location: login.html');
 }
 
$hash = hash('sha256', $userData['salt'] . hash('sha256', $password));

if ($hash != $userData['password'])// Incorrect password. So, redirect to login_form again.
{
    header('Location: login_page.php');
} else {
    session_regenerate_id();
    //set up some session id's

    if ($userData['admin_level'] <> "") {//Check if is admin
        $_SESSION['sess_admin_level'] = $userData['admin_level'];
        //Store admin level
        $_SESSION['sess_user_id'] = $userData['admin_id'];
        //Store admin_id
    } else {
        $_SESSION['sess_user_id'] = $userData['user_id'];
        //Store user_id
    }

    $_SESSION['sess_email'] = $userData['email'];
    //Store the username (email)
    $_SESSION['sess_is_active'] = $userData['is_active'];
    //Store if the user has been activated

    session_write_close();
}
header('Location: home.php');
// Redirect to home page after successful login.

mysqli_close($con);
?>