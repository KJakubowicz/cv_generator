<?php

namespace App\Generators\Cv;

use App\Generators\Generator as MainGenerator;
use App\Object\Cv\GeneratorObject;
use App\Validator\Cv\Validator;

class Generator extends MainGenerator
{
    public function __construct()
    {
        $this->object = new GeneratorObject;
        $this->validator = new Validator;
    }

    public function generate(array $params): void
    {
        $this->data = $params;
    }
}
