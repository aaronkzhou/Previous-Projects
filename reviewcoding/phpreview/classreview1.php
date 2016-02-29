<?php
/**
*class for practice 
*/
class SportObject{

	//public $name="test";
	//public $height;
	//public $avoirdupois;

	function beatbasketball($name,$height,$age,$avoirdupois,$sex){
		echo $name;
		$this->name=$name;
		$this->height=$height;
		$this->avoirdupois=$avoirdupois;
		if($height>180 and $avoirdupois<=100){
			//echo "he is OK for basketball";
		}
		else{
			//echo "he isn't Ok for basketball"."\n";
//			echo $name;			
			//echo get_class($this);
		}
	}

}
//$name="test";

$sport=new SportObject();
$sport->beatbasketball('aaron','173','23','100','male');
//echo $sport->name;
//echo $SportObject::$name;

