<?php

namespace App\Object\Cv;

use App\Object\GeneratorObject as MainObjectGenerator;

class GeneratorObject extends MainObjectGenerator
{        
    /**
     * photo
     *
     * @var string
     */
    private $photo;
  
    /**
     * name
     *
     * @var string
     */
    private $name;
   
    /**
     * surname
     *
     * @var string
     */
    private $surname;
   
    /**
     * email
     *
     * @var string
     */
    private $email;
  
    /**
     * phone
     *
     * @var string
     */
    private $phone;
   
    /**
     * birthdate
     *
     * @var string
     */
    private $birthdate;

    /**
     * description
     *
     * @var string
     */
    private $description;

    /**
     * experience
     *
     * @var array
     */
    private $experience;

    /**
     * education
     *
     * @var array
     */
    private $education;

    /**
     * languageSkills
     *
     * @var array
     */
    private $languageSkills;

    /**
     * skills
     *
     * @var array
     */
    private $skills;

    /**
     * interests
     *
     * @var array
     */
    private $interests;

    /**
     * links
     *
     * @var array
     */
    private $links;
    
    /**
     * setPhoto
     *
     * @param  mixed $photo
     * @return void
     */
    public function setPhoto(string $photo): void
    {
        $this->photo = $photo;
    }
    
    /**
     * getPhoto
     *
     * @return string
     */
    public function getPhoto(): string
    {
        return $this->photo;
    }
    
    /**
     * setName
     *
     * @param  mixed $name
     * @return void
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }
    
    /**
     * getName
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
    
    /**
     * setSurname
     *
     * @param  mixed $surname
     * @return void
     */
    public function setSurname(string $surname): void
    {
        $this->surname = $surname;
    }
    
    /**
     * getSurname
     *
     * @return string
     */
    public function getSurname(): string
    {
        return $this->surname;
    }
    
    /**
     * setEmail
     *
     * @param  mixed $email
     * @return void
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }
    
    /**
     * getEmail
     *
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }
    
    /**
     * setPhone
     *
     * @param  mixed $phone
     * @return void
     */
    public function setPhone(string $phone): void
    {
        $this->phone = $phone;
    }
    
    /**
     * getPhone
     *
     * @return string
     */
    public function getPhone(): string
    {
        return $this->phone;
    }
    
    /**
     * setBirthdate
     *
     * @param  mixed $birthdate
     * @return void
     */
    public function setBirthdate(string $birthdate): void
    {
        $this->birthdate = $birthdate;
    }
    
    /**
     * getBirthdate
     *
     * @return string
     */
    public function getBirthdate(): string
    {
        return $this->birthdate;
    }
    
    /**
     * setDescription
     *
     * @param  mixed $description
     * @return void
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }
    
    /**
     * getDescription
     *
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }
    
    /**
     * setExperience
     *
     * @param  mixed $experience
     * @return void
     */
    public function setExperience(array $experience): void
    {
        $this->experience = $experience;
    }
    
    /**
     * getExperience
     *
     * @return array
     */
    public function getExperience(): array
    {
        return $this->experience;
    }
    
    /**
     * setEducation
     *
     * @param  mixed $education
     * @return void
     */
    public function setEducation(array $education): void
    {
        $this->education = $education;
    }
    
    /**
     * getEducation
     *
     * @return array
     */
    public function getEducation(): array
    {
        return $this->education;
    }
    
    /**
     * setLanguageSkills
     *
     * @param  mixed $languageSkills
     * @return void
     */
    public function setLanguageSkills(array $languageSkills): void
    {
        $this->languageSkills = $languageSkills;
    }
    
    /**
     * getLanguageSkills
     *
     * @return array
     */
    public function getLanguageSkills(): array
    {
        return $this->languageSkills;
    }
    
    /**
     * setSkills
     *
     * @param  mixed $skills
     * @return void
     */
    public function setSkills(array $skills): void
    {
        $this->skills = $skills;
    }
    
    /**
     * getSkills
     *
     * @return array
     */
    public function getSkills(): array
    {
        return $this->skills;
    }
    
    /**
     * setInterests
     *
     * @param  mixed $interests
     * @return void
     */
    public function setInterests(array $interests): void
    {
        $this->interests = $interests;
    }
    
    /**
     * getInterests
     *
     * @return array
     */
    public function getInterests(): array
    {
        return $this->interests;
    }
    
    /**
     * setLinks
     *
     * @param  mixed $links
     * @return void
     */
    public function setLinks(array $links): void
    {
        $this->links = $links;
    }
    
    /**
     * getLinks
     *
     * @return array
     */
    public function getLinks(): array
    {
        return $this->links;
    }
    
    /**
     * getData
     *
     * @return array
     */
    public function getData(): array
    {
        return [
            'photo' => $this->getPhoto(),
            'name' => $this->getName(),
            'surname' => $this->getSurname(),
            'email' => $this->getEmail(),
            'phone' => $this->getPhone(),
            'birthdate' => $this->getBirthdate(),
            'description' => $this->getDescription(),
            'experience' => $this->getExperience(),
            'education' => $this->getEducation(),
            'languageSkills' => $this->getLanguageSkills(),
            'skills' => $this->getSkills(),
            'interests' => $this->getInterests(),
            'links' => $this->getLinks(),
        ];
    }
}
