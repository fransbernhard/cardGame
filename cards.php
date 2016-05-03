<?php

  session_start();

  spl_autoload_register(function ($className) {
    include 'classes/' . $className . '.class.php';
  });

  $table = new Table;
  // var_dump($table);

  //---------------------------------serializing
  $tableserialized = serialize($table);
  file_put_contents("game.dat", $tableserialized);

?>
