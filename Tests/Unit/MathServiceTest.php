<?php
namespace Sk\MathBundle\Tests\Unit\Lib\Compiler;

use PHPUnit\Framework\TestCase;
use Sk\MathBundle\Entity\StandartProvider;
use Sk\MathBundle\Service\MathService;

class MathServiceTest extends TestCase
{
    protected $mathService;

    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $this->mathService = new MathService();
    }

    /**
     * @dataProvider fixturesProvider
     */
    public function testStdProviderResult($expression, $expected)
    {
        $stdProvider = new StandartProvider();
        $this->mathService->addProvider($stdProvider);
        $this->mathService->setProvider($stdProvider);

        try {
            $r = $this->mathService->getResult($expression);
        } catch ( \Exception $e) {
            $r = $e->getMessage();
        }

        if ($r->getErrorMessage()) {
            $this->assertEquals($expected, $r->getErrorMessage());
        } else {
            $this->assertEquals($expected, $r->getResult());
        }
    }


    public function fixturesProvider()
    {
        return [
            ["(1 + 22 * 7) - 1 + 77/7 +2^2)",   169],
            ["-1 + 7 * 2 + 7 * 2",              27],
            ["7 * 7 + 1 - (2 * 5)",             40],
            ["-7 - 5 + 2",                      -10],
            ["(7 + 5",                          "Not enough data on the stack for operation '('"],
            ["(7 +) 5 * 7",                     "Not enough data on the stack for operation '+'"],
            ["(7 + - 7) * 5 * 7",               "Not enough data on the stack for operation '+'"],
            ["-7",                              -7],
            ["7+7+()",                          "Not enough data on the stack for operation '+'"],
        ];;
    }

}