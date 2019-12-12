<?php
namespace Sk\MathBundle\Lib;

class ParseString
{
    static $opPriority = [
        '^' => 3,
        '*' => 3,
        '/' => 3,
        '+' => 2,
        '-' => 2,
        '(' => 1
    ];

    public static function getResult($operation)
    {
        $polishNotation = static::convertToPolishNotation($operation);

        return static::resultByPolishNotation($polishNotation);
    }


    /**
     * Method convert string to Polish Notation
     *
     * @param string $s - mathematical correct string
     * @return string - polish notation of input string
     */
    protected static function convertToPolishNotation (string $s) : string {
        $s = str_ireplace(" ", "", $s);
        // if string start from -\d (minus some number) convert to 0-\d. Ex: -7 => 0-7
        if ($s[0] == '-') {
            $s = '0'.$s;
        }
        $stack = $out = $items = [];
        $pair = [];
        // get operators & operands
        $d = null;
        for ($i = 0, $l = strlen($s); $i < $l; ++$i) { // scan expression
            if (is_numeric($s{$i}) || $s{$i} == '.') {
                $d .= $s{$i};
            } else {
                if ($d != null) {
                    $out[] = $d; // add operand (numeric)
                    $pair[] = $d;
                    $d = null;
                }
                // add operator
                if (sizeof($stack) == 0 || $s{$i} == '(') {
                    $stack[] = $s{$i};
                } elseif ($s{$i} == ')') {
                    for ($j = sizeof($stack)-1; $j >= 0; --$j) {
                        if ($stack[$j] != '(') {
                            $out[] = array_pop($stack);
                        } else {
                            array_pop($stack);
                            break;
                        }
                    }
                } else { // + - * /
                    for ($j = sizeof($stack)-1; $j >= 0; --$j) {
                        if (static::$opPriority[$stack[$j]] < static::$opPriority[$s{$i}]) {
                            break;
                        }
                        $out[] = $stack[$j];
                        unset($stack[$j]);
                    }
                    $stack = array_values($stack);
                    $stack[] = $s{$i};
                }
            }
        }
        if ($d != null) {
            $out[] = $d;
        }

        if (sizeof($stack)) {
            $out = array_merge($out, array_reverse($stack));
        }

        return implode(" ", $out);
    }

    /**
     * Calculate result by polish notation
     * @param string $str - Polish Notation string
     * @return float | int - результат выражения
     * @throws \DivisionByZeroError
     * @throws \Exception
     */
    protected static function resultByPolishNotation(string $str)
    {
        $stack = [];

        $token = strtok($str, ' ');

        // ['*', '/', '+', '-', '^']
        $operations = array_keys(static::$opPriority);
        while ($token !== false) {
            if (in_array($token, $operations)) {
                if (count($stack) < 2) {
                    throw new \Exception("Not enough data on the stack for operation '$token'");
                }

                $b = array_pop($stack);
                $a = array_pop($stack);
                // @TODO: change this part for extending to OpearionsInterfaces
                switch ($token) {
                    case '*':
                        $res = $a * $b;
                        break;
                    case '/':
                        if ($b == 0) {
                            throw new \DivisionByZeroError("Divide by zero: $token");
                        }
                        $res = $a / $b;
                        break;
                    case '+':
                        $res = $a + $b;
                        break;
                    case '-':
                        $res = $a - $b;
                        break;
                    case '^':
                        $res = pow($a, $b);
                        break;
                }

                if (!empty($res)) {
                    array_push($stack, $res);
                }

            } elseif (is_numeric($token)) {
                array_push($stack, $token);
            } else {
                throw new \Exception("Invalid character: $token");
            }

            $token = strtok(' ');
        }

        if (count($stack) > 1) {
            throw new \Exception("The count of operators is not match count of operands");
        }

        return array_pop($stack);
    }
}