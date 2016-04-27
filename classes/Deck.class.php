<?php

  session_start();

  class Deck {

    public $suit;
    public $face;
    public $deck = [];
    public $numberOfCards = 5;
    public $discardPile = [];
    public $cardId = 0;

    function __construct() {
      $this->suit = ["spades", "hearts", "clubs", "diamonds"];
      $this->face = ["Two", "Three", "Four", "Five", "Six", "Seven", "Eight",
      "Nine", "Ten", "Jack", "Queen", "King", "Ace"];

      foreach ($this->suit as $suit) {
        foreach ($this->face as $face) {
          $this->deck[] = new Card($face, $suit, $cardId);
          $cardId++;
        }
      }
      shuffle($this->deck);
    }

    function popCard(){
      if(count($this->deck) == 0){
        $topCard = array_shift($this->discardPile);
        $this->deck = $this->discardPile;
        $this->discardPile = [];
        $this->discardPile[0] = $topCard;
        shuffle($this->deck);
      }
      return array_pop($this->deck);
    }
  }

?>
