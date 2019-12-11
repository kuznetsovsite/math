<?php
namespace Sk\MathBundle\Entity\Operations;


class MinusOperation extends AbstractOperation
{
    const NOTATION = '-';
    const PRIORITY = 2;

    public function getPriority(): int
    {
        return static::PRIORITY;
    }

    public function getNotation(): string
    {
        return static::NOTATION;
    }

    function calc()
    {
        $result = 0;
        for ($i = 0; $i < $this->getCountOperands(); $i++ ) {
            $result += $this->getByIndex($i);
        }

        return $result;
    }
}