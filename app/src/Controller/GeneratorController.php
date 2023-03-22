<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use OpenApi\Annotations as OA;
use App\Generators\GeneratorFactory;
use Symfony\Component\HttpFoundation\JsonResponse;

class GeneratorController extends AbstractController
{
    private GeneratorFactory $factory;

    public function __construct()
    {
        $this->factory = new GeneratorFactory();
    }
    /**
    * @OA\Tag(name="generator")
    */
    public function generate($provider): Response
    {
        $generator = $this->factory->createGenerator($provider);
        $generator->generate([
            'imie' => 'Kamil',
            'nazwisko' => 'Jakubowicz',
        ]);
        
        return new JsonResponse($generator->getData());
    }
}
