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

    public function laydownInDiscardPile($indexCard){
        array_push($this->deck->discardPile, $indexCard);
        echo json_encode($this->deck->discardPile);
    }

    public function showDiscardPile() {
      $this->deck->returnDiscardPile();
    }

    //trigger: player press card
    //  function draw(){
    //   foreach ($this->players as $player) {
    //     $hand = $player->displayCardsInHand(); //array with playersn hand
    //   }

    // }

    //   $card;

    //  if ($this->hand >= 0){ //1. Hand is empty - player won
    //    echo "Player Won!"
    //  } else if ($card != $suit->topCard || $face->topCard || "8"->topCard) { //2. TAKE NEW CARD
    //    echo "Take New Card";
    //  } else if ($card == "8") {            //3. LAY DOWN 8 AND CHOOSE SUIT
    //    array_splice($this->discardPile, $this->hand)
    //    return $suit;
    //  } else if ($card == $suit->topCard){ //4. SAME SUIT
    //    if ($card == $face->hand){         //5. SAME SUIT & SAME FACE
    //      array_splice($this->discardPile, $this->hand) //with the lowest index, sort desc
    //    }
    //    array_splice($this->discardPile, $this->hand)
    // } else if ($card == $face->topCard){  //6. SAME FACE
    //   array_splice($this->discardPile, $this->hand)
    // }

  }

?>
