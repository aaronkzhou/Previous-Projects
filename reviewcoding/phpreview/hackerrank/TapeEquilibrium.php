<?php
solution([-1000,1000]);

function solution($A) {
	//$newa=str_split($A);
	
	$counta=count($A);
	$leftsidea=0;
	$rightsidea=0;

	foreach ($A as $key => $value) {

		for ($j=$key+1; $j<$counta ; $j++) {
			$rightsidea=$A[$j]+$rightsidea;
			//echo $rightsidea;
		}

		//echo $rightsidea.".";
		for($i=0;$i<$key;$i++){
			$leftsidea=$A[$i]+$leftsidea;
			//echo $i;
			echo $leftsidea;
		}
		
		//echo $leftsidea;
		//echo $leftsidea.".";
		$z[]=abs($leftsidea-$rightsidea);
		$leftsidea=0;
		$rightsidea=0;

	}
	//var_dump($z);
	//echo min($j);
}