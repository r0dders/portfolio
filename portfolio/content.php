<?php
//Start session
session_start();

//Check whether the session variable SESS_MEMBER_ID is present or not
if (!isset($_SESSION['sess_user_id']) || (trim($_SESSION['sess_user_id']) == '')) {
    header("location: login.php");
    exit();
}

//Check if account has been activated
if ($_SESSION['sess_is_active'] == 0) {
    header("location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="styles.css">
    </head>
    <body>
        <?php
        // Include header to set up the menu
        include 'header.php';
        // Connect to database
        include '../connect.php';
        // Query the database
        $result = mysqli_query($con, "SELECT * FROM content_tbl");
            while ($row = mysqli_fetch_array($result)) {
                echo "<h3>" . $row['content_title'] . " </h3> " . $row['content_text'] . "<br>";
            }
        // Close database connection
        mysqli_close($con);
        ?>
        <br class="below">
        <h1>Insert new content</h1>
        
        <form action="insert_content.php" method="post" enctype="multipart/form-data">
            <fieldset>
                <p>
                    <label for="title">Title:</label><br/>
                    <input type="text" name="title" />
                </p>
                <p>
                    <label for="content">Content:</label><br/>
                    <textarea name="content" rows="10" cols="25"></textarea>
                </p>
                <p>
                    <label for="file">Attach Image:</label><br/>
                    <input type="file" name="userfile" id="file" /><br>
                </p>
                <p>
                    <input type="hidden" name="task" value="upload" />
                    <input type="submit" value="Send" />
                    <input type="reset" />
                </p>
                <fieldset>
        </form>
        <?php
        include 'footer.php';
        ?>
    </body>
</html>