<?php

  spl_autoload_register(function ($className) {
    include 'classes/' . $className . '.class.php';
  });

  session_start();

  $responseSuit = $_GET["suitOfEight"];

  $str = file_get_contents("game.dat");
  $table = unserialize($str);

  $table->laydownInDiscardPile($responseSuit);

  $tableserialized = serialize($table);
  file_put_contents("game.dat", $tableserialized);

?>
