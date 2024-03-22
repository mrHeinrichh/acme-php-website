<?php

// To protect any php page on your site, include main.php
// and create a new User object. It's that simple!

require_once 'includes/main.php';

$user = new User();

if(!$user->loggedIn()){
	redirect('index.php');
}

?>

<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8"/>
		<title>Protected page</title>

		<!-- The main CSS file -->
		<link href="assets/css/style.css" rel="stylesheet" />

		<!--[if lt IE 9]>
			<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
	</head>

	<body>

		<div id="protected-page">
			<img src="assets/img/lock.jpg" alt="Lock" />
			<h1>You are logged in!</h1>

			<p>Email: <b><?php echo $user->email ?></b><br />
				Rank: <b style="text-transform:capitalize"><?php echo $user->rank() ?></b>
			</p>

			<a href="index.php?logout=1" class="logout-button">Logout</a>

		</div>

	</body>
</html>