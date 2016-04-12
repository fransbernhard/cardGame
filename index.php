<?php
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
	<header>
		<h1>The Best CardGame Ever !!</h1>
		<h3 class="authors">Click here to see the authors.</h3>

			<p class="made-by">Mimi, Rickard, BamBam, Mikael</p>

		<h3 class="rules">Don´t know how to play the game? Click here to read the rules.</h3>
		
				<p class="rules-content"  title="Click anywhere to hide the rules">
					<img class="rules-picture" src="imgs/eight.png">
				The player to the dealer’s left must play a card that is either the same suit or the same rank as the single face up card or an eight of any suit, which acts as a wild card. For example, if the face up card is a ten of diamonds, the player may play a ten of another suit or any diamond. <br><br> If the player cannot play either of these two cards, another option is for the player to play an eight which has the ability to change the suit to whatever that player announces. The next player would then have to play a card from the suit the player who played the 8 announced. 
				<br><br>
				If the player has neither a card with the same rank or suit nor an eight, the player must draw cards from the facedown deck until drawing a playable card, at which point the player can play that card. Once the player has played a card on the face up pile, that player’s turn has ended, and the player to that player’s left goes. If a player draws all the remaining cards from the facedown deck and still cannot play a card, that player can say pass, and his or her turn is finished. 
				<br><br>
				Play continues until a player has discarded all of her or his cards, and the cards remaining in the other players’ hands count as points for the winning player. Similarly, if all cards have been drawn from the facedown deck, and no player can make a legal play, the game also ends. One variant is to allow the pile of face-up cards to be shuffled and turned face down in the event that the original face down stock pile has been exhausted. In this case, no player can ever pass but must keep drawing cards until a playable card has been pulled. 
				<br><br>
				<span class="print" title="Click here to print out the rules">Print out the rules -> click here</span></p>
	</header>
	<section>
		<p>
			<?php
			
				$h4 = new Heart (4);
				echo $h4->showCard();

				$s8 = new Spade (8);
				echo $s8->showCard();

				$d6 = new Diamond (6);
				echo $d6->showCard();

				$c6 = new Club (9);
				echo $c6->showCard();

				$deck1 = new Deck();
				echo $deck1->showDeck();
				var_dump($deck1);

			?>
		</p>
	</section>
</div>

<!--javascript libraries -->
<script src="js/jquery.js"></script>
<script src="js/main.js"></script>
</body>
</html>