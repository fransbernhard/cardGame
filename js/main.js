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
var deckOfCards = $("#btntakecard");
deckOfCards.hide();

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

// CLICK ON THE STARTBUTTON INITIATES THE GAME
$("#btn-start-game").click(function(){

	console.log("Now creating new table, new deck and a new game.....");
  $.getJSON("cards.php", function(data){
  	$('#area').html("");
		data.forEach(function(key){
			console.log(key);
			// $("#area").append('<img class="cardimg" src="' + key.filePath + '" id="' + key.id + '"></img>');
			appendCardElement("#area", key);
		});
	});
});

//:::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
// ----------------------------  ADDING PLAYERS TO GAME

// makes a prompt so the player can register his/her name.
$("#btn-join").click(function(){
	console.log("Adding a new player with a prompt........");
  var greeting = "What is your name?";

	function insertPlayerName() {
		var p = $('#submit').val();
		console.log("Shows a prompt to insert playername.");
		return prompt(greeting, p);
	}



	function addingplayerNameToGame() {
   	var p = insertPlayerName();
    $.ajax({
			url: "reg.player.php?name=" + p,
			success: function (response) {
				$('.welcome').append("Welcome " + p);
				console.log("Playername succesfully registered. Displaying: Welcome ", p + " on the screen.");
				}
		});
 	}

	addingplayerNameToGame();

	// hides the join-button after click
	var joinbutton = $("#btn-join");
	joinbutton.hide();

	// hides the button "start game" on click to prevent reloading page by mistake
 	var button = $("#btn-start-game");
	button.hide();

//shows all the buttons when game is started
	var newDeck = $("#btntakecard");
	var discardPile = $("#btn-discard-pile");
	newDeck.show();
	discardPile.show();

});

//:::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
// ---------------------------- DEALS OUT THE CARDS
$("#btn-deal-out").click(function(){
// Dealing out the cards.
	console.log("Dealing out 5 cards to each player........");
	$.ajax({
			url: "dealOut.php",
	});

	//hides the deal-out-button after click
	var dealoutbutton = $("#btn-deal-out");
	dealoutbutton.hide();

	//shows the
	$.getJSON("flipFirstCard.php", function(data){
  	$('#btn-discard-pile').html("");
		data.forEach(function(key){
			console.log(key.filePath);
			console.log("The first card in discardpile is:", key);
			appendCardElement("#btn-discard-pile", key);
			// $('#btn-discard-pile').append('<img class="cardimg" src="' + key.filePath + '" id="' + key.id + '"></img>');
		});
	});
});

//:::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
// ---------------------------- updating the hand to all players
setInterval(function(){
	$.getJSON("showHand.php", function(data){
  	$('section.show-the-cards').html("");
		data.forEach(function(key){
			console.log("Card in hand:",key);
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
	  	console.log("hejjjeeee", response);
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
	}

	if(suit !== undefined) {
		queryParams += "&suit=" + suit;
	}




	$.ajax({
		url: "layDownCard.php" + queryParams,
		success: function (response) {
			response = JSON.parse(response);
			// if(response.message === "EIGHT"){
				
		
			// } else if (response.message === "You can´t play this card") {
			// 	alert(response.message);
			// } else {
			// 	// alert(response.message);
			// }
		}
	});

	$.ajax({
		url: "checkWinner.php",
		success: function (response) { response = JSON.parse(response);
	  	if(response.message === "You won the game!!!"){
	  		alert(response.message);
	  	} 
	  }
	});


});






//:::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
// ---------------------------- updating the discardpile to all players
setInterval(function(){

$.getJSON("updateDiscardPile.php", function(data){
				$('#btn-discard-pile').html("");
				var i = 0;
				data.forEach(function(key){
					console.log(key);
					if(i === 0){
						console.log(i);
						appendCardElement("#btn-discard-pile", key);
						// $('#btn-discard-pile').append('<img class="cardimg" src="' + key.filePath + '" id="' + key.id + '"></img>');
						i++;
					}
				});
			});


}, 1000);


