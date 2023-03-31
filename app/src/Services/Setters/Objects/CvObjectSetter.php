<?php

namespace App\Services\Setters\Objects;

use App\Object\Cv\GeneratorObject;

class CvObjectSetter
{
    
    /**
     * _object
     *
     * @var GeneratorObject
     */
    private GeneratorObject $_object;
    
    /**
     * __construct
     *
     * @param  GeneratorObject $object
     * @return void
     */
    public function __construct(GeneratorObject $object)
    {
        $this->_object = $object;
    }

    /**
     * setData
     *
     * @param  mixed $params
     * @return GeneratorObject
     */
    public function setData(array $params): GeneratorObject
    {
        foreach ($params as $key => $value) {
            $method = 'set'.ucfirst(strtolower($key));
            if (!method_exists($this->_object, $method)) {
                continue;
            }
            $this->_object->$method($value);    
        }

        return $this->_object;
    }
}