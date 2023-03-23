<?php

namespace App\Generators;

class GeneratorFactory
{
    public function createGenerator($generator): Generator
    {
        $generatorName = "App\\Generators\\" . ucwords($generator) . "\\Generator";

        if (!class_exists($generatorName)) {
            throw new \Exception("We dont find genarator with name: " . $generator);
        }

        return new $generatorName;
    }
}
