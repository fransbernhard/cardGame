<?php
 
  spl_autoload_register(function ($className) {
    include 'classes/' . $className . '.class.php';
  });

  session_start();





  $table = $_SESSION["table"];//when grabbing the session u need to change the pattern how u type it.
  // error_log(json_encode($table));
  var_dump($table);
  
  
  $player = $table->getPlayer(2);
  echo "hej";
  $player->takeCardFromDeck();

  $deck = $_SESSION["deck"];

  $deck->showDeck();

  var_dump($deck);

?>