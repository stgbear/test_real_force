<?php

namespace App\Entity;

class Employee
{
    /** @var string */
    private $name;
    
    /** @var int */
    private $age;
    
    /** @var int */
    private $childrenCnt;
    
    /** @var bool */
    private $hasCompanyCar;
    
    /** @var float */
    private $salary;
    
    /**
     * @param string $name
     * 
     * @return $this
     */
    public function setName(string $name): self
    {
        $this->name = $name;
        
        return $this;
    }
    
    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }
    
    /**
     * @param int $age
     * 
     * @return $this
     */
    public function setAge(int $age): self
    {
        $this->age = $age;
        
        return $this;
    }
    
    /**
     * @return int|null
     */
    public function getAge(): ?int
    {
        return $this->age;
    }
    
    /**
     * @param int $cnt
     * 
     * @return $this
     */
     public function setChildrenCnt(int $cnt): self
     {
         $this->childrenCnt = $cnt;
         
         return $this;
     }
     
     /**
      * @return int|null
      */
     public function getChildrenCnt(): ?int
     {
         return $this->childrenCnt;
     }
     
     /**
      * @param bool $hasCompanyCar
      * 
      * @return $this
      */
     public function setHasCompanyCar(bool $hasCompanyCar): self
     {
         $this->hasCompanyCar = $hasCompanyCar;
         
         return $this;
     }
     
     /**
      * @return bool|null
      */
     public function getHasCompanyCar(): ?bool
     {
         return $this->hasCompanyCar;
     }
     
     /**
      * @param float $salary
      * 
      * @return $this
      */
     public function setSalary(float $salary): self
     {
         $this->salary = $salary;
         
         return $this;
     }
     
     /**
      * @return float|null
      */
     public function getSalary(): ?float
     {
         return $this->salary;
     }
}
