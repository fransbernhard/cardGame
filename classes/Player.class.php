<?php

class Player {
   public $players = [];
   public $hand = [];


    public function __construct() {             // Creates and array of players
    $this->players = ["player1", "player2", "player3", "player4", "player5", "player6", "player7", "player8", "player9", "player10"];                    // Hard coded players in. Possbly make a create player function

}
    public function showPlayer() {    // Takes a random set of payers out of a shuffled group of players
        shuffle($this->players);      // Shuffles the array of players
        $rand_players = array_rand($this->players, 4);
        echo $this->players[$rand_players[0]] . "<br>";
        echo $this->players[$rand_players[1]] . "<br>";
        echo $this->players[$rand_players[2]] . "<br>";
        echo $this->players[$rand_players[3]] . "<br>";
    }

    public function layDownCard(){
        $this->hand = [1, 2, 3, 4, 5, 6];    // Hard coded numbers represent cards. Will get from deal function
        array_shift($this->hand);            // Shift the first "card" out
    for($i=0; $i<count($this->hand); $i++){  // loops through to get the remaining "cards"
       echo $this->hand[$i];                 // echos out what remains in the hand array
    }
  }
}

?>
