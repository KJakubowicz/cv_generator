<?php

namespace App\Services\Generators;

use Twig\Environment;

class GeneratorFactory
{
    private $twig;

    public function __construct(Environment $twig)
    {
        $this->twig = $twig;
    }

    public function createGenerator($generator): Generator
    {
        $generatorName = "App\\Services\\Generators\\" . ucwords($generator) . "\\Generator";

        if (!class_exists($generatorName)) {
            throw new \Exception("We dont find genarator with name: " . $generator);
        }
        
        return new $generatorName;
    }

    public function setTwig(Generator $generator)
    {
        $generator->setTwig($this->twig);
    }
}
