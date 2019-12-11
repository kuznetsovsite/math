<?php

namespace Sk\MathBundle\DependencyInjection\Compiler;

use Sk\MathBundle\Controller\MathController;
use Sk\MathBundle\Interfaces\MathLibInterface;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

class MathPath implements CompilerPassInterface
{
    public function process(ContainerBuilder $container)
    {
        if (!$container->has(MathController::class)) {
            return;
        }

        $controller = $container->findDefinition(MathController::class);
        foreach (array_keys($container->findTaggedServiceIds(MathLibInterface::TAG)) as $serviceId) {
            $controller->addMethodCall('setMathService', [new Reference($serviceId)]);
        }
    }
}