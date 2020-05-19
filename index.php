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
$wordsJson = file_get_contents(__DIR__ . '/words.json');
$words = json_decode($wordsJson);

if (!empty($_POST['word'])) {
	$word = $_POST['word'];
	$letters = strlen($word);
	$consonants = 0;
	$vowels = 0;

	$arr_vowels = ['a', 'e', 'i', 'o', 'u'];
	for ($i = 0; $i < $letters; $i++) {
		if (in_array(strtolower($word[$i]), $arr_vowels)) {
			$vowels++;
		}
		else {
			$consonants++;
		}
	}

	$words[] = [
		'word' => $word,
		'letters' => $letters,
		'consonants' => $consonants,
		'vowels' => $vowels
	];

	$wordsJson = json_encode($words);
	file_put_contents(__DIR__ . '/words.json', $wordsJson);
}

$wordsJson = file_get_contents(__DIR__ . '/words.json');
$words = json_decode($wordsJson);
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
