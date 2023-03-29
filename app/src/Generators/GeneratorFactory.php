<?php

namespace App\Generators;

use Symfony\Component\DependencyInjection\ContainerInterface;

class GeneratorFactory
{
    private $container;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    public function createGenerator($generator): Generator
    {
        $generatorName = "App\\Generators\\" . ucwords($generator) . "\\Generator";

        if (!class_exists($generatorName)) {
            throw new \Exception("We dont find genarator with name: " . $generator);
        }
        
        return new $generatorName;
    }

    public function setContainer(Generator $generator)
    {
        $generator->setContainer($this->container);
    }
}
