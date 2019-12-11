<?php
namespace Sk\MathBundle\Entity;

use Sk\MathBundle\Interfaces\ProviderInterface;

class BaseProvider implements ProviderInterface {

    protected $name;

    protected $className;

    protected $mathLibObj;

    public function __construct(string $name, string $className)
    {
        $this->name = $name;
        $this->className = $className;
    }

    public function init(array $config = [])
    {
        $this->mathLibObj = new $this->className($config);
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getResult(string $expression)
    {
        throw new \Exception("Please realize method in child object");
    }
}