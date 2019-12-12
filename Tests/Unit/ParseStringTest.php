<?php

namespace Sk\MathBundle\Tests\Unit\Lib\Compiler;


use PHPUnit\Framework\TestCase;
use Sk\MathBundle\Lib\ParseString;

class ParseStringTest extends TestCase
{
    private $fixtures = [
        "(1 + 22 * 7) - 1 + 77/7 +2^2)"     => 169,
        "-1 + 7 * 2 + 7 * 2"                => 27,
        "7 * 7 + 1 - (2 * 5)"               => 40,
        "-7 - 5 + 2"                        => -10,
        "(7 + 5"                            => "Not enough data on the stack for operation '('",
        "(7 +) 5 * 7"                       => "Not enough data on the stack for operation '+'",
        "(7 + - 7) * 5 * 7"                 => "Not enough data on the stack for operation '+'",
        "-7"                                => -7,
        "7+7+()"                            => "Not enough data on the stack for operation '+'",
    ];

    public function testConvertToPolishNotation()
    {

        foreach ($this->fixtures as $expression => $waitingResult) {
            try {
                $r = ParseString::getResult($expression);
            } catch ( \Exception $e) {
                $r = $e->getMessage();
            }

            $this->assertEquals($waitingResult, $r);
        }
    }

}