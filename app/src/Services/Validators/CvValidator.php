<?php

namespace App\Services\Validators;

use App\Services\Validators\MainValidator;

class CvValidator extends MainValidator
{    
    /**
     * requred
     *
     * @var array
     */
    private $requred = [
        'photo',
        'name',
        'surname',
        'email',
        'phone',
        'position',
        'birthdate',
        'description',
        'experience',
        'education',
        'languageSkills',
        'skills',
        'interests',
        'links'
        
    ];
    
    /**
     * Validate
     *
     * @param  mixed $params
     * @return bool
     */
    public function Validate(array $params): bool 
    {
        foreach ($this->requred as $field) {
            if (!array_key_exists($field, $params)) {
                $this->setValided(false);
                return $this->valided;
            }
        }
        return $this->valided;
    }
}
