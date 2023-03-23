<?php

namespace App\Generators;

use App\Object\GeneratorObject;
use App\Validator\Validator;

abstract class Generator
{
    protected GeneratorObject $object;
    protected Validator $validator;
    protected $data = [];

    abstract public function generate(array $params): void;

    protected function setData(array $data): void
    {
        $this->data = $data;
    }

    public function getData(): array
    {
        return $this->data;
    }

}
