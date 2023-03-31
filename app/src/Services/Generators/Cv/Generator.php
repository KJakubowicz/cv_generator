<?php

namespace App\Services\Generators\Cv;

use App\Services\Generators\Generator as MainGenerator;
use App\Services\Setters\Objects\CvObjectSetter;
use Exception;
use App\Services\Validators\CvValidator;
use App\Services\Creators\PdfCreator;

class Generator extends MainGenerator
{    
    /**
     * _setter
     *
     * @var CvObjectSetter
     */
    private $_setter;
    
    /**
     * _pdfCreator
     *
     * @var PdfCreator
     */
    private $_pdfCreator;
    
    /**
     * __construct
     *
     * @param  CvValidator $validator
     * @param  CvObjectSetter $setter
     * @param  PdfCreator $pdfCreator
     * @return void
     */
    public function __construct(CvValidator $validator, CvObjectSetter $setter, PdfCreator $pdfCreator)
    {
        $this->validator = $validator;
        $this->_setter = $setter;
        $this->_pdfCreator = $pdfCreator;
    }

    /**
     * generate
     *
     * @param  array $params
     * @return array
     */
    public function generate(array $params): array
    {
        $valided = $this->validator->Validate($params);

        if (!$valided) {
            throw new Exception("Invalid parameters", 1);
        }

        $cvObject = $this->_setter->setData($params);
        $pdf = $this->_pdfCreator->createPdf($cvObject, 'cv');

        return [
            'filePath' => $pdf
        ];
    }
}
