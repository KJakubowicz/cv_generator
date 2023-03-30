<?php

namespace App\Services\Generators;

use App\Object\GeneratorObject;
use App\Validator\Validator;
use Twig\Environment;

abstract class Generator
{
    /**
     * object
     *
     * @var GeneratorObject
     */
    protected GeneratorObject $object;

    /**
     * validator
     *
     * @var Validator
     */
    protected Validator $validator;
    
    /**
     * twig
     *
     * @var Environment
     */
    protected Environment $twig;
    
    /**
     * projectDir
     *
     * @var string
     */
    protected $projectDir;  
 
    /**
     * data
     *
     * @var array
     */
    protected $data = [];

    /**
     * generate
     *
     * @param  array $params
     * @return void
     */
    abstract public function generate(array $params): void;
        
    /**
     * setProjectDir
     *
     * @param  string $projectDir
     * @return void
     */
    public function setProjectDir(string $projectDir): void
    {
        $this->projectDir = $projectDir;
    }

    /**
     * setTwig
     *
     * @param  mixed $twig
     * @return void
     */
    public function setTwig(Environment $twig): void
    {
        $this->twig = $twig;
    }

    /**
     * setData
     *
     * @param  array $data
     * @return void
     */
    protected function setData(array $data): void
    {
        $this->data = $data;
    }
    
    /**
     * getData
     *
     * @return array
     */
    public function getData(): array
    {
        return $this->data;
    }

}
