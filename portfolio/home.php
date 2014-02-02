<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="styles.css">
<title>Home Page</title>
</head>

<body>
<?php
session_start();
include 'header.php';
echo '<div class="below"><pre>';
var_dump($_SESSION);
echo '</pre>';
?>
<h1>Welcome, <?php echo $_SESSION["sess_user_id"] ?></h1></div>
<?php
    include 'footer.php';
 ?>
</body>
</html>