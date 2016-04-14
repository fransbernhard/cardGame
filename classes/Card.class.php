<?php

class Card {
  
  public $point;
  public $face;
  public $suit;

  
  function __construct($face, $suit) {
      
    $this->face = $face;
    $this->suit = $suit;

    switch($face){
      case "Two":
        $this->point = 2;
        break;
      case "Three":
        $this->point = 3;
        break;
      case "Four":
        $this->point = 4;
        break;
      case "Five":
        $this->point = 5;
        break;
      case "Six":
        $this->point = 6;
        break;
      case "Seven":
        $this->point = 7;
        break;
      case "Eight":
        $this->point = 50;
        break;
      case "Nine":
        $this->point = 9;
        break;
      case "Ten":
        $this->point = 10;
        break;
      case "Jack":
        $this->point = 10;
        break;
      case "Queen":
        $this->point = 10;
        break;
      case "King":
        $this->point = 10;
        break;
      case "Ace":
        $this->point = 1;
        break;
    }
  

  }
}

