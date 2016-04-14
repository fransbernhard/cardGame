
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
  $.getJSON("cards.php", function(data){
  	// console.log(data);
		$('#area').html("");
		data.forEach(function(key){
			switch(key.suit){
				case "Spades":
					console.log(key);
					$('#area').append('<ul><li class="spades">' + key.face + ' of ' + key.suit + '</li></ul>');
					break;
				case "Hearts":
					console.log(key);
					$('#area').append('<ul><li class="hearts">' + key.face + ' of ' + key.suit + '</li></ul>');
					break;
				case "Clubs":
					console.log(key);
					$('#area').append('<ul><li class="clubs">' + key.face + ' of ' + key.suit + '</li></ul>');
					break;
				case "Diamonds":
					console.log(key);
					$('#area').append('<ul><li class="diamonds">' + key.face + ' of ' + key.suit + '</li></ul>');
					break;
				}
			}
		);
	});
});
