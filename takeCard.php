<?php
 
  spl_autoload_register(function ($className) {
    include 'classes/' . $className . '.class.php';
  });

  session_start();

  $str = file_get_contents("game.dat");
  $table = unserialize($str);

  $table = $_SESSION["table"];//when grabbing the session u need to change the pattern how u type it.
 
  $humanPlayer = $table->getPlayer(3); //selects the first player in the array
  // $player1->showPlayer();
  $humanPlayer->takeCardFromDeck($table->getDeck()); // takes a card from the deck and puts it in it´s own hand
  // var_dump($player1); 
  $humanPlayer->showHand();
  // $deck->showDeck();
  // var_dump($deck);
  $deck = $_SESSION["deck"];

  // $deck->showDeck();


    $tableserialized = serialize($table);
  file_put_contents("game.dat", $tableserialized);
  // var_dump($deck);

?>