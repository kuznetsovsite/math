<?php
/**
 * Created by PhpStorm.
 * User: sk
 * Date: 12/11/19
 * Time: 10:05 PM
 */

namespace Sk\MathBundle\Entity\Operations;


use Sk\MathBundle\Interfaces\OperationInterface;

abstract class AbstractOperation implements OperationInterface
{
    protected $values;

    public function getCountOperands(): int
    {
        return max(2, count($this->values));
    }

    abstract public function getPriority(): int;


    abstract public function getNotation(): string;

    abstract public function calc();

    /**
     * @param $value
     * @return self
     * @throws \Exception
     */
    public function addValue($value) : self
    {
        if (!is_numeric($value)) {
            throw new \Exception("Operation value is not a number");
        }

        $this->values[] = $value;

        return $this;
    }

    /**
     * @param int $index
     * @return float | int
     */
    public function getByIndex($index)
    {
        return $this->values[$index] ?? 0;
    }

}