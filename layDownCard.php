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

  if($indexCardObj == null){
    http_response_code(400);
  }else{
    
    $res["message"] = $table -> layDownInDiscardPile($indexCardObj);
    $res["discardpile"] = $humanPlayer -> getHand();
    echo json_encode($res);
    

    $tableserialized = serialize($table);
    file_put_contents("game.dat", $tableserialized);

  }

  

?>
