<?php

namespace MindWorksDev;

use MindWorksDev\Exceptions\StrLenDifferent;

class Anagram
{
	private $strA;
	private $strB;

	public function __construct($stringA = NULL,$stringB = NULL) {
		$this->strA = $stringA;
		$this->strB = $stringB;
	}

	public function getA() {
		return $this->strA;
	}

	public function getB() {
		return $this->strB;
	}

	public function hasAnagram($stringA = NULL,$stringB = NULL) {
		if ( empty($stringA) && !empty($this->strA) )
			$stringA = $this->strA;

		if ( empty($stringB) && !empty($this->strB) )
			$stringB = $this->strB;

		if ( strlen($stringA) !== strlen($stringB) )
			throw new StrLenDifferent("Strings are different length");

		return $this->splitSort($stringA) === $this->splitSort($stringB);
	}

	public function splitSort($string) {
		$tmp = str_split($string);
		sort($tmp);
		return implode($tmp);
	}
}
