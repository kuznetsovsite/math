<?php
/**
 * Created by PhpStorm.
 * User: sk
 * Date: 12/12/19
 * Time: 2:59 AM
 */

namespace Sk\MathBundle\Entity;


use Sk\MathBundle\Interfaces\ErrorInterface;
use Sk\MathBundle\Interfaces\ResultInterface;

class Result implements ResultInterface
{
    /** @var  string */
    private $errorCode;

    /** @var  string */
    private $errorMessage;

    /** @var  string */
    private $result;

    public function getErrorCode(): ?string
    {
        return $this->errorCode;
    }

    public function getErrorMessage(): ?string
    {
        return $this->errorMessage;
    }

    public function getResult(): ?string
    {
        return (string)$this->result;
    }

    /**
     * @param string $errorCode
     * @return Result
     */
    public function setErrorCode(string $errorCode)
    {
        $this->errorCode = $errorCode;
        return $this;
    }

    /**
     * @param string $errorMessage
     * @return Result
     */
    public function setErrorMessage(string $errorMessage)
    {
        $this->errorMessage = $errorMessage;
        return $this;
    }

    /**
     * @param string $result
     * @return Result
     */
    public function setResult(string $result)
    {
        $this->result = $result;
        return $this;
    }


}