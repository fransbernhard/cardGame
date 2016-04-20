<?php
// session_start();

spl_autoload_register(function ($className) {
	include 'classes/' . $className . '.class.php';
});
?>

<!DOCTYPE html>
<html>
	<head>
		<title></title>
		<link rel="stylesheet" type="text/css" href="css/style.css" />
		<link rel="stylesheet" type="text/css" href="css/normalize.css" />
		<link href='https://fonts.googleapis.com/css?family=Unica+One' rel='stylesheet' type='text/css'>
		<link href='https://fonts.googleapis.com/css?family=Vollkorn:400,400italic' rel='stylesheet' type='text/css'>
	</head>
	<body>
		<div class="wrapper">
			<header id="top">
				<h1>The Best CardGame Ever !!</h1>
				<h3 class="authors">Click here to see the authors.</h3>
				<p class="made-by">
					<img class="profile-pictures" src="imgs/mimi.png">
					<img class="profile-pictures" src="imgs/rick.png">
					<img class="profile-pictures" src="imgs/me.jpg">
					<img class="profile-pictures" src="imgs/bambam.jpg">
				</p>
					<h3 class="rules">Don´t know how to play the game? Click here to read the rules.</h3>

						<p class="rules-content"  title="Click anywhere to hide the rules">
							<img class="rules-picture" src="imgs/eight.png">
						<b>SWEDISH RUMMY</b><br>
						Swedish Rummy falls into the shredding category of card games. Oddly enough it was not invented by the Swedish nor is it technically a form of rummy, having more in common with internationally popular games such as Uno, Crazy Eights, Crates, and Switch. Ask any Swede how to play and they will probably give you a look of confusion. The basic form of the game actually developed in Venezuela.
						<br><br><b>THE DECK AND DEAL:</b><br>
						Swedish Rummy uses a standard 52 card deck if played with six or fewer players but with two decks for a total of 104 cards if played with seven or more players. Players are dealt one card a piece until each player has seven cards. The deal and play of the game go clockwise. Once finished dealing, the dealer puts the remaining deck on the table face down in the center and turns the top card face up.
						<br><br><b>HOW TO PLAY:</b><br>
						The player to the dealer’s left must play a card that is either the same suit or the same rank as the single face up card or an eight of any suit, which acts as a wild card. For example, if the face up card is a ten of diamonds, the player may play a ten of another suit or any diamond. <br><br> If the player cannot play either of these two cards, another option is for the player to play an eight which has the ability to change the suit to whatever that player announces. The next player would then have to play a card from the suit the player who played the 8 announced.
						<br><br>
						If the player has neither a card with the same rank or suit nor an eight, the player must draw cards from the facedown deck until drawing a playable card, at which point the player can play that card. Once the player has played a card on the face up pile, that player’s turn has ended, and the player to that player’s left goes. If a player draws all the remaining cards from the facedown deck and still cannot play a card, that player can say pass, and his or her turn is finished.
						<br><br>
						Play continues until a player has discarded all of her or his cards, and the cards remaining in the other players’ hands count as points for the winning player. Similarly, if all cards have been drawn from the facedown deck, and no player can make a legal play, the game also ends. One variant is to allow the pile of face-up cards to be shuffled and turned face down in the event that the original face down stock pile has been exhausted. In this case, no player can ever pass but must keep drawing cards until a playable card has been pulled.
						<br><br>
						<b>HOW TO SCORE:</b><br>

						The standard way of scoring is to count all the cards remaining in opponents’ hands once a player has played his or her last card. Here is the way to score each card:
						<br>
						King, Queen, Jack, Ten all count for 10 points each.
						<br>
						Aces count for 1 point each.
						<br>
						All numbered cards 2-9 (excluding 8’s) count the same number of points as their rank (a 2 of Clubs counts 2 points, a 6 of Hearts counts 6 points, etc.)
						<br>
						Any 8’s remaining in a player’s hand count as 50 points.
						<br>
						The game ends when a player reaches 100 points, although this can be adjusted according to the number of players you have and the types of rule variants you are playing with.
						<br>
						The more players you have the higher the winning score should be. One way to accomplish this is to multiply the number of players you have by 50, and the first player who gets to that score wins. For example, if you are playing with 6 players, you may want to play to 300.
						<br>
						If you are playing with any of the variants listed below, you may wish to multiply the number of players by 100 instead of 50 to make up for the variation in scoring. In that case, 6 players would play until the winning player reaches 600 points.<br><br>
						<span class="got-it" title="OK, I got it. Let´s play....">OK, I got it. Let´s play....</span></p>
				</header>
<!-- 		<button id="btn">Make a new deck (shuffled)</button> -->
		<button id="btn2">Take new card</button>
		<div id="area">

		<?php


		$table = new Table;

		//---------------------------------serializing
		$tableserialized = serialize($table);
		file_put_contents("test.txt", $tableserialized);
		echo $tableserialized;
	
		$content = file_get_contents("test.txt");
		$unserialized = unserialize($content);
		$unserialized-> makePlayers();

		var_dump($unserialized);

		$_SESSION["table"] = $unserialized;

		//---------------------------------serializing

		
		?>
		</div>
	<section><br><br>

	</section>
</div>


		<!--javascript libraries -->
		<script src="js/jquery.js"></script>
		<script src="js/main.js"></script>
	</body>
</html>
