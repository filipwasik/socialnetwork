<?php
	require 'header.php';
?>


<section class="main-container">
	<div class="main-wrapper">
<?php

	if (isset($_SESSION['username'])){
  	echo"<center><h1>Logged in</h1><br></center>";
	}

	else echo "<h1> Logged Out </h1> ";




?>
	</div>
</section>

<?php
	require 'footer.php';
?>
