<?php

$variable=array('2','1','2');

foreach ($variable as $key => $value) {
	if($value==1){
		echo "over";
		break;
	}
	echo "again";
}
