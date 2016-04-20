<?php
session_start();

class Table {
    public $players = [];
    // private $deck = new Deck;

    public $numberofplayers = 4;

    public function makePlayers() {
       for($i = 0; $i < $this->numberofplayers; $i++) {
           array_push($this->players, new Player($i));
       }
    }


    public function showPlayer() {    // Takes a random set of payers out of a shuffled group of players
        shuffle($this->players);      // Shuffles the array of players
        $rand_players = array_rand(0, 4);
        foreach ($this->players as $player ) {
            // echo $player->toString() . "<br>";
        }
    }

    // public function dealCards(){
    //     for($i = 0; $i <count($this->players->hand); $i++){
    //         foreach ($players as $player) {
                
    //         }
    //     }
    // }
    // public function dealOut($players){
    //     for($i = 0; $i<=$this->numberOfCards; $i++){
    //     foreach ($players as $player) {
    //         array_push($player->hand,$deck->popCard());
    //     }
    // }


    //     return $this->deck;
    // }

    public function getPlayer($indexNumber){
       return $this -> players[$indexNumber];
    }



}



?>
