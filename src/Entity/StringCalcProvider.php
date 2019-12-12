<?php
namespace Sk\MathBundle\Entity;


class StringCalcProvider extends BaseProvider
{
    public function getName(): string
    {
        return 'string_calc';
    }

    public function getResult(string $operation)
    {
        $stringCalc = new ChrisKonnertz\StringCalc\StringCalc();

        $result = $stringCalc->calculate($operation);

        return $result;
    }
}