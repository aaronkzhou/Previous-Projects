<?php
	function solvemefirst($a,$b){
		return $a + $b;
	}
	$read=fopen("php://stdin","in");
	$_a=fgets($read);
	$_b=fgets($read);
	echo $sum=solvemefirst(int($_a),int($_b);
	fclose($read);
?>