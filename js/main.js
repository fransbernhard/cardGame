
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

//prints out the rules on click
// var printtherules = $('span.print');
// printtherules.click(function(){
// 	print();
// });

//makes the content dissapear on click
content.click(function(){
	content.hide(600);
});


$("#btn").click(function(){
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

$("#btn").click(function(){
	var button = $("#btn");
	button.hide();
});


$('#btn2').click(function(){
	console.log("Taking a card from the deck........");
			$.ajax({
					url: "takeCard.php",
					success: function (response) { //response is value returned from php (for your example it's "bye bye"
				   $('section').empty().append(response); //appends the respons to section and clears it on every click (Mikael)
			  }
			});

    });

$('#btn3').click(function(){
	console.log("Dealing out 5 cards to each player........");
			$.ajax({
					url: "dealOut.php",
					success: function (response) { //response is value returned from php (for your example it's "bye bye"
				   $('section').empty().append(response); //appends the respons to section and clears it on every click (Mikael)
			  }
			});
    });


$('#btnregplayer').click(function(){
	console.log("Registering a player with an input field........");
	var p = $('#playername').val();
	console.log('working?', p);
	$.ajax({
		url: "reg.player.php?name=" + p,
		success: function (response) { 
			$('section').append(response);
			console.log("what up?", response);
		}
	});
});



// $( "#btn" ).click(function() {
//   prompt( "Handler for .click() called." );
// });


$( "#btn" ).click(function() {
	console.log("Adding a new player with a prompt........");
  var greeting = "What is your name?"; 
  
		function insertPlayerName() {
			var p = $('#submit').val();
			console.log("after #submit");
			return prompt(greeting, p);
			// console.log('working?', p);

			}

		function addingplayerNameToGame() {
     var p = insertPlayerName();
     alert("Hello " + p + " and welcome to this FANTASTIC game!!!! Press 'OK' to continue.");

     $.ajax({
				url: "reg.player.php?name=" + p,
				success: function (response) { 
				$('section').append(response);
				// console.log("what up?", response);
				// return prompt(greeting, p);
			}
			
		});
	 	}
   	
		addingplayerNameToGame();

		

});



