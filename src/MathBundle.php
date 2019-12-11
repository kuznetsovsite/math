<?php

namespace Sk\MathBundle1;


use Sk\MathBundle\DependencyInjection\Compiler\MathPath;
use Sk\MathBundle\Interfaces\MathLibInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class MathBundle extends Bundle
{
    public function build(ContainerBuilder $container)
    {
        parent::build($container);
        $container->addCompilerPass(new MathPath());
        $container->registerForAutoconfiguration(MathLibInterface::class)->addTag(MathLibInterface::TAG);
    }
}

