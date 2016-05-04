<?php

  @session_start();

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
      // array_push($this->players, new Player("Computer"));
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
      // return $this->deck->discardPile;
    }

    public function getPlayer($indexNumber){
      return $this->players[$indexNumber];
    }

    public function getDeck(){
      return $this->deck;
    }

    public function laydownInDiscardPile($indexCardObj){
      // IF CARD IS SAME FACE OR SAME SUIT - UNSHIFT TO DISCARDPILE
      if($indexCardObj->getSuit() == $this->deck->discardPile[0]->getSuit()||
        $indexCardObj->getFace() == $this->deck->discardPile[0]->getFace()) {
        array_unshift($this->deck->discardPile, $indexCardObj);
        // echo json_encode($this->deck->discardPile);
        return "YES";

      // IF CARD IS EIGHT - UNSHIFT TO DISCARDPILE
      } else if ($indexCardObj->getPoint() == 50){
        array_unshift($this->deck->discardPile, $indexCardObj);
        return "EIGHT";
        // IF NONE ABOVE - UNSHIFT TO HAND
      }
      $this->getPlayer($_SESSION["id"])->updateHand($indexCardObj);
      return "You can´t play this card";
    }

    public function getTheDiscardPile() {
      return $this->deck->getDiscardPile();
    }

    public function returnJsonDiscardPile() {
      $this->deck->returnDiscardPile();
    }

    public function checkWinner(){
      //check if this players hand is empty
      foreach ($this->players as $player) {
        if ($player->hand == []){
          return "You won the game!!!";
        } else {
          return "NOT WINNER";
        }
      }
      
    }

    public function checkTurn() {

    }
  }

?>
