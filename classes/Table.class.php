<?php

  session_start();

  spl_autoload_register(function ($className) {
      include 'classes/' . $className . '.class.php';
  });

  class Table {

    public $players = [];
    private $maxPlayers = 6;
    public $numberOfCards = 5;
    private $deck;

    public function __construct(){
      $this->deck = new Deck;
      array_push($this->players, new Player("Computer 1"));
      array_push($this->players, new Player("Computer 2"));
      array_push($this->players, new Player("Computer 3"));
    }

    public function registerPlayer($name) {
      $p = new Player($name);
      if(count($this->players) < $this->maxPlayers){
         $id = array_push($this->players, $p) - 1;
         return $id;
      } else {
        return false;
      }
    }

    public function dealOut(){
      for($i = 0; $i<$this->numberOfCards; $i++){
        foreach ($this ->players as $player) {
          array_push($player->hand,$this->deck->popCard());
        }
      }
      echo json_encode($this);
    }

    public function flipFirstCard(){
      array_push($this->deck->discardPile, $this->deck->popCard());
      echo json_encode($this->deck->discardPile);
    }

    public function getPlayer($indexNumber){
      return $this -> players[$indexNumber];
    }

    public function getDeck(){
      return $this->deck;
    }

  }

// public function dealCards(){
//   for($i = 0; $i <count($this->hand); $i++){
//     foreach ($this->players as $player) {
//       array_push($this->hand,$deck->popCard());
//       print_r($this->hand[$i]);
//     }
//   }
// }

// public function showPlayer() {    // Takes a random set of payers out of a shuffled group of players
//     // shuffle($this->players);      // Shuffles the array of players
//     for($i=0; $i<$this->players; $i++) {
//         echo $this->players->toString() . "<br>";
//         // echo $this->players[$i] . "<br>";
//     }
// }

?>
