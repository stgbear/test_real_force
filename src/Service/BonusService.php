<?php

namespace App\Service;

use App\Entity\Employee;

class BonusService
{
    /**
     * @param Employee $employee
     * 
     * @return float
     */
    public function getAgeBonusValue(Employee $employee): float
    {
        return $employee->getAge() > 50 ? $employee->getSalary() * 0.07 : 0.0;
    }
}
