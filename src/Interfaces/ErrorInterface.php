<?php

namespace Sk\MathBundle\Interfaces;


interface ErrorInterface
{
    // Ex: Wrong (123+(1-3) No close bracket
    public const ERROR_WRONG_EXPRESSION = 'math.error.expression';
    // When wrong operands in expression
    public const ERROR_WRONG_PARAMETERS = 'math.error.wrong.parameters';
    // When Provider has the same name
    public const ERROR_WRONG_NAME = 'math.error.wrong.name';
    // 7/0 -> +Inf
    public const ERROR_DIVIDE_BY_ZERO = 'math.error.divide.by.zerro';

    public function getErrorCode();

    public function getErrorMessage();
}