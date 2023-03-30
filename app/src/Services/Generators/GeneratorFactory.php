<?php

namespace App\Services\Generators;

use Twig\Environment;

class GeneratorFactory
{    
    /**
     * twig
     *
     * @var Environment
     */
    private $twig;
    
    /**
     * __construct
     *
     * @param  mixed $twig
     * @return void
     */
    public function __construct(Environment $twig)
    {
        $this->twig = $twig;
    }
    
    /**
     * createGenerator
     *
     * @param  mixed $generator
     * @return Generator
     */
    public function createGenerator($generator): Generator
    {
        $generatorName = "App\\Services\\Generators\\" . ucwords($generator) . "\\Generator";

        if (!class_exists($generatorName)) {
            throw new \Exception("We dont find genarator with name: " . $generator);
        }
        
        return new $generatorName;
    }
    
    /**
     * setTwig
     *
     * @param  mixed $generator
     * @return void
     */
    public function setTwig(Generator $generator)
    {
        $generator->setTwig($this->twig);
    }
}
