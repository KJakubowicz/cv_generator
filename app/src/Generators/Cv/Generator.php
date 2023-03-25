<?php

namespace App\Generators\Cv;

use App\Generators\Generator as MainGenerator;
use App\Object\Cv\GeneratorObject;
use App\Validator\Cv\Validator;
use Exception;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Dompdf\Dompdf;


class Generator extends MainGenerator
{    
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
        $pdf = $this->createPdf();
        $this->data = $pdf;
    }

    public function createPdf()
    {
        var_dump($this->renderView('base.html.twig'));die;
        $html =  $this->renderView('generator/Cv/cv.html.twig', [$this->object]);
        die;$dompdf = new Dompdf();
  
        $dompdf->loadHtml($html);
        $dompdf->render();
        
        return new Response (
            $dompdf->stream('resume', ["Attachment" => false]),
            Response::HTTP_OK,
            ['Content-Type' => 'application/pdf']
        );
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
}
