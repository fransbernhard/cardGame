<?php

class Club extends Card {
	public $value;
	public $type;

	function __construct($value){
		$this->value = $value;
		$this->type = "clubs";
	}
}
?>