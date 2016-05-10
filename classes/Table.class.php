<?php

  @session_start();

  spl_autoload_register(function ($className) {
      include 'classes/' . $className . '.class.php';
  });

  class Table {

    public $players = [];
    private $maxPlayers = 6;
    public $numberOfCards = 2;
    private $deck;
    public $fakeSuit = null;
    private $turn = 0;
    private $winner = false;

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
      if($this->turn == $_SESSION['id'] || $this->winner != false) {

        if ($indexCardObj->getPoint() == 50){
            array_unshift($this->deck->discardPile, $indexCardObj);
            $this->checkWinner();
            $this->updateTurn();
            return "EIGHT";
            // IF NONE ABOVE - UNSHIFT TO HAND
        } else if($this->fakeSuit != null) {

          if($this->fakeSuit == $indexCardObj->getSuit()){
            array_unshift($this->deck->discardPile, $indexCardObj);
            $this->fakeSuit = null;
            $this->checkWinner();
            $this->updateTurn();
            return "YES";
          }
          // echo php_error(json_encode($this->deck->discardPile[0]->getSuit()));
        } else {

          // IF CARD IS SAME FACE OR SAME SUIT - UNSHIFT TO DISCARDPILE
          if($indexCardObj->getSuit() == $this->deck->discardPile[0]->getSuit()||
            $indexCardObj->getFace() == $this->deck->discardPile[0]->getFace()) {
            array_unshift($this->deck->discardPile, $indexCardObj);
            $this->fakeSuit = null;
            $this->checkWinner();
            $this->updateTurn();
            // echo json_encode($this->deck->discardPile);
            return "YES";

            // IF CARD IS EIGHT - UNSHIFT TO DISCARDPILE
          }
        }
      }
      $this->getPlayer($_SESSION["id"])->updateHand($indexCardObj);
      return "You can´t play this card";
    }

    private function updateTurn(){
      if(count($this->players) == $this->turn+1) {
        $this->turn = 0;
      } else {
        $this->turn++;
      }
    }

    public function getTheDiscardPile() {
      return $this->deck->getDiscardPile();
    }

    public function getDiscardPile() {
      return $this->deck->getDiscardPile();
    }

    private function checkWinner(){
      //check if this players hand is empty
      foreach ($this->players as $index => $player) {
        if ($player->hand == []){
          $this->winner = $index;
        }
      }
    }

    public function getWinner(){
      return $this->winner;
    }

    public function setNewSuit($suit) {
      $this->fakeSuit = $suit;
    }

    public function getTurn() {
      return $this->turn;
    }

    public function getFakeSuit() {
      return $this->fakeSuit;
    }
  }

?>
