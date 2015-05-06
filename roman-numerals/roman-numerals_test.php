<?php
require_once "roman-numerals.php";

/**
 * Translated from original source:
 * http://agilekatas.co.uk/katas/romannumerals-kata
 */
class RomanTest extends \PHPUnit_Framework_TestCase
{
    
    private $convert;
    
    public function setUp() {
        $this->convert = new Convert();
    }
    
    public function testRoman1() {
        $this->assertSame('I', $this->convert->ArabicToRoman(1));
    }
    
    public function testRoman2() {
        //$this->markTestSkipped();
        $this->assertSame('III', $this->convert->ArabicToRoman(3));
    }
    
    public function testRoman3() {
        //$this->markTestSkipped();
        $this->assertSame('IX', $this->convert->ArabicToRoman(9));
    }
    
    public function testRoman4() {
        //$this->markTestSkipped();
        $this->assertSame('MLXVI', $this->convert->ArabicToRoman(1066));
    }
    
    public function testRoman5() {
        //$this->markTestSkipped();
        $this->assertSame('MCMLXXXIX', $this->convert->ArabicToRoman(1989));
    }
    
    public function testArabic1() {
        $this->assertSame(1, $this->convert->RomanToArabic('I'));
    }
    
    public function testArabic2() {
        //$this->markTestSkipped();
        $this->assertSame(3, $this->convert->RomanToArabic('III'));
    }
    
    public function testArabic3() {
        //$this->markTestSkipped();
        $this->assertSame(9, $this->convert->RomanToArabic('IX'));
    }
    
    public function testArabic4() {
        //$this->markTestSkipped();
        $this->assertSame(1066, $this->convert->RomanToArabic('MLXVI'));
    }
    
    public function testArabic5() {
        //$this->markTestSkipped();
        $this->assertSame(1989, $this->convert->RomanToArabic('MCMLXXXIX'));
    }
}
