<?php

spl_autoload_register(function ($className) {
    include 'classes/' . $className . '.class.php';
  });

  session_start();

  $str = file_get_contents("game.dat");
  $table = unserialize($str);

  $table->returnJsonDiscardPile();
  
  
  $tableserialized = serialize($table);
  file_put_contents("game.dat", $tableserialized);

?>
