<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use OpenApi\Annotations as OA;
use App\Generators\GeneratorFactory;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class GeneratorController extends AbstractController
{
    /**
     * factory
     *
     * @var GeneratorFactory
     */
    private GeneratorFactory $factory;
    
    /**
     * __construct
     *
     * @return void
     */
    public function __construct()
    {
        $this->factory = new GeneratorFactory();
    }

    /**
    * @OA\Tag(name="generator")
    * @OA\RequestBody(
    *     required=true,
    *     description="Params for generator",
    *     @OA\JsonContent(
    *     @OA\Property(property="params", type="object"),
    *     )
    * )
    */
    public function generate($provider, Request $request): Response
    {
        $generator = $this->factory->createGenerator($provider);
        $content = json_decode($request->getContent(), true);
        $generator->generate($content['params']);
        
        return new JsonResponse($generator->getData());
    }
}
