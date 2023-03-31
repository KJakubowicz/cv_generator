<?php

namespace App\Services\Generators;

use Twig\Environment;
use App\Services\Generators\Cv\Generator;

class GeneratorFactory
{    

    /**
     * cvGenerator
     *
     * @var Generator
     */
    private $cvGenerator;
    
    
    /**
     * __construct
     *
     * @param  Generator $cvGenerator
     * @return void
     */
    public function __construct(Generator $cvGenerator)
    {
        $this->cvGenerator = $cvGenerator;
    }
    
    /**
     * createGenerator
     *
     * @param  string $generator
     * @return Generator
     */
    public function createGenerator(string $generator): Generator
    {
        switch ($generator) {
            case 'cv':
                return $this->cvGenerator;
                break;
            default:
                throw new \InvalidArgumentException(sprintf('Invalid service type: %s', $generator));
                break;
        }
    }

}
