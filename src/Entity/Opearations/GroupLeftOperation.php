<?php
namespace Sk\MathBundle\Entity\Operations;

class GroupLeftOperation extends AbstractOperation
{
    const NOTATION = '(';
    const PRIORITY = 1;

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
        return 0;
    }
}