<?php
session_start();

  spl_autoload_register(function ($className) {
    include 'classes/' . $className . '.class.php';
  });


$table = new Table;

//---------------------------------serializing
$tableserialized = serialize($table);
file_put_contents("game.dat", $tableserialized);
// echo $tableserialized;


$str = file_get_contents("game.dat");
$table = unserialize($str);

// var_dump($table);
  $table -> showDeck();
  // $_SESSION["deck"] = $deck;

?>


  


    

