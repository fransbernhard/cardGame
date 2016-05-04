<?php

  spl_autoload_register(function ($className) {
    include 'classes/' . $className . '.class.php';
  });

  session_start();

  $str = file_get_contents("game.dat");
  $table = unserialize($str);


  $humanPlayer = $table->getPlayer($_SESSION["id"]); //selects the first player in the array

  $discardPile = $table->getTheDiscardPile();



 
  $humanPlayer->takeCardFromDeck($table->getDeck());
  $humanPlayer->showHand();


  $tableserialized = serialize($table);
  file_put_contents("game.dat", $tableserialized);

?>
