<?php
	include_once 'header.php';
?>

<section class="main-container">
	<div class="main-wrapper">
		<h2>Signup</h2>
		<form class="signup-form" action="includes/signup.inc.php" method="POST">
			<input type="text" name="firstname" placeholder="Firstname">
			<input type="text" name="lastname" placeholder="Lastname">
			Male <input type="radio" name="gender" value="male">
  		Female <input type="radio" name="gender" value="female">
			<input type="date" name="birthdate" placeholder="Birthdate">
			<input type="text" name="email" placeholder="E-Mail">
			<input type="text" name="username" placeholder="Username">
			<input type="password" name="password" placeholder="Password">
			<button type="submit" name="submit">Sign up</button>
		</form>
	</div>
</section>

<?php
	include_once 'footer.php';
?>
