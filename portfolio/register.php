<?php

include '../connect.php';

// escape all the strings for injection
$firstname = mysqli_real_escape_string($con,$_POST['first_name']);
$lastname = mysqli_real_escape_string($con,$_POST['last_name']);
$password1 = mysqli_real_escape_string($con,$_POST['password1']);
$password2 = mysqli_real_escape_string($con,$_POST['password2']);
$email = mysqli_real_escape_string($con,$_POST['email']);

// regular expression for email check
$regex = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/';

// if passwords don't match send it back
if ($password1 != $password2){header('Location: register_page.php');}

// if username is more than 30 characters sent it back
if (strlen($firstname) > 30){header('Location: register_page.php');}

if (preg_match($regex, $email))
{
    // check to see if unique email
    $count=mysqli_query($con, "SELECT user_id FROM users_tbl WHERE email='$email'");

    if(mysqli_num_rows($count) < 1)
    {

        // create an activation code to be sent by email
        $activation=hash('sha256',$email.time());

        // hash password
        $hash = hash('sha256', $password1);

        // create the salt leave as function in case want to move all functions out
        function createSalt()
        {
            // random md5 salt using md5 fast not needed to be secure here
            $text = md5(uniqid(rand(), true));
            // select some of the string to be used as a hash
            return substr($text, 0, 3);
        }

        // Run the function to create some salt
        $salt = createSalt();

        // create a hash from salt and password using sha256 at this point but change to slower method if more security required
        $password = hash('sha256', $salt . $hash);

        // create the query
        $query = "INSERT INTO users_tbl ( first_name, last_name, password, email, salt, activation ) VALUES
            ( '$firstname', '$lastname', '$password', '$email', '$salt', '$activation' )";

        // run the query in the database
        mysqli_query($con, $query);

        // set up the email verification email

        include 'php_mailer/Send_Mail.php';

        $to = $email;
        $subject = "Email verification";
        //        $header = "Confirmation of registration";
        $body = "Please verify your email and get started using your Website account.";
        $body .= "195.137.48.11/activation.php?code=$activation";

        send_mail($to,$subject,$body);

        $msg = "Registration complete, please check you email for activation link.";

    } else {
        $msg = "I'm sorry but the email is already taken please can you use another email address";
    }

} else {
    $msg =  "I am sorry but the email address you have entered is invalid, please try another";
}

// close the connection
mysqli_close($con);

echo $msg;

// all done go to login page
//header('Location: login.php');
?>