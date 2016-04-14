<?php

class Player {
   public $players = [];
   public $hand = [];


    public function __construct() {             // Creates and array of players
    $this->players = ["player1", "player2", "player3", "player4", "player5", "player6", "player7", "player8", "player9", "player10"];

    //        taken out after since we do not need to loop through. Possibly totally remove.
    // if (is_array($players) || is_object($players)){   // fixeds a failure error with the for each

    //     foreach ($players as $player) {
    //         $players[] = ["player"=>$player];
    //     }
    // }
}

    public function showPlayer() {    // Takes a random set of payers out of a shuffled group of players
        shuffle($this->players);      // Shuffles the array of players
        $rand_players = array_rand($this->players, 4);
        echo $this->players[$rand_players[0]] . "<br>";
        echo $this->players[$rand_players[1]] . "<br>";
        echo $this->players[$rand_players[2]] . "<br>";
        echo $this->players[$rand_players[3]] . "<br>";
    }
}

?>
