<?php

class Deck {

  public $suit;
  public $face;
  public $deck = [];

  function __construct() {

    $this->suit = ["spades", "hearts", "clubs", "diamonds"];
    $this->face = ["Two", "Three", "Four", "Five", "Six", "Seven", "Eight",
    "Nine", "Ten", "Jack", "Queen", "King", "Ace"];

    foreach ($this->suit as $suit) {
      foreach ($this->face as $face) {
        $this->deck[] = new Card($face, $suit);
      }
    }

  }

  function popCard(){
    return array_pop($this->deck);
  }

  function showDeck(){
    shuffle($this->deck);
    echo json_encode($this->deck);
  }



}
