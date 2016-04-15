<?php

class Table {
    public $players[];

    public function __construct($numberofplayers = 4) {
        for($i = 0; $i < $numberofplayers; $i++){
                 $this->players[] = new Player;

        }

    }

    public function showPlayer() {    // Takes a random set of payers out of a shuffled group of players
        shuffle($this->players);      // Shuffles the array of players
        $rand_players = array_rand($this->players, 4);
        foreach ($this->players as $player ) {
            echo $player->toString() . "<br>";
        }
    }
}

?>
