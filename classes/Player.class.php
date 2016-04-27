<?php

  session_start();

  class Player {

    public $hand = [];
    public $name;

    function __construct($name) {
      $this->name = $name;
    }

    public function takeCardFromHand($playedCard){       // should be array search to get index then slice or splice
      foreach ($this->hand as $index => $card) {
        if ($card->id == $playedCard) {
           $returnedCard = array_splice($this->hand, $index, 1);
           return $returnedCard[0];
        }
      }
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
