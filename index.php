<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Parcijalni ispit</title>
</head>
<body>
<h1>Upišite željenu riječ</h1>
<form action="" method="POST">
	<input type="text" name="word">
	<input type="submit" value="Pošalji">
</form>

<?php
require_once 'functions.php';

$words = retriveWords();
if (!empty($_POST['word'])) {
	$word = $_POST['word'];
	$letters = strlen($word);
	$consonants = calcConsonants($word);
	$vowels = calcVowels($word);

	$words[] = [
		'word' => $word,
		'letters' => $letters,
		'consonants' => $consonants,
		'vowels' => $vowels
	];

	updateWords($words);
}

$words = retriveWords();
?>

<table border="1">
	<tr>
		<th>Riječ</th>
		<th>Broj slova</th>
		<th>Broj suglasnika</th>
		<th>Broj samoglasnika</th>
	</tr>

<?php foreach($words as $word): ?>
	<tr>
	<?php foreach($word as $data): ?>
		<td>
		<?php echo $data; ?>
		</td>
	<?php endforeach; ?>
	</tr>
<?php endforeach; ?>

</table>

</body>
</html>
