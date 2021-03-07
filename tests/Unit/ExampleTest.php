<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Classes\ArrayCalculation;
use App\Classes\CharConversion;

class ExampleTest extends TestCase
{

    public function __construct()
    {
        $this->charConversion = new CharConversion;
        parent::__construct();
    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $this->assertTrue(true);
    }

    /*
     * Basic calculations to check if the multiplication is correct
     */
    public function testMultiplyArray()
    {
        $this->assertTrue((new ArrayCalculation)->multiply([19,3]) === 19 * 3);
    }

    /*
     *
     */
    public function testCharacterConversion()
    {
        $this->assertTrue($this->charConversion->arrayToNumbers(['A', 'B']) === [1, 2]);
        $this->assertTrue($this->charConversion->arrayToNumbers(['AA', 'AB']) === [27, 28]);
        $this->assertTrue($this->charConversion->arrayToNumbers(['c', 'z']) === [3, 26]);
        $this->assertFalse($this->charConversion->arrayToNumbers(['A', 'B']) === [2, 3]);
    }

    /*
     *
     */
    public function testNumberToLetters()
    {
        $this->assertTrue($this->charConversion->numberToLetters(1) === 'A');
        $this->assertTrue($this->charConversion->numberToLetters(26) === 'Z');
        $this->assertTrue($this->charConversion->numberToLetters(27) === 'AA');
        $this->assertTrue($this->charConversion->numberToLetters(28) === 'AB');
        $this->assertFalse($this->charConversion->numberToLetters(28) === 'AC');
    }

    /*
     *
     */
    public function testLettersToNumber()
    {
        $this->assertTrue($this->charConversion->lettersToNumber('A') === 1);
        $this->assertTrue($this->charConversion->lettersToNumber('Z') === 26);
        $this->assertTrue($this->charConversion->lettersToNumber('AA') === 27);
        $this->assertTrue($this->charConversion->lettersToNumber('AB') === 28);
        $this->assertFalse($this->charConversion->lettersToNumber('AC') === 28);
    }
}
