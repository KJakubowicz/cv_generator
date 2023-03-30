<?php

namespace App\Services\Generators\Cv;

use App\Services\Generators\Generator as MainGenerator;
use App\Object\Cv\GeneratorObject;
use App\Validator\Cv\Validator;
use Exception;
use Dompdf\Dompdf;
use Symfony\Component\Filesystem\Exception\IOExceptionInterface;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Filesystem\Path;

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
        $pdf = $this->createPdf($this->object);

        $this->data = [
            'cd_path' => $pdf
        ];
  
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
    
    /**
     * createPdf
     *
     * @param  object $params
     * @return string
     */
    private function createPdf(object $params): string
    {
        $pdfHtml = $this->twig->render('pdf/cv.html.twig',[$params]);
        $dompdf = new Dompdf();
        $dompdf->loadHtml($pdfHtml);
        $dompdf->render();
        $output = $dompdf->output();

        $filesystem = new Filesystem();
        try {
            $filesystem->dumpFile(Path::normalize($this->projectDir.'/files/pdf/cv.pdf'), $output);
        } catch (IOExceptionInterface $exception) {
            echo "An error occurred while creating your directory at ".$exception->getPath();
        }

        return Path::normalize($this->projectDir.'/files/pdf/cv.pdf');
    }
}
