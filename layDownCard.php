<?php

  spl_autoload_register(function ($className) {
    include 'classes/' . $className . '.class.php';
  });

  session_start();

  $playedCard = $_GET["id"];

  $str = file_get_contents("game.dat");
  $table = unserialize($str);
  $humanPlayer = $table->getPlayer($_SESSION["id"]);

  $indexCardObj = $humanPlayer -> takeCardFromHand($playedCard);

  if ($indexCardObj == null) { //INVALID CARD (CLICK)
    http_response_code(400);
  } else {
    $res["message"] = $table -> layDownInDiscardPile($indexCardObj);
    if ($res['message'] === "YES" || $res['message'] === "EIGHT"){
      $table->checkWinner($_SESSION["id"]);
    }
    // echo json_encode($res);
    return $res;
  }

  $tableserialized = serialize($table);
  file_put_contents("game.dat", $tableserialized);

?>
