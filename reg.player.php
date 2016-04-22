<?php

spl_autoload_register(function ($className) {
  include 'classes/' . $className . '.class.php';
});

session_start();

$playerName = $_GET["name"];

$str = file_get_contents("game.dat");
$table = unserialize($str);

$playerId = $table-> registerPlayer($playerName);
$_SESSION["id"] = $playerId;

// if ($id == NULL) {
//   echo "Inte välkommen";
// }else {
//   echo "välkommen ";
// }


echo json_encode($table -> players);


$tableserialized = serialize($table);
file_put_contents("game.dat", $tableserialized);

