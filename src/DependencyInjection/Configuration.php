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

//        $rootNode = $treeBuilder->getRootNode()->;
        $treeBuilder->getRootNode()
            ->children()
                ->scalarNode('default')
                    ->defaultValue('std_math')
                ->end()// end default

                ->arrayNode('providers')
                    ->addDefaultsIfNotSet()
                    ->children()
                        ->scalarNode('std_math')
                            ->isRequired()
                            ->cannotBeEmpty()
                            ->defaultValue('Sk\MathBundle\Entity\StandartProvider')
                        ->end()
                        ->scalarNode('string_calc')
                            ->isRequired()
                            ->cannotBeEmpty()
                            ->defaultValue('Sk\MathBundle\Entity\StringCalcProvider')
                        ->end()
                    ->end()
                ->end() // end providers
            ->end() // end children
        ;

        return $treeBuilder;
    }
}
