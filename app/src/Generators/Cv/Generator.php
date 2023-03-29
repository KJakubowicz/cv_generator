<?php

namespace App\Generators\Cv;

use App\Service\PdfService;
use App\Generators\Generator as MainGenerator;
use App\Object\Cv\GeneratorObject;
use App\Validator\Cv\Validator;
use Exception;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\ContainerInterface;



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
        // $test = $this->container->getParameter('kernel.bundles');
        // $test->render('pdf/index.html.twig',[$params]);
        var_dump($this->container->get('kernel.bundles'));die;
    }
}
