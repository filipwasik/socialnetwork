<?php
	include_once 'header.php';
?>

<section class="main-container">
	<div class="main-wrapper">
		<?php
			
			if (isset($_SESSION['u_id'])){ ?>
    <center><h2>yes</h2><br></center>
		
<center>
<div class="w3-content w3-section" style="max-width:800px">
  <img class="mySlides" src="assets/nuc/0.jpg" style="width:100%">
  <img class="mySlides" src="assets/nuc/1.jpg" style="width:100%">
  <img class="mySlides" src="assets/nuc/3.jpg" style="width:100%">
	<img class="mySlides" src="assets/nuc/4.jpg" style="width:100%">
	<img class="mySlides" src="assets/nuc/5.jpg" style="width:100%">
	<img class="mySlides" src="assets/nuc/6.jpg" style="width:100%">
</div>
</center>
<script>
var myIndex = 0;
carousel();

function carousel() {
    var i;
    var x = document.getElementsByClassName("mySlides");
    for (i = 0; i < x.length; i++) {
       x[i].style.display = "none";  
    }
    myIndex++;
    if (myIndex > x.length) {myIndex = 1}    
    x[myIndex-1].style.display = "block";  
    setTimeout(carousel, 900); 
}
</script>
		<?php
} ?>
	</div>
</section>

<?php
	include_once 'footer.php';
?>
