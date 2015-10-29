<h1>Welcome to My lift App<br/>As you can see, work has just started!</h1>

<table class="table table-striped" id="container">

	<?php 
	foreach($lifts as $lift) {
		echo "<tr>";
		echo "<td>" . $lift['name'] . "</td>";
		echo "<td>" . $lift['description'] . "</td>";
		echo "<td>" . $lift['variant'] . "</td>";
		echo "</tr>";
	}
	?>


</table>