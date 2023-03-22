<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use OpenApi\Annotations as OA;

class GeneratorController extends AbstractController
{
    /**
    * @OA\Tag(name="generator")
    */
    public function generate($type): Response
    {
        return $this->render('generator/index.html.twig', [
            'controller_name' => 'GeneratorController',
        ]);
    }
}
