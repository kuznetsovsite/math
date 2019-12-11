<?php
namespace Sk\MathBundle\Entity\Operations;

class DivideOperation extends AbstractOperation
{
    const NOTATION = '/';
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
        if ($result == 0) {
            return 0;
        }
        for ($i = 1; $i < $this->getCountOperands(); $i++ ) {
            $divider = $this->getByIndex($i);
            if ($divider == 0) {
                throw new \Exception('Divide on zero value');
            }
            $result /= $divider;
        }

        return $result;
    }
}