<?php
/**
 * This is a secure page it can only be accessed by logging in as an admin.
 * Checked using SESSION variables.
 */

//Start session
session_start();

//Check whether the session variable SESS_MEMBER_ID is present or not
if (!isset($_SESSION['sess_user_id']) || (trim($_SESSION['sess_user_id']) == '')) {
    header("location: login.html");
    exit();
}

//Check if account has been activated
if ($_SESSION['sess_is_active'] == 0) {
    header("location: login.html");
    exit();
}

//Check if admin
if (!isset($_SESSION['sess_admin_level']) || (trim($_SESSION['sess_admin_level']) == '')) {
    header("location: login.html");
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
        /*
         * This loads the header and gets the connection information form the secure location
         * Make sure the content sits below the header
         */
        include 'header.php';
        
        // Open a connection
        include '../connect.php';

        $result = mysqli_query($con, "SELECT * FROM admin_tbl");
        ?>
        
        <div class="below">
            <!--
            This next section makes a table and loops through with a row for each admin.
            Each row will have a edit button to open the update page where you will only be able to edit the level
            The id will be passed to the page as a session variable
            -->
            <table>
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Level</th>
                </tr>
                <!-- Create three cells with the query, then a cell with the form in it -->
                <?php
                while ($row = mysqli_fetch_array($result)) {
                ?>
                <tr>
                    <td>
                        <?php echo $row['first_name']; ?>
                    </td>
                    
                    <td>
                        <?php echo $row['last_name']; ?>
                    </td>
                    
                    <td>
                        <?php echo $row['admin_level']; ?>
                    </td>                    
                    <td>
                        <form action="rank_update.php" method="post" >
                            <input type="hidden" name="admin_id" value="<?php echo $row['update_admin_id'];?>">

                            <?php
                            if ($_SESSION['sess_admin_level'] > "a"){
                            	echo "<input type="hidden" name="new_admin_level" value="a">";
								echo "<input type="submit" value="a">";
								if ($_SESSION['sess_admin_level'] > "b"){
									echo "<input type="hidden" name="new_admin_level" value="b">";
									echo "<input type="submit" value="b">";
									if ($_SESSION['sess_admin_level'] > "c"){
										echo "<input type="hidden" name="new_admin_level" value="c">";
										echo "<input type="submit" value="c">";
										if ($_SESSION['sess_admin_level'] > "d"){
											echo "<input type="hidden" name="new_admin_level" value="d">";
											echo "<input type="submit" value="d">";
											if ($_SESSION['sess_admin_level'] > "e"){
												echo "<input type="hidden" name="new_admin_level" value="e">";
												echo "<input type="submit" value="e">";
												if ($_SESSION['sess_admin_level'] === "f"){
													echo "<input type="hidden" name="new_admin_level" value="f">";
													echo "<input type="submit" value="f">";
												}
											}
										}
									}
								}
                            }                        
                            ?>
                        </form>
                    </td>
                    
                </tr>
                <?php } ?>
            </table>
        </div>
        <?php
        mysqli_close($con);
        include 'footer.php';
        ?>
    </body>
</html>