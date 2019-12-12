<?php

namespace Sk\MathBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * sk_math:
 *      providers:
 *          std_math: 'Sk\MathBundle\Entity\StandartProvider'
 *          string_calc: 'Sk\MathBundle\Entity\StringCalcProvider'
 *
 *      default: std_math
 *
 * Class Configuration
 * @package Sk\MathBundle\DependencyInjection
 */
class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder('sk_math');

        $rootNode = $treeBuilder->getRootNode();
        $rootNode
            ->children()
                ->arrayNode('providers')
                    ->children()
                        ->scalarNode('std_math')
                            ->defaultValue('Sk\MathBundle\Entity\StandartProvider')
                        ->end()
                        ->scalarNode('string_calc')
                            ->defaultValue('Sk\MathBundle\Entity\StringCalcProvider')
                        ->end()
                    ->end()
                ->end()
                ->scalarNode('default')
                    ->defaultValue('std_math')
                ->end()
            ->end()
        ;

        return $treeBuilder;
    }
}
