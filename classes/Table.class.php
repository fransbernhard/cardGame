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
    public $fakeSuit = null;
    private $turn = 0;
    private $winner = false;

    public function __construct(){
      $this->deck = new Deck;
      array_push($this->players, new Player("Computer"));
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
      $this->cpuMind();
      
    }

    public function flipFirstCard(){
      array_push($this->deck->discardPile, $this->deck->popCard());
      echo json_encode($this->deck->discardPile);
      // return $this->deck->discardPile;
    }

    public function getPlayer($indexNumber){
      return $this->players[$indexNumber];
    }

    public function getPlayers(){
      echo json_encode($this->players);
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
        $this->cpuMind();
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

   

    public function cpuMind() {   
      $cpu = $this->players[0];
      $topCard = $this->deck->getDiscardPile()[0];
      $resultCard = false;
      $hearts = [];
      $spades = [];
      $clubs = [];
      $diamonds = [];
      foreach ($cpu->getHand() as $card) {      
        if($card->getSuit() == "hearts"){
          array_push($hearts, $cpu->getOneCard());
        }else if($card->getSuit() == "spades"){
          array_push($spades, $cpu->getOneCard());
        }else if($card->getSuit() == "clubs"){
          array_push($clubs, $cpu->getOneCard());
        }else if($card->getSuit() == "diamonds"){
          array_push($diamonds, $cpu->getOneCard());
        }
      }

      foreach ($cpu->getHand() as $card) {
        if($resultCard == false){
          if($card->getPoint() == 50){            
            if(count($hearts)>count($spades) && count($hearts)>count($clubs) && count($hearts)>count($diamonds)){
              $this->fakeSuit = "hearts";
            }else if(count($spades)>count($hearts) && count($spades)>count($clubs) && count($spades)>count($diamonds)){
              $this->fakeSuit = "spades";
            }else if(count($clubs)>count($hearts) && count($clubs)>count($spades) && count($clubs)>count($diamonds)){
              $this->fakeSuit = "clubs";
            }else if(count($diamonds)>count($hearts) && count($diamonds)>count($spades) && count($diamonds)>count($clubs)){
              $this->fakeSuit = "diamonds";
            }else if(count($diamonds)==count($hearts)){
              $this->fakeSuit = "diamonds";
            }else if(count($spades)==count($hearts)){
              $this->fakeSuit = "spades";
            }else if(count($clubs)==count($hearts)){
              $this->fakeSuit = "clubs";
            }else if(count($clubs)==count($spades)){
              $this->fakeSuit = "spades";
            }else if(count($clubs)==count($diamonds)){
              $this->fakeSuit = "diamonds";
            }else if(count($clubs)==count($hearts)){
              $this->fakeSuit = "hearts";
            }else if(count($diamonds)==count($hearts)){
              $this->fakeSuit = "diamonds";
            }else if(count($diamonds)==count($spades)){
              $this->fakeSuit = "spades";
            }else if(count($diamonds)==count($clubs)){
              $this->fakeSuit = "clubs";
            }
            
            array_unshift($this->deck->discardPile, $card);
            $cpu->takeCardFromHand($card->getId());
            $resultCard = true;
            //choose suit
          }else if($this->fakeSuit != null){

            if($this->fakeSuit == $card->getSuit()){
              array_unshift($this->deck->discardPile, $card);
              $cpu->takeCardFromHand($card->getId());
              $resultCard = true;
            }

          }else if($card->getSuit() == $topCard->getSuit() || $card->getFace() == $topCard->getFace()){
            //lay down card of suit
            array_unshift($this->deck->discardPile, $card);
            $cpu->takeCardFromHand($card->getId());
            $this->fakeSuit = null;
            $resultCard = true;
          }
        }
      }
      if($resultCard == false){
        
        $cpu->takeCardFromDeck($this->deck);
      }
      $this->checkWinner();

      // if($cpu->getHand() == []){
      //   $this->winner = false;
      // }

      $this->turn = 1;

    }
  }

?>





