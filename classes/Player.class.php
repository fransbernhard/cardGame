<?php

  session_start();

  class Player {

    public $hand = [];
    public $name;

    function __construct($name) {
      $this->name = $name;
    }

    public function layDownCard(){
      array_shift($this->hand); // Shift the first "card" out
    }

    public function takeCardFromDeck($deck) {
      array_push($this->hand, $deck->popCard());
    }


      // TESTING -------------------
    function showHand(){
    shuffle($this->hand);
    echo json_encode($this->hand);
  }
      // TESTING -------------------

    

    // public function showHand(){
    //   for($i=0; $i<count($this->hand); $i++){  // loops through to get the remaining "cards"
    //     print_r($this->hand[$i]);                // echos out what remains in the hand array
    //   }
    // }
  }

?>
