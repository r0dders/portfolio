<!<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link rel="stylesheet" type="text/css" href="styles.css">
		<title>Register</title>
	</head>

	<body>
		<?php session_start(); ?>
		<?php
            include 'header.php';
		?>

		<form name="register" action="new_admin.php" method="post">
			<table width="510" border="0">
				<tr>
					<td colspan="2">
					<p>
						<strong>Admin Registration Form</strong>
					</p></td>
				</tr>
				<tr>
					<td>Firstname:</td>
					<td>
					<input type="text" name="first_name" maxlength="20" />
					</td>
				</tr>
				<tr>
					<td>Lastname:</td>
					<td>
					<input type="text" name="last_name" maxlength="20" />
					</td>
				</tr>
				<tr>
					<td>Password:</td>
					<td>
					<input type="password" name="password1" />
					</td>
				</tr>
				<tr>
					<td>Confirm Password:</td>
					<td>
					<input type="password" name="password2" />
					</td>
				</tr>
				<tr>
					<td>Email:</td>
					<td>
					<input type="text" name="email" id="email" />
					</td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td>
					<input type="submit" value="Register" />
					</td>
				</tr>
			</table>
		</form>
		<?php
            include 'footer.php';
		?>
	</body>
</html>