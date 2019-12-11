<?php
namespace Sk\MathBundle\Interfaces;

/**
 * Base operation interface
 *
 * Interface OperationInterface
 * @package Sk\MathBundle\Interfaces
 */
interface OperationInterface
{
    public function getCountOperands(): int;
    public function getPriority(): int;
    public function getNotation():string;

    function calc();
}