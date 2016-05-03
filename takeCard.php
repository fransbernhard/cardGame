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

  error_log(json_encode($discardPile[0]));

  foreach ($humanPlayer->hand as $card) {

    error_log(json_encode($card));
    
    if($card->suit == $discardPile[0]->suit || $card->face == $discardPile[0]->face || $card->point == 50) {
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





    


   // takes a card from the deck and puts it in it´s own hand

    

  $tableserialized = serialize($table);
  file_put_contents("game.dat", $tableserialized);

?>
