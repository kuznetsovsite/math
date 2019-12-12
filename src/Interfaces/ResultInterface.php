<?php
/**
 * Created by PhpStorm.
 * User: sk
 * Date: 12/12/19
 * Time: 3:00 AM
 */

namespace Sk\MathBundle\Interfaces;


interface ResultInterface extends  ErrorInterface
{
    public function getResult();
}