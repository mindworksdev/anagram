<?php

namespace spec\MindWorksDev;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class AnagramSpec extends ObjectBehavior
{
    function it_is_initializable() {
        $this->shouldHaveType('MindWorksDev\Anagram');
    }

	function it_is_initialized_with_both_strings() {
		$this->beConstructedWith('abc','cba');
        $this->shouldHaveType('MindWorksDev\Anagram');
	}

	function it_should_return_abc() {
		$this->splitSort('cba')->shouldEqual('abc');
	}

	function it_should_return_positive_via_constructors() {
		$this->beConstructedWith('abc','cba');
		$this->hasAnagram()->shouldEqual(true);
	}

	function it_should_return_positive_via_parameters() {
		$this->hasAnagram('abc','cba')->shouldEqual(true);
	}

	function it_should_return_negative_via_constructors() {
		$this->beConstructedWith('abc','xyz');
		$this->hasAnagram()->shouldEqual(false);
	}

	function it_should_return_negative_via_parameters() {
		$this->hasAnagram('abc','xyz')->shouldEqual(false);
	}

	function it_should_throw_exception_for_strlen_via_constructor() {
		$this->beConstructedWith('abcd','xyz');
		$this->shouldThrow('MindWorksDev\Exceptions\StrLenDifferent')->during('hasAnagram');
	}

	function it_should_throw_exception_for_strlen_via_parameters() {
		$this->shouldThrow('MindWorksDev\Exceptions\StrLenDifferent')->during('hasAnagram',['abcd','xyz']);
	}
}
