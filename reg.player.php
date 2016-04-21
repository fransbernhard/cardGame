<?php

spl_autoload_register(function ($className) {
  include 'classes/' . $className . '.class.php';
});

session_start();

$player = $_GET["name"];

$str = file_get_contents("game.dat");
$table = unserialize($str);



$id = $table-> registerPlayer($player);

$table =  $_SESSION["table"];

var_dump($table);


$tableserialized = serialize($table);
file_put_contents("game.dat", $tableserialized);

// var_dump($table);

