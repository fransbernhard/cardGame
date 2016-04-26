
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


// a button to start the game
$("#btn-start-game").click(function(){
console.log("Now creating new table, new deck and a new game.....");
  $.getJSON("cards.php", function(data){
  	$('#area').html("");
		data.forEach(function(key){
			switch(key.suit){
				case "spades":
					console.log(key);
					$('#area').append('<ul><li class="spades"><img class="cardimg" src="' + key.filePath + '"></img></li></ul>');
					break;
				case "hearts":
					console.log(key);
					$('#area').append('<ul><li class="hearts"><img class="cardimg" src="' + key.filePath + '"></img></li></ul>');
					break;
				case "clubs":
					console.log(key);
					$('#area').append('<ul><li class="clubs"><img class="cardimg" src="' + key.filePath + '"></img></li></ul>');
					break;
				case "diamonds":
					console.log(key);
					$('#area').append('<ul><li class="diamonds"><img class="cardimg" src="' + key.filePath + '"></img></li></ul>');
					break;
				}
			}
		);
	});
});

// hides the button "start game" on click to prevent reloading page by mistake
$("#btn-start-game").click(function(){
	var button = $("#btn-start-game");
	button.hide();
});

// hides the "deck" until the game is started
var deckOfCards = $("#btntakecard");
deckOfCards.hide();

var discardPile = $("#btn-discard-pile");
discardPile.hide();

//shows all the buttons when game is started
$("#btn-start-game").click(function(){
	var newDeck = $("#btntakecard");
	var discardPile = $("#btn-discard-pile");
	newDeck.show();
	discardPile.show();
});

// makes a prompt so the player can register his/her name. 
$( "#btn-start-game" ).click(function() {
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

		console.log("Dealing out 5 cards to each player........");
		$.ajax({
				url: "dealOut.php",
				// success: function (response) { //response is value returned from php
			 	// $('section').empty().append(response); //appends the respons to section and clears it on every click
		  // }
		})

	$.getJSON("flipFirstCard.php", function(data){
  	$('#btn-discard-pile').html("");
		data.forEach(function(key){
			switch(key.suit){
				case "spades":
					console.log(key);
					$('#btn-discard-pile').append('<img class="cardimg" src="' + key.filePath + '"></img>');
					break;
				case "hearts":
					console.log(key);
					$('#btn-discard-pile').append('<img class="cardimg" src="' + key.filePath + '"></img>');
					break;
				case "clubs":
					console.log(key);
					$('#btn-discard-pile').append('<img class="cardimg" src="' + key.filePath + '"></img>');
					break;
				case "diamonds":
					console.log(key);
					$('#btn-discard-pile').append('<img class="cardimg" src="' + key.filePath + '"></img>');
					break;
			}
		});
	})


		$.getJSON("showHand.php", function(data){
  	$('section.show-the-cards').html("");
		data.forEach(function(key){
			switch(key.suit){
				case "spades":
					console.log(key);
					$('section.show-the-cards').append('<ul><li class="spades"><img class="cardimg" src="' + key.filePath + '"></img></li></ul>');
					break;
				case "hearts":
					console.log(key);
					$('section.show-the-cards').append('<ul><li class="hearts"><img class="cardimg" src="' + key.filePath + '"></img></li></ul>');
					break;
				case "clubs":
					console.log(key);
					$('section.show-the-cards').append('<ul><li class="clubs"><img class="cardimg" src="' + key.filePath + '"></img></li></ul>');
					break;
				case "diamonds":
					console.log(key);
					$('section.show-the-cards').append('<ul><li class="diamonds"><img class="cardimg" src="' + key.filePath + '"></img></li></ul>');
					break;
				}
			}
		);
	});
});


// adds a "button" in shape of a card to click when to take a card.
$('#btntakecard').click(function(){
	console.log("Taking a card from the deck........");
		$.ajax({
			url: "takeCard.php",
				success: function (response) { //response is value returned from php
			   $('section').empty().append(response); //appends the respons to section and clears it on every click
			  }
		});

		$.getJSON("showHand.php", function(data){
  	$('section.show-the-cards').html("");
		data.forEach(function(key){
			switch(key.suit){
				case "spades":
					console.log(key);
					$('section.show-the-cards').append('<ul><li class="spades"><img class="cardimg" src="' + key.filePath + '"></img></li></ul>');
					break;
				case "hearts":
					console.log(key);
					$('section.show-the-cards').append('<ul><li class="hearts"><img class="cardimg" src="' + key.filePath + '"></img></li></ul>');
					break;
				case "clubs":
					console.log(key);
					$('section.show-the-cards').append('<ul><li class="clubs"><img class="cardimg" src="' + key.filePath + '"></img></li></ul>');
					break;
				case "diamonds":
					console.log(key);
					$('section.show-the-cards').append('<ul><li class="diamonds"><img class="cardimg" src="' + key.filePath + '"></img></li></ul>');
					break;
				}
			}
		);
	});
});

// a simple reset-function with a confirm....
$("#btn-reset").click(function(){
	if (confirm('Are U sure you want to reset the game and loose all data?')) {
      location.reload(true);
   }
});



