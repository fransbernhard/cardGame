<?php

class Deck {
	public $d2;
	public $d3;
	public $d4;
	public $d5;
	public $d6;
	public $d7;
	public $d8;
	public $d9;
	public $d10;
	public $d11;
	public $d12;
	public $d13;
	public $d14;
	public $s2;
	public $s3;
	public $s4;
	public $s5;
	public $s6;
	public $s7;
	public $s8;
	public $s9;
	public $s10;
	public $s11;
	public $s12;
	public $s13;
	public $s14;
	public $h2;
	public $h3;
	public $h4;
	public $h5;
	public $h6;
	public $h7;
	public $h8;
	public $h9;
	public $h10;
	public $h11;
	public $h12;
	public $h13;
	public $h14;
	public $c2;
	public $c3;
	public $c4;
	public $c5;
	public $c6;
	public $c7;
	public $c8;
	public $c9;
	public $c10;
	public $c11;
	public $c12;
	public $c13;
	public $c14;


	function __construct() {
    $this->deckOfCards = 52;
    $this->cardsInDeck = [];

    // for ($i=0; $i < $this->deckOfCards; $i++) {
    //     array_push($this->diamond, new Diamond);
  

		$this->d2 = new Card (2, "diamond");
		$this->d3 = new Card (3, "diamond");
		$this->d4 = new Card (4, "diamond");
		$this->d5 = new Card (5, "diamond");
		$this->d6 = new Card (6, "diamond");
		$this->d7 = new Card (7, "diamond");
		$this->d8 = new Card (8, "diamond");
		$this->d9 = new Card (9, "diamond");
		$this->d10 = new Card (10, "diamond");
		$this->d11 = new Card (11, "diamond");
		$this->d12 = new Card (12, "diamond");
		$this->d13 = new Card (13, "diamond");
		$this->d14 = new Card (14, "diamond");

		$this->s2 = new Card (2, "spades");
		$this->s3 = new Card (3, "spades");
		$this->s4 = new Card (4, "spades");
		$this->s5 = new Card (5, "spades");
		$this->s6 = new Card (6, "spades");
		$this->s7 = new Card (7, "spades");
		$this->s8 = new Card (8, "spades");
		$this->s9 = new Card (9, "spades");
		$this->s10 = new Card (10, "spades");
		$this->s11 = new Card (11, "spades");
		$this->s12 = new Card (12, "spades");
		$this->s13 = new Card (13, "spades");
		$this->s14 = new Card (14, "spades");

		$this->h2 = new Card (2, "hearts");
		$this->h3 = new Card (3, "hearts");
		$this->h4 = new Card (4, "hearts");
		$this->h5 = new Card (5, "hearts");
		$this->h6 = new Card (6, "hearts");
		$this->h7 = new Card (7, "hearts");
		$this->h8 = new Card (8, "hearts");
		$this->h9 = new Card (9, "hearts");
		$this->h10 = new Card (10, "hearts");
		$this->h11 = new Card (11, "hearts");
		$this->h12 = new Card (12, "hearts");
		$this->h13 = new Card (13, "hearts");
		$this->h14 = new Card (14, "hearts");

		$this->c2 = new Card (2, "clubs");
		$this->c3 = new Card (3, "clubs");
		$this->c4 = new Card (4, "clubs");
		$this->c5 = new Card (5, "clubs");
		$this->c6 = new Card (6, "clubs");
		$this->c7 = new Card (7, "clubs");
		$this->c8 = new Card (8, "clubs");
		$this->c9 = new Card (9, "clubs");
		$this->c10 = new Card (10, "clubs");
		$this->c11 = new Card (11, "clubs");
		$this->c12 = new Card (12, "clubs");
		$this->c13 = new Card (13, "clubs");
		$this->c14 = new Card (14, "clubs");


	}

	public function showDeck(){
		echo "<br><br>Showing the deck<br><br>";

	}


}

?>