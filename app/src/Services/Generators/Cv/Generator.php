<?php

namespace App\Services\Generators\Cv;

use App\Services\Generators\Generator as MainGenerator;
use App\Object\Cv\GeneratorObject;
use App\Validator\Cv\Validator;
use Exception;

class Generator extends MainGenerator
{
    private $service;

    /**
     * __construct
     *
     * @return void
     */
    public function __construct()
    {
        $this->object = new GeneratorObject;
        $this->validator = new Validator;
    }

    /**
     * generate
     *
     * @param  array $params
     * @return void
     */
    public function generate(array $params): void
    {
        $valided = $this->validator->Validate($params);
        if (!$valided) {
            throw new Exception("Invalid parameters", 1);
        }
        $this->setDataToObject($params);
        $pdf = $this->createPdf($this->object);
        $this->data = $pdf;
    }
    
    /**
     * setDataToObject
     *
     * @param  mixed $params
     * @return void
     */
    private function setDataToObject(array $params): void
    {
        foreach ($params as $key => $value) {
            $method = 'set'.ucfirst(strtolower($key));
            if (!method_exists($this->object, $method)) {
                continue;
            }
            $this->object->$method($value);    
        }
    }

    private function createPdf(object $params): string
    {
        $htmlContents = $this->twig->render('pdf/cv.html.twig',[$params]);
        var_dump($htmlContents);die;
    }
}
