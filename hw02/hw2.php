<!DOCTYPE html>
<html>
<head>
	<title>Profile</title>
	<style>

	</style>
</head>
<body> 
	Hello, <?php echo $_POST["name"]; ?><br>
	You are studying at <?php echo $_POST["class"]; ?>, <?php echo $_POST["uni"]; ?><br>
	Your hobbies are
	<ol>
		<?php
			$hobby = $_POST["hobby"];
			$hobbylength = count($hobby);

			for($x = 0; $x < $hobbylength; $x++) {
			    echo "<li>".$hobby[$x]."</li>";
			}
		?>
	</ol>
	Your desire: <?php echo $_POST["desire"]; ?>
</body>
</html>