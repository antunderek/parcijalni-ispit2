<?php

function updateWords($words) {
	$wordsJson = json_encode($words);
	file_put_contents('words.json', $wordsJson);
}

function retriveWords() {
	$wordsJson = file_get_contents(__DIR__ . '/words.json');
	$words = json_decode($wordsJson);
	return $words;
}

function calcConsonants($word) {
	$word = strtolower($word);
	$vowels = ['a', 'e', 'i', 'o', 'u'];
	$sum = 0;
	for ($i = 0; $i < strlen($word); $i++) {
		if (!in_array($word[$i], $vowels)) {
			$sum++;
		}
	}
	return $sum;
}

function calcVowels($word) {
	$word = strtolower($word);
	$vowels = ['a', 'e', 'i', 'o', 'u'];
	$sum = 0;
	for ($i = 0; $i < strlen($word); $i++) {
		if (in_array($word[$i], $vowels)) {
			$sum++;
		}
	}
	return $sum;
}
