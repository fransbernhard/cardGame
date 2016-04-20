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
        // shuffle($this->players);      // Shuffles the array of players
        for($i=0; $i<$this->players; $i++) {
            echo $this->players->toString() . "<br>";
            // echo $this->players[$i] . "<br>";
        }
    }



    // public function dealOut($players){
    //     for($i = 0; $i<=$this->numberOfCards; $i++){
    //     foreach ($players as $player) {
    //         array_push($player->hand,$deck->popCard());
    //     }
    // }


    //     return $this->deck;
    // }

    public function dealCards(){
        for($i = 0; $i <count($this->hand); $i++){
            foreach ($this->players as $player) {
                array_push($this->hand,$deck->popCard());
                print_r($this->hand[$i]);
            }
        }
    }
    public function getPlayer($indexNumber){
       return $this -> players[$indexNumber];
    }



}



?>
