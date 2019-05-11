<?php
	require 'header.php';
?>
<section class="main-container">
	<div class="main-wrapper">
<?php

if (isset($_SESSION['username'])){
	include_once "includes/dbh.inc.php";
	$sql = "SELECT username FROM user;";
	$result = mysqli_query($conn,$sql);
	$resultCheck = mysqli_num_rows($result);
	if ($resultCheck > 0){
		while ($row = mysqli_fetch_assoc($result)) {
			echo $row['username'];
		}
	}
}

else header("Location: index.php?profile=logintoview");







?>
</div>
</section>
<?php
	require 'footer.php';
?>
