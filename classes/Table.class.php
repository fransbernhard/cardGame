<?php
session_start();

spl_autoload_register(function ($className) {
    include 'classes/' . $className . '.class.php';
});

class Table {

    public $players = [];
    private $maxPlayers = 6; 

    private $deck;

    public function __construct(){
        $this->deck = new Deck;
    }
    
    public function registerPlayer($name) {  

        $p = new Player($name);
        if(count($this->players) <= $this->maxPlayers){
           $id = array_push($this->players, $p) - 1; 
        }else{
            return false;
        }
        return $id;
    }
        
  public function dealOut($players){
    for($i = 0; $i<=$this->numberOfCards; $i++){
      foreach ($players as $player) {
        array_push($player->hand,$deck->popCard());
      }
    }
    return $this->deck;
  }

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

    public function showDeck(){
        $this->deck->deckShuffle();
    }
}







    // public function showPlayer() {    // Takes a random set of payers out of a shuffled group of players
    //     // shuffle($this->players);      // Shuffles the array of players
    //     for($i=0; $i<$this->players; $i++) {
    //         echo $this->players->toString() . "<br>";
    //         // echo $this->players[$i] . "<br>";
    //     }
    // }



?>
