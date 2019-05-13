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


<!--Image Upload
-------------------
<form action="4-upload.php" method="post" enctype="multipart/form-data">
	<input type="file" name="upFile" id="upFile" accept=".png,.gif,.jpg,.webp" required>
	<input type="submit" name="submit" value="Upload Image">
</form>
-------------------

Show IMAGE
----------------------------------------------
<img src="6-fetch.php?f=rec-monitors.jpg">
-------------------------------------------
