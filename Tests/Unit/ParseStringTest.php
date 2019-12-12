<?php

namespace Sk\MathBundle\Tests\Unit\Lib\Compiler;


use PHPUnit\Framework\TestCase;
use Sk\MathBundle\Lib\ParseString;

class ParseStringTest extends TestCase
{
    private $fixtures = [
        ["(1 + 22 * 7) - 1 + 77/7 +2^2)",   169],
        ["-1 + 7 * 2 + 7 * 2",              27],
        ["7 * 7 + 1 - (2 * 5)",             40],
        ["-7 - 5 + 2",                      -10],
        ["(7 + 5",                          "Not enough data on the stack for operation '('"],
        ["(7 +) 5 * 7",                     "Not enough data on the stack for operation '+'"],
        ["(7 + - 7) * 5 * 7",               "Not enough data on the stack for operation '+'"],
        ["-7",                              -7],
        ["7+7+()",                          "Not enough data on the stack for operation '+'"],
    ];

    /**
     * @dataProvider fixturesProvider
     */
    public function testGetResult($expression, $expected)
    {
        try {
            $r = ParseString::getResult($expression);
        } catch ( \Exception $e) {
            $r = $e->getMessage();
        }

        $this->assertEquals($expected, $r);
    }


    public function fixturesProvider()
    {
        return $this->fixtures;
    }

}