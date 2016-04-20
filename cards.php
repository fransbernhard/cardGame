<?php

session_start();

  spl_autoload_register(function ($className) {
  	include 'classes/' . $className . '.class.php';
  });

  $deck = new Deck();

   $table = new Table;

  $_SESSION["deck"] = $deck;
  $deck->showDeck();
?>
