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
     * projectDir
     *
     * @var string
     */
    private $projectDir;
    
    /**
     * __construct
     *
     * @param  Environment $twig
     * @param  string $projectDir
     * @return void
     */
    public function __construct(Environment $twig, string $projectDir)
    {
        $this->twig = $twig;
        $this->projectDir = $projectDir;
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

    /**
     * setProjectDir
     *
     * @param  Generator $generator
     * @return void
     */
    public function setProjectDir(Generator $generator)
    {
        $generator->setProjectDir($this->projectDir);
    }

}
