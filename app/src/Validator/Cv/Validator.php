<?php

namespace App\Validator\Cv;

use App\Validator\Validator as MainValidator;

class Validator extends MainValidator
{
    public function Validate(): bool {
        return $this->valided;
    }
}
