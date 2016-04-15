<?php

class Player {
   public $hand = [];
   public $name;

   function __construct() {

   }

    public function layDownCard(){
        $this->hand = [1, 2, 3, 4, 5, 6];    // Hard coded numbers represent cards. Will get from deal function
        array_shift($this->hand);            // Shift the first "card" out
  }

    public function showHand(){
        for($i=0; $i<count($this->hand); $i++){  // loops through to get the remaining "cards"
       echo $this->hand[$i];                 // echos out what remains in the hand array
    }
    }
}

?>
