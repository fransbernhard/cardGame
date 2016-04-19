<?php

session_start();

  spl_autoload_register(function ($className) {
  	include 'classes/' . $className . '.class.php';
  });

  $deck = new Deck();

  $_SESSION["deck"] = $deck;
  $deck->showDeck();
?>
