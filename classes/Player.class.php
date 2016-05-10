<?php

  @session_start();

  class Player {

    public $hand = [];
    public $name;

    function __construct($name) {
      $this->name = $name;
    }

    public function takeCardFromHand($playedCardID){
      $idx = 0;
      foreach ($this->hand as $card) {
        if ($card->getId() == $playedCardID) {
           $returnedCard = array_splice($this->hand, $idx, 1);
           return $returnedCard[0];
        }
        $idx++;
      }
      return null;
    }

    public function takeCardFromDeck($deck) {
      array_push($this->hand, $deck->popCard());
    }

    function showHand(){
      echo json_encode($this->hand);
    }

    public function getHand(){
      return $this->hand;
    }

    public function updateHand($card) {
      $this->hand[] = $card; // Same as array_push
    }

    public function getName(){
      return $this->name;
    }

  }

?>
