<?php

spl_autoload_register(function ($className) {
  include 'classes/' . $className . '.class.php';
});

session_start();

$playerName = $_GET["name"];

$str = file_get_contents("game.dat");
$table = unserialize($str);

// var_dump($table);



$id = $table-> registerPlayer($playerName);

if ($id == NULL) {
  echo "fuck off";
}

$_SESSION["table"] = $table;

// $table =  $_SESSION["table"];

// var_dump($table);
echo json_encode($table -> players);

// $table->getPlayer();


$tableserialized = serialize($table);
file_put_contents("game.dat", $tableserialized);

// var_dump($table);

