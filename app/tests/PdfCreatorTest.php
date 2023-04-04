<?php

namespace App\Tests;

use App\Services\Creators\PdfCreator;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Filesystem\Path;

class PdfCreatorTest extends KernelTestCase
{
    /**
     * testPdfCreator
     *
     * @return void
     */
    public function testPdfCreator()
    {
        self::bootKernel();
        $container = static::getContainer();
        $pdfCreatorService = $container->get(PdfCreator::class);
        $params = $this->getCvData();
    
        if (empty($params)) {
            $this->fail('No test file');
        }
        
        $result = $pdfCreatorService->createPdf($params, 'test');
        $fileDir = Path::normalize(self::$kernel->getProjectDir() . '/files/pdf/test.pdf');

        $this->assertEquals($fileDir, $result);
    }
    
    /**
     * getCvData
     *
     * @return array
     */
    private function getCvData(): array
    {
        $filesystem = new Filesystem();
        $jsonEncoder = new JsonEncoder();
        $result = [];

        if ($filesystem->exists(__DIR__ . '\files\CvData.json')) {
            $jsonData = file_get_contents(__DIR__ . '\files\CvData.json');
            $result = $jsonEncoder->decode($jsonData, 'json');
        } 
        
        return $result;
    }

}