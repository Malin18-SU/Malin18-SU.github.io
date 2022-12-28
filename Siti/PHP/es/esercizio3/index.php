<html>
	<head>
		<title>Esercizio prova</title>
	</head>
	
	<body>
		<div>
			<?php 
			$a = 1;
			$b = 3;
			$c = 2;
			$x1;
			$x2;
			
			if($a===0){
				echo "alert('l/'equazione è di primo grado');";
			}else{
				if($b<>0){
					echo "x = " .(-($c/=$b));	
				}
				
				if($b===0 && $c===0){
					echo "l'equazione è indeterminata";
				}
				
				if($b===0 && $c<>0){
					echo "l'equazione è impossibile";
				}
			}
			
			$D = pow($b,2) - 4*$a*$c;
			
			if($D<0){
				echo "alert('l/'equazione è impossibile')";
			}
			
			if($D>0){
				$x1 = (($b + sqrt($D))/2 * $a);
				$x2 = (($b - sqrt($D))/2 * $a);
			}
			
			if($D===0){
				$x1 = (($b + sqrt($D))/2 * $a);
			}
			?>
		</div>
	</body>
</html>