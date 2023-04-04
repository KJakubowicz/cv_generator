<?php

namespace App\Tests;

use App\Services\Setters\Objects\CvObjectSetter;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Serializer\Encoder\JsonEncoder;

class CvObjectSetterTest extends KernelTestCase
{
    /**
     * testValidData
     *
     * @return void
     */
    public function testSetter()
    {
        self::bootKernel();
        $container = static::getContainer();
        $setterService = $container->get(CvObjectSetter::class);
        $params = $this->getSetterData();

        if (empty($params)) {
            $this->fail('No test file');
        }
        
        $result = $setterService->createData($params);

        $this->assertEquals($params, $result);
    }
    
    /**
     * getSetterData
     *
     * @return array
     */
    private function getSetterData(): array
    {
        $filesystem = new Filesystem();
        $jsonEncoder = new JsonEncoder();
        $result = [];

        if ($filesystem->exists(__DIR__ . '\files\SetterData.json')) {
            $jsonData = file_get_contents(__DIR__ . '\files\SetterData.json');
            $result = $jsonEncoder->decode($jsonData, 'json');
        } 
        
        return $result;
    }

}