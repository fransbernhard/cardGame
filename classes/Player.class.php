<?php
session_start();

class Player {
   public $hand = [];
   public $name;


   function __construct($name) {
      $this->name = $name;
   }

    // public function layDownCard(){
    //   $this->hand;    // Hard coded numbers represent cards. Will get from deal function
    //   array_shift($this->hand);            // Shift the first "card" out
    // }

    public function takeCardFromDeck() {
      // echo "takeCardFromDeck ";
      $deck = $_SESSION["deck"];
      // var_dump($deck);
      array_push($this->hand,$deck->popCard());
    }
      public function showHand(){
      for($i=0; $i<count($this->hand); $i++){  // loops through to get the remaining "cards"
        print_r($this->hand[$i]);                // echos out what remains in the hand array
          }
      }


    // public function showHand(){
    //   for($i=0; $i<count($this->hand); $i++){  // loops through to get the remaining "cards"
    //     $this->hand[$i];    
    //     foreach ($hand as $card) {
    //       echo $card;      # code...
    //     }             // echos out what remains in the hand array
    //   }
    // }
}

?>


