<?php
namespace Sk\MathBundle\Interfaces;

/**
 * Base interface for service getting mathematical result some expression
 *
 * Interface MathLibInterface
 * @package Sk\MathBundle\Interfaces
 */
interface MathLibInterface
{

    public const TAG = 'math.service';

    /**
     * Add new Math Provider
     * @param ProviderInterface $provider
     * @return mixed
     */
    public function addProvider(ProviderInterface $provider);

    /**
     * Calculate result by provider::getResult(string $expression)
     *
     * @param string $expression
     * @return mixed
     */
    public function getResult(string $expression): ResultInterface;

    /**
     * Get provider if exists by name
     *
     * @param string $providerName
     * @return null|ProviderInterface
     */
    public function getProviderByName(string $providerName): ?ProviderInterface;

    /**
     * Set current provider
     *
     * @param ProviderInterface $provider
     * @return null|ProviderInterface
     */
    public function setProvider(ProviderInterface $provider): ?ProviderInterface;

    /**
     * Get current provider if set
     * @return null|ProviderInterface
     */
    public function getCurrentProvider(): ?ProviderInterface;

    public function setProviderByName(string $providerName): ?ProviderInterface;
}