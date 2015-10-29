<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>

</head>
<body>

<div id="container">
	<h1>Welcome to My lift App<br/>As you can see, work has just started!</h1>

	<?php 
	foreach($lifts as $lift) {
		echo "Lift: " . print_r($lift) . "<br/>";
	}
	?>

	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
</div>

</body>
</html>