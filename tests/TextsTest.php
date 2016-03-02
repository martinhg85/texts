<?php


use Martinhg\Texts\Texts;

class TextsTest extends PHPUnit_Framework_TestCase
{
    public function testTruncateText()
    {
        $texts = new Texts();
        $text="<p>Este es un texto con html</p>";

        $expected="<p>Este es&hellip;</p>";

        $this->assertEquals($texts->truncateHtml($text,7),$expected);
    }
}
