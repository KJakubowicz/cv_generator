<?php

namespace App\Validator;

abstract class Validator
{
    protected $valided = true;

    abstract public function Validate(): bool;
}
