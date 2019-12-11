<?php
namespace Sk\MathBundle\Entity\Operations;

class PowOperation extends AbstractOperation
{
    const NOTATION = '^';
    const PRIORITY = 3;

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
        $result = $this->getByIndex(0);
        for ($i = 1; $i < $this->getCountOperands(); $i++ ) {
            $result = pow($result, $this->getByIndex($i));
        }

        return $result;
    }
}