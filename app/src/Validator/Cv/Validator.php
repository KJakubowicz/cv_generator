<?php

namespace App\Validator\Cv;

use App\Validator\Validator as MainValidator;

class Validator extends MainValidator
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
    public function Validate(array $params): bool {
        foreach ($this->requred as $field) {
            if (!array_key_exists($field, $params)) {
                $this->setValided(false);
                return $this->valided;
            }
        }
        return $this->valided;
    }
}
