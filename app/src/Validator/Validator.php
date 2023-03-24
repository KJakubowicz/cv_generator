<?php

namespace App\Validator;

abstract class Validator
{
    protected $valided = true;

    protected $required = [];

    abstract public function Validate(array $params): bool;

    protected function setValided(bool $valided): void
    {
        $this->valided = $valided;
    }
}
