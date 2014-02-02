<!--This is going to be the navigation section-->
<header>
	<ul class="ca-menu">
		<li>
			<a href="index.php"> <span class="ca-icon">A</span>
			<div class="ca-content">
				<h2 class="ca-main">Home</h2>
				<h3 class="ca-sub">Start here if you get lost</h3>
			</div> </a>
		</li>

		<li>
			<a href="login_page.php"> <span class="ca-icon">U</span>
			<div class="ca-content">
				<h2 class="ca-main">Login</h2>
				<h3 class="ca-sub">Got a account login here</h3>
			</div> </a>
		</li>

		<li>
			<a href="register_page.php"> <span class="ca-icon">C</span>
			<div class="ca-content">
				<h2 class="ca-main">Register</h2>
				<h3 class="ca-sub">Register to add content</h3>
			</div> </a>
		</li>

		<li>
			<a href="new_admin_page.php"> <span class="ca-icon">F</span>
			<div class="ca-content">
				<h2 class="ca-main">New Admin</h2>
				<h3 class="ca-sub">Register to be an admin</h3>
			</div> </a>
		</li>

		<li>
			<a href="home.php"> <span class="ca-icon">E</span>
			<div class="ca-content">
				<h2 class="ca-main">Session Test</h2>
				<h3 class="ca-sub">WHY IS IT NOT WORKING</h3>
			</div> </a>
		</li>

		<?php
        if ($_SESSION['sess_is_active'] == 1) {
            include 'admin_menu.php';
        }
		?>
	</ul>
</header>
<br>
<div class=below>
