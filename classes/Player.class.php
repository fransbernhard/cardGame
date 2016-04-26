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

    function showHand(){
      echo json_encode($this->hand);
    }

    function displayCardsInHand(){
      return $this->hand;
    }

}

?>
