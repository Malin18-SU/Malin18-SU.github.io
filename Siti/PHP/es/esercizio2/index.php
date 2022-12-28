<html>
	<head>
		<title>Esercizio prova</title>
	</head>
	
	<body>
		<div>
			<?php 
			$q = 3;
			echo "il quadrato di $q è " .(pow($q, 2));	
			$x1 = 3;
			$x2 = 3;
			$y1 = 1;
			$y2 = 10;
			$d = sqrt(pow($x1-$x2, 2)+pow($y1-$y2, 2));
			echo "<br>la distanza è " .$d;
			?>
		</div>
	</body>
</html>