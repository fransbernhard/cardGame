//:::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
//----------------------------- SOME VISUAL EFFECTS FOR THE HEADER AND RULES ----------------------

//defines and hides
var headerAuthors = $('h3.authors');
var authors = $('p.made-by');
authors.hide();

//shows the authors on click
headerAuthors.click(function(){
	authors.slideToggle();
	content.hide();
});

//defines and hides
var rulesHeadline = $('h3.rules');
var content = $('p.rules-content');
content.hide();

//shows the content (game rules) on click
rulesHeadline.click(function(){
	content.slideToggle(600);
	authors.hide();
});

//makes the content dissapear on click
content.click(function(){
	content.hide(600);
});

// hides the "deck" until the game is started
// var deckOfCards = $("#btntakecard");
// deckOfCards.hide();

var discardPile = $("#btn-discard-pile");
discardPile.hide();

function appendCardElement(element, key) {
	$(element).append('<img class="cardimg" src="' + key.filePath +
		'" id="' + key.id +
		'" data-point="' + key.point +
		'" ></img>');
}

//:::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
//----------------------------- STARTS THE GAME ----------------------

$(document).ready(function (){
	console.log("Now creating new table, new deck and a new game.....");
  $.getJSON("cards.php", function(data){
  	$('#area').html("");
		data.forEach(function(key){
			appendCardElement("#area", key);
		});
	});
});

//:::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
// ----------------------------  ADDING PLAYERS TO GAME

// makes a prompt so the player can register his/her name.
var p;

$("#btn-join").click(function(){
	console.log("Adding a new player with a prompt........");
  var greeting = "Please type your name.";

	function insertPlayerName(){
		var p = $('#submit').val();
		return prompt(greeting, p);
	}

	function addingplayerNameToGame(){
   	p = insertPlayerName();
    $.ajax({
			url: "reg.player.php?name=" + p,
			success: function (response) {
				// $('.welcome').append("Welcome " + p);
			}
		});
 	}

	addingplayerNameToGame();

	// hides the join-button after click
	var join = $("#btn-join");
	join.hide();

	//shows the discardpile when game is started
	var discardPile = $("#btn-discard-pile");
	discardPile.show();

});

//:::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
// ---------------------------- DEALS OUT THE CARDS
$("#btn-deal-out").click(function(){


		$.getJSON("flipFirstCard.php", function(data){
  	$('#btn-discard-pile').html("");
		data.forEach(function(key){
			console.log(key.filePath);
			console.log("The first card in discardpile is:", key);
			appendCardElement("#btn-discard-pile", key);
		});
	});
// Dealing out the cards.
	console.log("Dealing out 5 cards to each player........");
	$.ajax({
			url: "dealOut.php",
	});

	//hides the deal-out-button
	var dealout = $("#btn-deal-out");
	dealout.hide();

	//shows the

});

//:::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
// ---------------------------- updating the hand to all players
setInterval(function(){
	$.getJSON("showHand.php", function(data){
  	$('section.show-the-cards').html("");
		data.forEach(function(key){
			// console.log("Card in hand:",key);
			appendCardElement("section.show-the-cards", key);
			// $('section.show-the-cards').append('<img class="cardimg" src="' + key.filePath + '" id="' + key.id + '"></img>');
		});
	});
}, 1000);

//:::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
// ---------------------------- clickfunction take card from deck
$('#btntakecard').click(function(){
	console.log("Taking a card from the deck........");
	$.ajax({
		url: "takeCard.php",
		success: function (response) { //response is value returned from php
	  	// $('section').empty().append(response); //appends the respons to section and clears it on every click
	  	// console.log("hejjjeeee", response);
	  }
	});
});

//:::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
// ------------------------------ a simple reset-function on bottom of page with a confirm....
$("#btn-reset").click(function(){
	if (confirm('Are U sure you want to reset the game and loose all data?')) {
  	location.reload(true);
  }
});

//:::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
// -------------------------------- on click, lay down card into discard pile
$("section").click(function(ev){
	var c =  event.target.id;
	console.log("You clicked on the card with id:", c);

	var suit;
	var queryParams = "?id=" + c;

	if(event.target.dataset.point == 50){
		suit = prompt("choose your suit", "");
		// $("#playedsuit").append(suit);
	}

	if(suit !== undefined) {
		queryParams += "&suit=" + suit;
	}

	$("#playedsuit").html("");

	$.ajax({
		url: "layDownCard.php" + queryParams,
		success: function (response) {
			response = JSON.parse(response);
			// if(response.message === "EIGHT"){
			if (response.message === "You can´t play this card") {
				alert(response.message);
			}
		}
	});
});


//:::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
// ---------------------------- updating the discardpile to all players
setInterval(function(){
	$.getJSON("updateTableState.php", function(data){
		$('#btn-discard-pile').html("");
		var i = 0;
		if(data.winner != false){
			console.log(data.winner);
			// $('.greentable').html("");		
			// $('.greentable').append("GAME OVER");

			if(data.winner == p){
				$('.greentable').html("");		
				$('.greentable').append("<h1>You won the game!!!!!!!</h1>");
			} else {
				$('.greentable').html("");		
				$('.greentable').append("<h1>GAME OVER</h1>");
			}
		}
		
		if(data.getTurn == true){
			$('.whos-turn').html("");
			$('.whos-turn').append("It´s your turn to play!").css({'background': 'green'});
		}
		if(data.getTurn == false){
			$('.whos-turn').html("");
			$('.whos-turn').append("It´s <b>NOT</b> your turn.").css({'background': 'red'});
		}
		data.discardPile.forEach(function(key){
			if(i === 0){
				appendCardElement("#btn-discard-pile", key);
				i++;
			}

			$("#playedsuit").html("");
			if(data.suit != null){
				if(data.suit[0] == "s"){
					$("#playedsuit").append("Play a spade");
				}else if(data.suit[0] == "h"){
					$("#playedsuit").append("Play a heart");
				}else if(data.suit[0] == "c"){
					$("#playedsuit").append("Play a club");
				}else if(data.suit[0] == "d" ){
					$("#playedsuit").append("Play a diamond");
				}
			}
		});
	});

	$.getJSON("showPlayers.php", function(data){
  	var playerNames = "";

  	data.forEach(function(key){
			playerNames += " " + key.name + "<br>";
		})
  	$('.whos-playing').html(playerNames);
	});

}, 1000);
