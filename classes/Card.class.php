<?php

  class Card implements JsonSerializable {

    private $point;
    private $face;
    private $suit;
    private $filePath;
    private $id;

    function __construct($face, $suit, $id) {

      $this->face = $face;
      $this->suit = $suit;
      $this->id= $id;

      switch($face){
        case "Two":
          $this->filePath = "cards/2_of_" . $suit . ".png";
          $this->point = 2;
          break;
        case "Three":
          $this->filePath = "cards/3_of_" . $suit . ".png";
          $this->point = 3;
          break;
        case "Four":
          $this->filePath = "cards/4_of_" . $suit . ".png";
          $this->point = 4;
          break;
        case "Five":
          $this->filePath = "cards/5_of_" . $suit . ".png";
          $this->point = 5;
          break;
        case "Six":
          $this->filePath = "cards/6_of_" . $suit . ".png";
          $this->point = 6;
          break;
        case "Seven":
          $this->filePath = "cards/7_of_" . $suit . ".png";
          $this->point = 7;
          break;
        case "Eight":
          $this->filePath = "cards/8_of_" . $suit . ".png";
          $this->point = 50;
          break;
        case "Nine":
          $this->filePath = "cards/9_of_" . $suit . ".png";
          $this->point = 9;
          break;
        case "Ten":
          $this->filePath = "cards/10_of_" . $suit . ".png";
          $this->point = 10;
          break;
        case "Jack":
          $this->filePath = "cards/jack_of_" . $suit . ".png";
          $this->point = 10;
          break;
        case "Queen":
          $this->filePath = "cards/queen_of_" . $suit . ".png";
          $this->point = 10;
          break;
        case "King":
          $this->filePath = "cards/king_of_" . $suit . ".png";
          $this->point = 10;
          break;
        case "Ace":
          $this->filePath = "cards/ace_of_" . $suit . ".png";
          $this->point = 1;
          break;
      }
    }

    function jsonSerialize(){
      $v["id"] = $this->id;
      $v["suit"] = $this->suit;
      $v["face"] = $this->face;
      $v["point"] = $this->point;
      $v["filePath"] = $this->filePath;
      return $v;
    }

    function getId(){
      return $this->id;
    }

    function getSuit(){
      return $this->suit;
    }

    function getFace(){
      return $this->face;
    }

    function getPoint(){
      return $this->point;
    }


  }

?>
