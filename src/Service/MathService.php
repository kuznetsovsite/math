<?php
namespace Sk\MathBundle\Service;

use Sk\MathBundle\Entity\Result;
use Sk\MathBundle\Interfaces\ErrorInterface;
use Sk\MathBundle\Interfaces\MathLibInterface;
use Sk\MathBundle\Interfaces\ProviderInterface;
use Sk\MathBundle\Interfaces\ResultInterface;

/**
 *
 * Main math service that realize math operations
 *
 * Class MathService
 * @package Sk\MathBundle\Service
 */
class MathService implements MathLibInterface
{
    private  $providers;

    /** @var  ProviderInterface */
    private  $currentProvider;

    /**
     * Add new Math Provider
     * @param ProviderInterface $provider
     * @return mixed
     */
    public function addProvider(ProviderInterface $provider)
    {
        $this->providers[$provider->getName()] = $provider;
    }

    /**
     * Calculate result by provider::getResult(string $expression)
     *
     * @param string $expression
     * @return ResultInterface
     */
    public function getResult(string $expression): ResultInterface
    {
        $result = new Result();
        try {
            $result->setResult($this->currentProvider->getResult($expression));
        } catch (\Exception $e) {
            $result->setErrorCode(ErrorInterface::ERROR_WRONG_EXPRESSION);
            $result->setErrorMessage($e->getMessage());
        }

        return $result;
    }

    /**
     * Get provider if exists by name
     *
     * @param string $providerName
     * @return null|ProviderInterface
     */
    public function getProviderByName(string $providerName): ?ProviderInterface
    {
        if (empty($this->providers[$providerName])) {
            return null;
        }

        return $this->providers[$providerName];
    }

    /**
     * Set current provider
     *
     * @param ProviderInterface $provider
     * @return null|ProviderInterface
     */
    public function setProvider(ProviderInterface $provider): ?ProviderInterface
    {
        if (empty($this->getProviderByName($provider->getName()))) {
            return null;
        }

        $this->currentProvider = $provider;
        return $provider;
    }

    public function setProviderByName(string $providerName): ?ProviderInterface
    {
        $provider = $this->getProviderByName($providerName);
        if (empty($provider)) {
            return null;
        }
        return $this->setProvider($provider);
    }

    /**
     * Get current provider if set
     * @return null|ProviderInterface
     */
    public function getCurrentProvider(): ?ProviderInterface
    {
        return $this->currentProvider;
    }
}