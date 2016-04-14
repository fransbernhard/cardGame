
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

// $.ajax({
//   dataType: "json",
//   url: 'cards.php',
//   data: data,
//   success: function(result){
//         $("#section").html(result);
//     }});
// });

$("#btn").click(function(){
  $.getJSON("cards.php", function(data){
  	// console.log(data);
		data.forEach(function(key){
			if (key.suit == "Spades"){
				console.log(key);
				$('body').append('<ul><li>' + key.face + ' of ' + key.suit + '</li></ul>');
			}
		});
	});
});
