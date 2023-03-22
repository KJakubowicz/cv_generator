<?php

namespace App\Generators;


abstract class Generator
{
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
