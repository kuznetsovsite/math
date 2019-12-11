<?php
namespace Sk\MathBundle\Interfaces;

/**
 * Library that realize calculation some operands
 *
 * Interface ProviderInterface
 * @package Sk\MathBundle\Interfaces
 */
interface ProviderInterface
{
    public const TAG = 'math.provider.service';

    public function getName(): string;
    public function getResult(string $expression);
}