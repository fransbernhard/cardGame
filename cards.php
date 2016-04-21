<?php

session_start();

  spl_autoload_register(function ($className) {
  	include 'classes/' . $className . '.class.php';
  });


  $str = file_get_contents("game.dat");
$table = unserialize($str);




  $_SESSION["deck"] = $deck;
  $table -> showDeck();
?>
