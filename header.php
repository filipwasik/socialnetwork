<?php
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Social Network</title>
	<link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
	<link rel="icon" href=" ../user.png">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<header>
	<nav>
		<div class="main-wrapper">
			<ul>
				<li><b><a href="index.php">Social Network</a></li></b>
			</ul>
			<div class="nav-login">
				<?php

					if (isset($_SESSION['username'])) {
						echo '<a href="profile.php">Profile</a><form action="includes/logout.inc.php" method="POST">
							<button type="submit" name="submit">Logout</button>

						</form>';
					}

					else {
						echo '<form action="includes/login.inc.php" method="POST">
							<input type="text" name="username_mail" placeholder="Username/E-Mail">
							<input type="password" name="password" placeholder="Password">
							<button type="submit" name="submit">Login</button>
						</form>
						<a href="signup.php">Sign up</a>';
					}
				?>
			</div>
		</div>
	</nav>
</header>
