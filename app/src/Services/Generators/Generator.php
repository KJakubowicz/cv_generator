<?php

namespace App\Services\Generators;

use App\Services\Validators\MainValidator;

abstract class Generator
{

    /**
     * validator
     *
     * @var Validator
     */
    protected MainValidator $validator; 
 
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
     * @return array
     */
    abstract public function generate(array $params): array;

}
