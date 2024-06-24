<?php
declare(strict_types=1);


namespace App\Tests;

use App\Recommendations\Services\StringService;
use PHPUnit\Framework\TestCase;

class StringServiceTest extends TestCase
{
    public function testWordStartFromLetter()
    {
        $this->assertTrue(StringService::wordStartFromLetter('hello world', 'h'));
        $this->assertFalse(StringService::wordStartFromLetter('hello world', 'w'));
        $this->assertTrue(StringService::wordStartFromLetter('Hello world', 'h'));
        $this->assertTrue(StringService::wordStartFromLetter('hello world', 'H'));
    }

    public function testWordHasEvenLength()
    {
        $this->assertTrue(StringService::wordHasEvenLength('abcd'));
        $this->assertFalse(StringService::wordHasEvenLength('abc'));
        $this->assertTrue(StringService::wordHasEvenLength('123456'));
        $this->assertFalse(StringService::wordHasEvenLength('12345'));
    }

    public function testIsMultiWord()
    {
        $this->assertTrue(StringService::isMultiWord('hello world'));
        $this->assertFalse(StringService::isMultiWord('hello'));
        $this->assertTrue(StringService::isMultiWord('long-term'));
        $this->assertFalse(StringService::isMultiWord('longterm'));
        $this->assertFalse(StringService::isMultiWord(''));
    }
}
