
<div id="container">
	<h1>Welcome to My lift App<br/>As you can see, work has just started!</h1>

	<?php 
	foreach($lifts as $lift) {
		echo "Lift: " . print_r($lift) . "<br/>";
	}
	?>

</div>