<?php

namespace App\Generators;

use App\Object\GeneratorObject;
use App\Validator\Validator;

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
