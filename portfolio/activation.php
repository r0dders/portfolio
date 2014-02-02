<?php
include 'header.php';
include '../connect.php';
$msg='';

if(!empty($_GET['code']) && isset($_GET['code']))
{
    $code=mysqli_real_escape_string($con, $_GET['code']);

    // check to see if there is an activation code match
    $c=mysqli_query($con,"SELECT user_id FROM users_tbl WHERE activation='$code'");

    // check to see if there is an activation code AND they are not active
    if(mysqli_num_rows($c) > 0)
    {
        $count=mysqli_query($con,"SELECT user_id FROM users_tbl WHERE activation='$code' and is_active='0'");

        // if there is a row that matches activation but is not active
        if(mysqli_num_rows($count) == 1)
        {
            // change the activation to 1
            mysqli_query($con,"UPDATE users_tbl SET is_active='1' WHERE activation='$code'");
            $msg="Your account is activated";

        } else {

        $msg ="Your account is already active, no need to activate again";
        }

    } else {
    $msg ="Wrong activation code.";
    }

}

    echo $msg;
    include 'footer.php';
?>
