<?php

namespace MindWorksDev;

require_once("vendor/autoload.php");

$anagram = new Anagram('foobar','barfoo');

try {
	if ( $anagram->hasAnagram() )
		echo "'" . $anagram->getA() . " and '" . $anagram->getB() . "' have an anagram\n";
	else
		echo "'" . $anagram->getA() . "' and '" . $anagram->getB() . "' do not have an anagram\n";
} catch (StrLenDifferent $e) {
	echo $e->getMessage() . "\n";
}

$onthefly = new Anagram;

try {
	$strA = "foobar";
	$strB = "barfoo1";
	if ( $onthefly->hasAnagram($strA,$strB) )
		echo "'{$strA}' and '{$strB}' have an anagram\n";
	else
		echo "'{$strA}' and '{$strB}' do not have an anagram\n";
} catch (StrLenDifferent $e) {
	echo $e->getMessage() . "\n";
}
