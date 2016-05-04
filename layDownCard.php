<?php

  spl_autoload_register(function ($className) {
    include 'classes/' . $className . '.class.php';
  });

  session_start();

  $playedCardID = $_GET["id"];
  $suit = $_GET["suit"];

  $str = file_get_contents("game.dat");
  $table = unserialize($str);
  $humanPlayer = $table->getPlayer($_SESSION["id"]);

  $indexCardObj = $humanPlayer -> takeCardFromHand($playedCardID);

  if ($indexCardObj == null) { //INVALID CARD (CLICK)
    http_response_code(400);
  } else {
    $res["message"] = $table -> layDownInDiscardPile($indexCardObj); // kolla även om någon annan suit än vad som ligger där
    if ($res['message'] === "YES" || $res['message'] === "EIGHT"){
      $table->checkWinner($_SESSION["id"]);
    }

    if(isset($suit) == true && $res['message'] === 'EIGHT') {
      //$table->setNewSuit($suit);
    }


    echo json_encode($res);
    // return $res;
  }

  $tableserialized = serialize($table);
  file_put_contents("game.dat", $tableserialized);

?>
