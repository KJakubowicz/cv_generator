<?php

namespace App\Generators\Cv;

use App\Generators\Generator as MainGenerator;
use App\Object\Cv\GeneratorObject;
use App\Validator\Cv\Validator;
use Exception;

class Generator extends MainGenerator
{    
    /**
     * __construct
     *
     * @return void
     */
    public function __construct()
    {
        $this->object = new GeneratorObject;
        $this->validator = new Validator;
    }
    
    /**
     * generate
     *
     * @param  array $params
     * @return void
     */
    public function generate(array $params): void
    {
        $valided = $this->validator->Validate($params);
        if (!$valided) {
            throw new Exception("Invalid parameters", 1);
        }
        $this->setDataToObject($params);
        $this->data = $params;
    }
    
    /**
     * setDataToObject
     *
     * @param  mixed $params
     * @return void
     */
    private function setDataToObject(array $params): void
    {
        foreach ($params as $key => $value) {
            $method = 'set'.ucfirst(strtolower($key));
            if (!method_exists($this->object, $method)) {
                continue;
            }
            $this->object->$method($value);    
        }
    }
}
