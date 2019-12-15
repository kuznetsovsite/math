<?php

namespace Sk\MathBundle\DependencyInjection\Compiler;

use Sk\MathBundle\Controller\MController;
use Sk\MathBundle\Interfaces\MathLibInterface;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

class MathPath implements CompilerPassInterface
{
    public function process(ContainerBuilder $container)
    {

    }
}