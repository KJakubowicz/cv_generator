<?php

namespace App\Validator;

abstract class Validator
{    
    /**
     * valided
     *
     * @var bool
     */
    protected $valided = true;
    
    /**
     * required
     *
     * @var array
     */
    protected $required = [];
    
    /**
     * Validate
     *
     * @param  mixed $params
     * @return bool
     */
    abstract public function Validate(array $params): bool;
    
    /**
     * setValided
     *
     * @param  mixed $valided
     * @return void
     */
    protected function setValided(bool $valided): void
    {
        $this->valided = $valided;
    }
}
