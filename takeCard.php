<?php
 
  spl_autoload_register(function ($className) {
    include 'classes/' . $className . '.class.php';
  });

  session_start();

  $str = file_get_contents("game.dat");
  $table = unserialize($str);

  $table = $_SESSION["table"];//when grabbing the session u need to change the pattern how u type it.
 
  $player1 = $table->getPlayer(0); //selects the first player in the array
  // $player1->showPlayer();
  $player1->takeCardFromDeck(); // takes a card from the deck and puts it in it´s own hand
  // var_dump($player1); 
  $player1->showHand();
  // $deck->showDeck();
  // var_dump($deck);
  $deck = $_SESSION["deck"];

  // $deck->showDeck();

  // var_dump($deck);

?>