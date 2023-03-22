<?php

namespace App\Generators\Cv;

use App\Generators\Generator as MainGenerator;

class Generator extends MainGenerator
{
    public function generate(array $params): void
    {
        $this->data = $params;
    }
}
