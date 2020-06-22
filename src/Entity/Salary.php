<?php

namespace App\Entity;

class Salary
{
    /** @var float */
    private $salary;
    
    /** @var float */
    private $tax;
    
    /** @var float */
    private $bonus;
    
    /** @var float */
    private $deduction;
    
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
     * @return float
     */
    public function getSalary(): float
    {
        return $this->salary;
    }
    
    /**
     * @param float $tax
     * 
     * @return $this
     */
    public function setTax(float $tax): self
    {
        $this->tax = $tax;
        
        return $this;
    }
    
    /**
     * @return float;
     */
    public function getTax(): float
    {
        return $this->tax;
    }
    
    /**
     * @param float $bonus
     * 
     * @return $this
     */
    public function setBonus(float $bonus): self
    {
        $this->bonus = $bonus;
        
        return $this;
    }
    
    /**
     * @return float;
     */
    public function getBonus(): float
    {
        return $this->bonus;
    }
    
    /**
     * @param float $deduction
     * 
     * @return $this
     */
    public function setDeduction(float $deduction): self
    {
        $this->deduction = $deduction;
        
        return $this;
    }
    
    /**
     * @return float;
     */
    public function getDeduction(): float
    {
        return $this->deduction;
    }
}
