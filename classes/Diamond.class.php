<?php

class Diamond extends Card {
	public $value;
	public $type;

	function __construct($value){
		$this->value = $value;
		$this->type = "diamonds";
	}
}
?>