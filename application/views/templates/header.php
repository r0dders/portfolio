<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="<?php $_SERVER['PHP_SELF']?>/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php $_SERVER['PHP_SELF']?>/css/starter-template.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
	<title><?php echo $title ?></title>
</head>
<body>
<!-- show username if logged in -->
Welcome
    <?php

    if(isset($username))
    {
        echo ' ' . $username;
    }
    ?>
<!--Navigation section-->
<header>
	<ul class="nav nav-pills nav-stacked navbar-left">
		<li class="active"><a href="<?php $_SERVER['PHP_SELF']?>/index.php">Home</a></li>
        <li><a href="<?php $_SERVER['PHP_SELF']?>/index.php/content">Content</a></li>
        <li><a href="<?php $_SERVER['PHP_SELF']?>/index.php/content/create">New Content</a></li>
		<li><a href="<?php $_SERVER['PHP_SELF']?>/index.php/login">Login</a></li>
    <li><a href="<?php $_SERVER['PHP_SELF']?>/index.php/logout">Logout</a></li>
		<li><a href="<?php $_SERVER['PHP_SELF']?>/index.php/register">Register</a></li>
		<li><a href="new_admin_page.php">New Admin</a></li>
		<li><a href="<?php $_SERVER['PHP_SELF']?>/home.php">Session Test</a></li>
        </ul>
</header>
<br>
<div class="container starter-template pull-right">
	<!-- <div class="starter-template"> -->
