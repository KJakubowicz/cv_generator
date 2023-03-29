<?php

namespace App\Generators;

use App\Object\GeneratorObject;
use App\Validator\Validator;
use Symfony\Component\DependencyInjection\ContainerInterface;

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
     * container
     *
     * @var ContainerInterface
     */
    protected ContainerInterface $container;  
 
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
     * setContainer
     *
     * @param  mixed $container
     * @return void
     */
    public function setContainer(ContainerInterface $container): void
    {
        $this->container = $container;
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
