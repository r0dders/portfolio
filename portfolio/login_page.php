<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link rel="stylesheet" type="text/css" href="styles.css">
		<title>Login Form</title>
	</head>

	<body>
		<?php session_start(); ?>
		<?php
            include 'header.php';
		?>
		<a href="index.php">Home</a>

		<form id="form1" name="form1" method="post" action="login.php">
			<table width="510" border="0">
				<tr>
					<td colspan="2">Login Form</td>
				</tr>
				<tr>
					<td>Email:</td>
					<td>
					<input type="text" name="email" id="email" />
					</td>
				</tr>
				<tr>
					<td>Password:</td>
					<td>
					<input type="password" name="password" id="password" />
					</td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td>
					<input type="submit" name="button" id="button" value="Submit" />
					</td>
				</tr>
			</table>
		</form>
		<?php
            include 'footer.php';
		?>
	</body>
</html>