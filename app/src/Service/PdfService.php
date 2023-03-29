<?php

namespace App\Service;

use Symfony\Component\HttpFoundation\Response;
use App\Object\Cv\GeneratorObject;
use Dompdf\Dompdf;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class PdfService
{
    private $templating;

    public function __construct()
    {   

    }

    public function createPdf(GeneratorObject $pdfObject): string
    {
        $url = '';
        $html = $this->templating->render('pdf/index.html.twig',[$pdfObject]);
        
        return $url;
    }
}
