<?php
namespace Sk\MathBundle\Entity;


use Sk\MathBundle\Lib\ParseString;

class StandartProvider extends BaseProvider
{
    public function getResult(string $expression)
    {
        return ParseString::getResult($expression);
    }

    public function getName(): string
    {
        return 'std_math';
    }
}