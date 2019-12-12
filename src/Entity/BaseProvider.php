<?php
namespace Sk\MathBundle\Entity;

use Sk\MathBundle\Interfaces\ProviderInterface;

class BaseProvider implements ProviderInterface {

    protected $name;

    public function getName(): string
    {
        return $this->name;
    }

    public function getResult(string $expression)
    {
        throw new \Exception("Please realize method in child object");
    }
}