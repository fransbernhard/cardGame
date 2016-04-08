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
		<p class="made-by">Made by: Mimi-Rickard-BamBam-Mikael</p class="madeBy">
	</header>
	<section><p>Praesent metus tellus, elementum eu, semper a, adipiscing nec, purus. Vivamus euismod mauris. Donec interdum, metus et hendrerit aliquet, dolor diam sagittis ligula, eget egestas libero turpis vel mi. Fusce ac felis sit amet ligula pharetra condimentum. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum.

	Vestibulum dapibus nunc ac augue. Donec mollis hendrerit risus. Proin magna. Phasellus gravida semper nisi. Etiam ultricies nisi vel augue.</p></section>
</div>
</body>
</html>