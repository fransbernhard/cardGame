
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
  	 console.log(data);
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

$('#btn2').click(function(){
			$.ajax({
					url: "takeCard.php",
					success: function (response) { //response is value returned from php (for your example it's "bye bye"
				   $('section').empty().append(response); //appends the respons to section and clears it on every click (Mikael)
			  }
			});

    });

