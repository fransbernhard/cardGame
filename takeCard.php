<?php

  spl_autoload_register(function ($className) {
    include 'classes/' . $className . '.class.php';
  });

  session_start();

  $str = file_get_contents("game.dat");
  $table = unserialize($str);


  $humanPlayer = $table->getPlayer($_SESSION["id"]); //selects the first player in the array

  $discardPile = $table->getTheDiscardPile();

  $allowToTake= true;

  // error_log(json_encode($discardPile[0]));

  foreach ($humanPlayer->hand as $card) {

    // error_log(json_encode($card));

    if($card->getSuit() == $discardPile[0]->getSuit() || $card->getFace() == $discardPile[0]->getFace() || $card->getPoint() == 50) {
      error_log("false god dammit");
      $allowToTake = false;
    }
  }

  if ($allowToTake === true) {
    $humanPlayer->takeCardFromDeck($table->getDeck());
    $humanPlayer->showHand();
  } else {
    echo json_encode();
  }

  $tableserialized = serialize($table);
  file_put_contents("game.dat", $tableserialized);

?>
