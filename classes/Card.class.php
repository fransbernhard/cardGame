<?php

class Card {
	public $value;
	public $type;

	function __construct($value, $type){
		$this->value = $value;
		$this->type = $type;
	}

	function showCard(){
		echo $this->value . " of " . " " . $this->type . "<br>";
	}
}

?>