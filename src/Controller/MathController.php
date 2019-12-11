<?php

namespace Sk\MathBundle\Controller;



use Sk\MathBundle\Interfaces\MathLibInterface;
use Sk\MathBundle\Interfaces\ProviderInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Main controller.
 * Calculate result by one base url for all projects
 * User: sk
 * Date: 12/11/19
 * Time: 10:34 PM
 */

class MathController extends AbstractController
{
    /** @var  MathLibInterface */
    private $mathLib;

    public function setMathService(MathLibInterface $mathLib)
    {
        $this->mathLib = $mathLib;
    }

    /**
     * @Route("/calculate/", methods={"GET"})
     * @return JsonResponse
     */
    public function getResult(Request $request): JsonResponse
    {
        $expression = $request->query->get('q');
        if (empty($this->mathLib->getCurrentProvider())) {
            $result = [];
        } else {
            $result = [
                'name' => $this->mathLib->getCurrentProvider()->getName(),
                'result' => [
                    'expression' => $expression,
                    'additional_info' => $this->mathLib->getCurrentProvider()->getResult($expression)
                ]
            ];
        }


        return $this->json($result);
    }
}
