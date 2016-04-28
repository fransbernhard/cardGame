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

    public function laydownInDiscardPile($indexCardObj){
      // IF CARD IS SAME FACE OR SAME SUIT - UNSHIFT TO DISCARDPILE
      if($indexCardObj->suit == $this->deck->discardPile[0]->suit||
        $indexCardObj->face == $this->deck->discardPile[0]->face){
        array_unshift($this->deck->discardPile, $indexCardObj);
        // echo json_encode($this->deck->discardPile);
        return "YES";

      // IF CARD IS EIGHT - UNSHIFT TO DISCARDPILE
      } else if ($indexCardObj->point == 50){
        array_unshift($this->deck->discardPile, $indexCardObj);
        return "EIGHT";
        // IF NONE ABOVE - UNSHIFT TO HAND
      }
      $this->getPlayer($_SESSION["id"])->updateHand($indexCardObj);
      return "NO";
    }

    public function showDiscardPile() {
      $this->deck->returnDiscardPile();
    }

    public function checkWinner($sessionId){
      // check if this players hand is empty
      // if ($this->)
    }

    //::::::::::::::1. HAND IS EMPTY PLAYER WON
    //  if ($this->hand >= 0){ //1. Hand is empty - player won
    //    echo "Player Won!"
    //  }

    //:::::::::::::2. TAKE NEW CARD
    // else if ($card != $suit->topCard || $face->topCard || "8"->topCard) {
    //    echo "Take New Card";
    //  }

    //:::::::::::::3. LAY DOWN 8 AND CHOOSE SUIT
    // else if ($card == "8") {
    //    array_splice($this->discardPile, $this->hand)
    //    return $suit;
    //  }

    //::::::::::::4. SAME SUIT
    // else if ($card == $suit->topCard){

          //::::::::::::::5. DOUBLE CARD DRAW
    //    if ($card == $face->hand){
    //      array_splice($this->discardPile, $this->hand) //with the lowest index, sort desc
    //    }

    //    array_splice($this->discardPile, $this->hand)
    // }

    //::::::::::::::6. SAME FACE
    // else if ($card == $face->topCard){
    //   array_splice($this->discardPile, $this->hand)
    // }

  }

?>
