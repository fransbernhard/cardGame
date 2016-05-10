<?php

  spl_autoload_register(function ($className) {
    include 'classes/' . $className . '.class.php';
  });

  session_start();

  $str = file_get_contents("game.dat");
  $table = unserialize($str);

  $result["discardPile"] = $table->getDiscardPile();
  $result["suit"] = $table->getFakeSuit();
  $result["getTurn"] = $table->getTurn() == $_SESSION["id"];
  $result["winner"] = $table->getWinner() === $_SESSION['id'];

  $winnerId = $table->getWinner();

  if($winnerId != null){
    $result["winner"] = $table->getPlayer($winnerId)->getName();
  }

  echo json_encode($result);


  $tableserialized = serialize($table);
  file_put_contents("game.dat", $tableserialized);

?>
