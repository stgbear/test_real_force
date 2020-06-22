<?php

namespace App\Service;

use App\Entity\Employee;

class DeductionService
{
    /**
     * @param Employee $employee
     * 
     * @return float
     */
    public function getCarDeduction(Employee $employee): float
    {
        return $employee->getHasCompanyCar() ? 500.0 : 0.0;
    }
}