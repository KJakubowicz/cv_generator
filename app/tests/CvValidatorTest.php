<?php

namespace App\Tests;

use App\Services\Validators\CvValidator;
use PHPUnit\Framework\TestCase;

class CvCalculatorTest extends TestCase
{    
    /**
     * testValidData
     *
     * @return void
     */
    public function testValidData()
    { 
        $fields = [
            'photo' => '',
            'name' => '',
            'surname' => '',
            'email' => '',
            'phone' => '',
            'position' => '',
            'birthdate' => '',
            'description' => '',
            'experience' => '',
            'education' => '',
            'languageSkills' => '',
            'skills' => '',
            'interests' => '',
            'links' => '',
            
        ];
        $validation = new CvValidator();
        $result = $validation->Validate($fields);

        $this->assertEquals(true, $result);
    }
    
    /**
     * testInvalidData
     *
     * @return void
     */
    public function testInvalidData()
    {
        $validation = new CvValidator();
        $result = $validation->Validate([]);
    
        $this->assertEquals(false, $result);
    }
}