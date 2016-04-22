<?php
session_start();



class Player {
  //  $tableserialized = serialize($table);
  // file_put_contents("game.dat", $tableserialized);



  public $hand = [];
  public $name;
  // public $deck = $table->deck;


  function __construct($name) {
    $this->name = $name;
  }

  public function layDownCard(){
    $this->hand = [];    // Hard coded numbers represent cards. Will get from deal function
    array_shift($this->hand);            // Shift the first "card" out
  }

  public function takeCardFromDeck($deck) {
  //         $str = file_get_contents("game.dat");
  // $table = unserialize($str);
    array_push($this->hand,$deck->popCard());
    // echo $this->hand[$i];
 
  }

  public function showHand(){
    for($i=0; $i<count($this->hand); $i++){  // loops through to get the remaining "cards"
      print_r($this->hand[$i]);                // echos out what remains in the hand array
    }
  }
}



?>
