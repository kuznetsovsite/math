<?php

namespace Sk\MathBundle\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;

class MathExtension extends Extension
{
    /**
     * {@inheritdoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $loader = new Loader\YamlFileLoader($container, new FileLocator(__DIR__ . '/../Resources/config'));
        $loader->load('services.yaml');

        $container->autowire('Sk\MathBundle\Interfaces\MathLibInterface', 'Sk\MathBundle\Service\MathService');
        $definitionMathService = $container->getDefinition('Sk\MathBundle\Interfaces\MathLibInterface');

        foreach ($config['providers'] as $key => $providerClass) {
            $container->autowire($providerClass, $providerClass);
            $definitionService = $container->getDefinition($providerClass);
            $definitionMathService->addMethodCall('addProvider', [$definitionService]);
        }

        if (!empty($config['default'])) {
            $definitionMathService->addMethodCall('setProviderByName', [$config['default']]);
        }

        // установка определения в контейнер

        $this->addAnnotatedClassesToCompile([
            'Sk\\MathBundle\\Controller\\',
            'Sk\\MathBundle\\Service\\',
//            '**Bundle\\Controller\\',
//            '**Bundle\\Service\\',
        ]);
    }
}