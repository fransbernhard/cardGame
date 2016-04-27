<?php

spl_autoload_register(function ($className) {
    include 'classes/' . $className . '.class.php';
  });

  session_start();

  $playedCard = $_GET["id"];

  $str = file_get_contents("game.dat");
  $table = unserialize($str);

  $humanPlayer = $table->getPlayer($_SESSION["id"]);

  $indexCard = $humanPlayer -> takeCardFromHand($playedCard);

  $table -> layDownInDiscardPile($indexCard);


  $humanPlayer -> showHand();



  $tableserialized = serialize($table);
  file_put_contents("game.dat", $tableserialized);

?>
